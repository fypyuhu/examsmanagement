<?php

class Result extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];
        protected $table = 'result';

	// Don't forget to fill this array
	protected $fillable = [];
        
         public function   question(){
            return $this->belongsTo('Question');
        }
         public function   exam(){
            return $this->belongsTo('Exam');
        }
         public function   student(){
            return $this->belongsTo('Student');
            
        }

}