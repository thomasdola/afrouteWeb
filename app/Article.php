<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'slug', 'published_at'];

	public function article_images()
	{
		return $this -> hasMany('App\ArticleImage');
	}
}
