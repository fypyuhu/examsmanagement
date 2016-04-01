<?php

class Question extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'statement' => 'required',
            'op1' =>'required',
            'op2' =>'required',
                 
	];

	// Don't forget to fill this array
	protected $fillable = ['statement','correct','op1','op2','op3','op4','op5','category_id','user_id'];
         public function   category(){
            return $this->belongsTo('Category');
        }
         public function   user(){
            return $this->belongsTo('User');
        }
        public function exams(){
            return $this->belongsToMany('Exam')->withTimestamps();
        }
        public static function solve($op,$id){
          $question =  Question::where('id',$id)->first();
          return  $question[$op];
            
        }

}