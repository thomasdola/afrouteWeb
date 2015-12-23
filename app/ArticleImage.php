<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    protected $fillable = ['path', 'article_id'];


	public function articles()
	{
		return $this->belongsTo('App\Article');
	}
}
