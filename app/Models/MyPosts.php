<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class MyPosts extends CoreModel
{
    use Notifiable;

    use SoftDeletes;

    public $incrementing = false;

    protected $table = 'my_posts';

    protected $fillable = ['id', 'title', 'description', 'image', 'user_id'];

}
