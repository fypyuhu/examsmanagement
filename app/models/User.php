<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
         * 
	 */
            protected $fillable = array( 'email', 'password','name');
	protected $hidden = array('password', 'remember_token');
        
        public static $rules = [
            
            'email' =>'required|email|unique:users',
            'name' => 'required'
        ];
        public static $urules = [
            
            'name' => 'required'
        ];
        
        public function exams(){
            return $this->hasMany('Exam');
            
        }
        public function questions(){
            return $this->hasMany('Question');
            
        }
        public function student(){
            return $this->hasMany('Student');
            
        }
}
