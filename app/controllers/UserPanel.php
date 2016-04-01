<?php

class UserPanel extends \BaseController {

	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
    
    
    public function __construct()
    {
        $this->beforeFilter('auth');
        
        
        
        $this->beforeFilter('csrf', array('on' => 'post'));

    }

    
   public function dashboard(){
  
       return View::make('user.dashboard.index');
       
       
   }
	

}
