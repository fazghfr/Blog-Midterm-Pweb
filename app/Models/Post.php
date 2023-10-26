<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function total_comments() {
        return $this->comments()->count();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
