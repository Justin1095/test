<?php

namespace App;

class Tag extends Model
{
    public function posts()
	{
		// Any post can have many tags
		// Many tag may be applied to many posts

		return $this->belongsToMany(Post::class);
	}

	public function getRouteKeyName()
	{

		return 'name';
	}
}
