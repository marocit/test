<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Events\LinkCreated;

class Link extends Model
{
    protected $fillable = [
        'url', 'cover', 'title', 'description', 'category_id',
    ];

    /*protected $events = [
        'created' => LinkCreated::class,
    ];*/

    public function tweets()
    {
        return $this->hasMany(Tweet::class, 'link_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopelatestFirst($query){
        return $query->orderBy('created_at', 'desc');
    }
}
