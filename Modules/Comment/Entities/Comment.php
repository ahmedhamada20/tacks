<?php

namespace Modules\Comment\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Post\Entities\Post;

class Comment extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = ['comment','post_id','user_id'];

    public function post()
    {
        return $this->belongsTo(Post::class,'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    protected static function newFactory()
    {
        return \Modules\Comment\Database\factories\CommentFactory::new();
    }
}
