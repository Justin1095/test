<?php

namespace App;

use Carbon\Carbon;
class Post extends Model
{
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function user()  // $comment->post->user
	{
		return $this->belongsTo(User::class);
	}

	public function addComment($body)
	{
		$this->comments()->create(compact('body'));
    	// //add a comment to a post
    	//Comment::create([
    	//	'body' => $body,
    	//	'post_id' => $this->id
    	//]);
	}

	public function scopeFilter($query, $filters)
	{

		 if($month = $filters['month']) //Finds what the user selected
		 {
		 	//will look into the database and find if any created_at is equal to the $month
            $query->whereMonth('created_at', Carbon::parse($month)->month); //March => 3, May => 5;
        }

         if($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }

	}

	public static function archives()
	{
		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year', 'month')
        ->OrderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
	} 

	public function tags()
	{
		// Any post can have many tags
		// Many tag may be applied to many posts

		return $this->belongsToMany(Tag::class);
	}
}