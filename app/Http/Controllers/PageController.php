<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\CommentRequest;
use App\Http\Controllers\BaseController;

use Illuminate\Validation\ValidationException;

use App\Models\User;
use App\Models\Files;
use App\Models\Comment;

class PageController extends BaseController
{
    public function index(){
        $comments = $this->service->comments();
        $files = Files::all();
        return view('index', compact('comments'));
    }

    public function send_form(CommentRequest $request, $main = null, $answ = null){
        $user = $this->service->available($request);
        $path = $this->service->files($request);
        $this->service->validate($request);        
        $this->service->create($request, $main, $answ, $path, $user);
        return redirect(route('home.index'));    
    }
}
