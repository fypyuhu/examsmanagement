<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /sessions
	 *
	 * @return Response
	
         *  */
	
         public function password($password){
             $pass= $password;
             
           // $count = strlen($pass); 
            
           // echo $count."<br>";
           // echo $pass;
           //  exit(1);
             return Hash::make($pass);
             
         }
        public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /sessions/create
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('sessions.create');
		//
	}
        
	/**
	 * Store a newly created resource in storage.
	 * POST /sessions
	 *
	 * @return Response
	 */
        private function checkRemember(){
          
          
          if(Input::has('remeber') && Input::get('remember') == 'on')
              return  true;
          
          return false;
            
        }
        private function inputValidation(){
            
             $validator = Validator::make($data = Input::all(), [
              'email' =>'required|email',
              'password' => 'required'
              ]);
             return $validator;
		
        }
        
	public function store()
	{
            $validator = $this->inputValidation();
            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }
        
          $email =   Input::get('email');
          $password = Input::get('password');
          $remember = $this->checkRemember();
        
         if (Auth::attempt(array('email' => $email, 'password' => $password), $remember))
          {
             if(Auth::user()->isAdmin)
                return Redirect::to('/admin/dashboard');
             else
                return Redirect::to('/userpanel'); 
            // The user is being remembered...
            }  
            
         return  Redirect::back()->withErrors(['Invalid Credentials']);
          //
	}

	/**
	 * Display the specified resource.
	 * GET /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /sessions/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /sessions/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
           Auth::logout();
           return Redirect::to('/')->withSucess("Your are Logout Sucessfully");
		//
	}

}