<?php

namespace Modules\PkgWidget\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name','slug'];
    public function articles(){

        return $this->hasMany(Article::class);
    }
}
