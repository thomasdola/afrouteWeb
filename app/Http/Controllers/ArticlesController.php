<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleImage;
use App\Http\Requests\CreateArticlesRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @param Article $article
	 *
	 * @return Response
	 */
    public function index(Article $article)
    {
	    $p_articles = $article->where('published_at', '<=', Carbon::today())->get();
	    $u_articles = $article->where('published_at', '>', Carbon::today())->get();
	    return view('admin.articles.index',
		    [
			    'p_articles'=>$p_articles,
			    'u_articles'=>$u_articles,
		    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param CreateArticlesRequest|Request $request
	 * @param Article $article
	 *
	 * @param ArticleImage $articleImage
	 *
	 * @return Response
	 */
    public function store(CreateArticlesRequest $request)
    {

	    $input = $request->all();
	    $input['published_at'] = Carbon::parse($request->published_at);
	    $input = array_except($input, ['image']);
	    $input = array_add($input, 'slug', str_slug($request->title));
	    $article = Article::create($input);

	    if($request->image)
	    {
		    $image = $request->image;
		    if($image -> isValid())
            {
                $ext = $image->getClientOriginalExtension();
                $destinationPath = base_path().'/public/images/';
                $fileName = str_slug($request->title).'_image.'.$ext;
                $full_path = '/images/'.$fileName;
                $image->move($destinationPath, $fileName);
                $article->article_images()->create(['path'=>$full_path]);
            }
	    }

	    return redirect()->route('admin.articles.index');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param Article $article
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function show(Article $article)
    {
        return view('admin.articles.show',
	        [
		        'article'=>$article,
	        ]);
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Article $article
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function edit(Article $article)
    {
	    return view('admin.articles.edit',
            [
                'article'=>$article,
            ]);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param CreateArticlesRequest|Request $request
	 * @param Article $article
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function update(CreateArticlesRequest $request, Article $article)
    {

	    $input = $request->all();
	    $input['published_at'] = Carbon::parse($request->published_at);
        $input = array_add($input, 'slug', str_slug($request->title));
	    $input = array_except($input, ['_wysihtml5_mode']);

        $article -> update($input);

	    return redirect()->route('admin.articles.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Article $article
	 *
	 * @internal param int $id
	 * @return Response
	 */
    public function destroy(Article $article)
    {
        $article -> delete();
	    return redirect()->route('admin.articles.index');
    }
}
