<?php

class Student extends \Eloquent {
        
        protected $table = 'student';


	// Add your validation rules here
	public static $rules = [
		 'name' => 'required',
             'email' => 'required|email'
	];

	// Don't forget to fill this array
	protected $fillable = ['name','email','user_id'];
        
        public function   user(){
            return $this->belongsTo('User');
        }
        
        public function   exams(){
            return $this->belongsToMany('Exam')->withTimestamps();
        }

}