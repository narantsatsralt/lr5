<?php namespace App\Http\Controllers;

use App\Articles;
use App\Http\Requests;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use Carbon\carbon;
use Auth;

class ArticlesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth', ['except'=>['index','show']]);
	}

	public function index(){
		
		$articles = \App\Article::latest('published_at')->published()->get();
		$pagetitle = 'Articles';

		return view('articles.index',compact('articles'))->withPagetitle($pagetitle);
	}

	public function show(\App\Article $article)
	{
		$pagetitle = 'Show';

		return view('articles.show',compact('article'))->withPagetitle($pagetitle); //article->title
	}

	public function create()
	{
		$tags = \App\Tag::lists('name', 'id');
		
		$pagetitle = 'Create';

		return view('articles.create', compact('tags'))->withPagetitle($pagetitle);
	}

	public function store(ArticleRequest $request)
	{	

		$this->createArticle($request);

		//flash()->overlay('Your article has been successfully created!','Good Job');
		flash()->success('You are article has bees created');

		return redirect('articles')->with('flash_message');
	}

	public function edit(\App\Article $article)
	{
		$tags = \App\Tag::lists('name', 'id');
		$pagetitle = 'Edit';

		return view('articles.edit', compact('article','tags'))->withPagetitle($pagetitle);
	}

	public function update(\App\Article $article, ArticleRequest $request)
	{

		$article->update($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return redirect('articles');
	}

	private function syncTags(\App\Article $article, array $tags){

		$article->tags()->sync($tags);
	}

	private function createArticle(ArticleRequest $request){

		$article = Auth::user()->articles()->create($request->all());

		$this->syncTags($article, $request->input('tag_list'));

		return $article;
	}
}