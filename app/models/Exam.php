
<?php

class Exam extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['duration','start','end','user_id','title','category_id'];
         public function   user(){
            return $this->belongsTo('User');
        }
        
        
        public function questions(){
            return $this->belongsToMany('Question')->withTimestamps();
        }
        public function students(){
            return $this->belongsToMany('Student')->withTimestamps();
        }


}