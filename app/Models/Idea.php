<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;
    protected $with = ['user:id,slug,name,image', 'comments.user:id,slug,name,image'];
    protected $guarded = [];
    protected $withCount = ['likes'];

    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('body', 'like', '%' . $search . '%');
    }
}
