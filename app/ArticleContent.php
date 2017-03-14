<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{
    protected $fillable=[
        'language_code',
    	'title',
    	'slug',
    	'content'
    ];

    protected $table='article_contents';

    public function article()
    {
    	return $this->belongsTo(Article::class);
    }

}
