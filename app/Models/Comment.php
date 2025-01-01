<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = [
        'comment',
        'blog_id',
        'email',
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
