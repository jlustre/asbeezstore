<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body'];

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function question() {
    	return $this->belongsTo('App\Question');
    }

    public function getBodyHtmlAttribute() {
        return \Parsedown::Instance()->Text($this->body);
    }

    public static function boot() {
    	parent::boot();
    	static::created(function($answer) {
    		$answer->question->increment('answers_count');
    	});
    }
    
    public function getCreatedDateAttribute() {
    	return $this->created_at->diffForHumans();
    }
}
