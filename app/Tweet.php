<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = ['body', 'link_id', 'user_id'];

    public function author()
{
    return $this->belongsTo(User::class);
}

public function link()
    {
        return $this->belongsTo(Link::class, 'link_id');
    }


}

