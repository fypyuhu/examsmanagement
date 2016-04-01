<?php

class Category extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['title'];
        public function exams(){
            return $this->hasMany('Exam');
            
        }
        public function questions(){
            return $this->hasMany('Question');
            
        }
        
        
        
        public static function  toOptionArray(){
            $categories = Category::all(); 
            $arr = [];
             foreach($categories as $c){
                 $arr[$c->id]= $c->title;
                 
             }
              return $arr;
         }
        
}   