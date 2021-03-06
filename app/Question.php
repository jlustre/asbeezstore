<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Question extends Model
{
   //this is used for mass assignment
   protected $fillable = ['title','body'];

   //Relation of this model to user = Each question belongs to a user
   public function user() {
   	 return $this->belongsTo('App\User');
   }

   //Relationship method
   public function answers() {
        return $this->hasMany('App\Answer');
   }

   //Attribute mutator
   public function setTitleAttribute($value) {
       $this->attributes['title'] = $value;
       //putting a dash in between each words
       $this->attributes['slug'] = Str::slug($value, '-');
   }

  public function getUrlAttribute() {
    	// return route("questions.show", $this->id);
        return route("questions.show", $this->slug);
    }

    public function getCreatedDateAttribute() {
    	return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getStatusAttribute() {
        if ($this->answers_count > 0) {
            if ($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute() {
        // Use to parse the html tags
        return \Parsedown::Instance()->Text($this->body);
    }
}
