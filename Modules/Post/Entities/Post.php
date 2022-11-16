<?php

namespace Modules\Post\Entities;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Comment\Entities\Comment;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'data',
        'user_id',
    ];


    protected $appends = ['image'];

    public function getImageAttribute()
    {
        return $this->photo != null ? asset('storage/admin/post/' . $this->photo->Filename) : null;
    }



    public function commentes()
    {
        return $this->hasMany(Comment::class,'post_id');
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'photoable');
    }
    

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
