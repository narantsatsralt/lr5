<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\carbon;

class Article extends Model {

	protected $fillable = [
		'title',
		'body',
		'published_at',
		'user_id' // temporary!!
	];

	protected $dates = ['published_at'];

	public function scopePublished($query)
	{

		$query -> where('published_at','<=', Carbon::now());
	}

	public function scopeUnpublished($query)
	{

		$query -> where('published_at','>', Carbon::now());
	}

	//setAddress
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d',$date);
	}

	/**
	* An article is owned by a user.
	* @return \illuminate\Database\Eloquent\Relation\BelongTo
	*/
	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function tags(){

		return $this->belongsToMany('App\Tag')->withTimestamps();
	}

	public function getTagListAttribute(){

		return $this->tags->lists('id');
	}
}
