<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Model
{
   //this is used for mass assignment
   protected $fillable = ['title','content'];

   //Each post belongs to a user
   public function user() {
   	 return $this->belongsTo('App\User');
   }

  	public function likes() {
        return $this->hasMany('App\Like');
    }

   public function setTitleAttribute($value) {
       $this->attributes['title'] = $value;
       //putting a dash in between each words
       $this->attributes['slug'] = Str::slug($value, '-');
   }

  public function getUrlAttribute() {
    	// return route("posts.show", $this->id);
        return route("posts.show", $this->slug);
    }

    public function getCreatedDateAttribute() {
    	return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getStatusAttribute() {
        if ($this->likes_count > 0) {
            if ($this->best_like_id) {
                return "like-accepted";
            }
            return "like";
        }
        return "unlike";
    }

    public function getContentHtmlAttribute() {
        return \Parsedown::Instance()->Text($this->content);
    }
}
