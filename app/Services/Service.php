<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\ValidationException;

use App\Models\User;
use App\Models\Files;
use App\Models\Comment;

class Service
{
    public function comments(){
        $comments = [];
        if($_SERVER['REQUEST_URI'] === '/'){
            $comments = Comment::where('answer_id', NULL)->latest()->paginate(25);
        } else {
            $comments = Comment::where('answer_id', NULL)->sortable()->paginate(25);
        }
        return $comments;
    }

    public function available($request){
        $user = User::where('user_name', $request['user_name'])->first();
        $email = User::where('email', $request['email'])->first();
        if(!empty($user)){
            if($user->email !== $request['email']){
                throw ValidationException::withMessages([
                    'email' => __('Почта не совпадает'),
                ]);
            }
        }
        if(!empty($email)){
            if($email->user_name !== $request['user_name']){
                throw ValidationException::withMessages([
                    'user_name' => __('Имя не совпадает'),
                ]);
            }
        }
        return $user;
    }

    public function files($request){
        $path = [];
        if($request->file('files') !== null){
            foreach($request->file('files') as $file){
                if (!is_dir(storage_path("app/public/uploads"))) {
                    mkdir(storage_path("app/public/uploads"), 0777, true);
                }
                $file_name = $file->getClientOriginalName();
                if(strpos($file->getClientMimeType(), 'text') !== false){
                    if($file->getSize() > 100000){
                        echo "<script>alert('Файл ".$file_name." весит больше 100 килобайт!'); window.history.back();</script>";
                        return '';
                    }
                    $file->storeAs('uploads', $file_name, 'public');
                    $path[] = 'uploads/'.$file_name;
                }else{
                    $file = \Image::make($file)->resize(320, 240, function($constraint){
                        $constraint->aspectRatio();
                    })->save(storage_path('app/public/uploads/'.$file_name));
                    $path[] = 'uploads/'.$file_name;
                }
            }
        }
        return $path;
    }

    public function validate($request){
        $request['user_name'] = strip_tags($request['user_name']);
        $request['text'] = strip_tags($request['text'], '<a><code><i><strong>');
        $tag_arr = [['<a', '</a>'], ['<code>', '</code>'], ['<i>', '</i>'], ['<strong>', '</strong>']];
        foreach($tag_arr as $element){
            if(substr_count($request['text'], $element[0]) !== substr_count($request['text'], $element[1]))
            {
                echo "<script>alert('Тег <".str_replace(['<', '>'], '', $element[0])."> не закрыт!'); window.history.back();</script>";
                return '';
            }
        }
    }

    public function create($request, $main, $answ, $path, $user){
        $url = $request['url'] !== null ? $request['url'] : 'none';
        $user = User::create([
            'user_name' => $request['user_name'],
            'email' => $request['email'],
            'url' => $url,
        ]);
        if($answ === null){
            $comment = Comment::create([
                'user_id' => $user->id,
                'email' => $request['email'],
                'text' => $request['text'],
            ]);
        }else{
            $comment = Comment::create([
                'user_id' => $user->id,
                'answer_id' => $answ,
                'main_id' => $main,
                'text' => $request['text'],
                'email' => $request['email'],
            ]);
        }
        
        if($request->file('files') !== null){
            foreach($path as $file){
                Files::create([
                    'user_id' => $user->id,
                    'comment_id' => $comment->id,
                    'url' => $file,
                ]);
            }
        }
    }
}
