<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

use App\Models\User;
use App\Models\Files;
use App\Models\Comment;

class Comment extends Model
{
    use HasFactory, Sortable;

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function files(){
        return $this->hasMany(Files::class, 'user_id', 'id');
    }

    public function answers(){
        return $this->hasMany(Comment::class, 'answer_id', 'id');
    }

    public $sortable = ['user_id', 'email', 'created_at'];

    
}


