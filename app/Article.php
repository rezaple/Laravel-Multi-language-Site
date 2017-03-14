<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['status'];

    public function contents()
    {
    	return $this->hasMany(ArticleContent::class);
    }

}
