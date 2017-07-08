<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  protected $fillable = ['name'];
  protected $hidden = ['created_at', 'updated_at'];
    
    public function links()
    {
        return $this->hasMany(link::class);
    }
}
