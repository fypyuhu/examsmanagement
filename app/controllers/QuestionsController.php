<?php

class QuestionsController extends \BaseController {
    public function __construct()
    {
        $this->beforeFilter('admin');
        
      
    }

	/**
	 * Display a listing of questions
	 *
	 * @return Response
	 */
	public function index()
	{
		$questions = Question::all();

		return View::make('admin.questions.index', compact('questions'));
	}

	/**
	 * Show the form for creating a new question
	 *
	 * @return Response
	 */
	public function create()
	{
            $categories = Category::toOptionArray();
		return View::make('admin.questions.create',compact('categories'));
	}

	/**
	 * Store a newly created question in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
          
		$validator = Validator::make($data = Input::all(), Question::$rules);
  
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
                
		//Question::create($data);
                Session::push('question', $data);
		return Redirect::to('/questions/next');
	}
        
        public function getNext(){
        if(Session::has('question'))
        {
            $question = Session::pull('question');
           
        }
        else{
            return Redirect::route('uquestion.create');
            
        }
        $options = [];
            if(!empty($question[0]['op1'])){
                $options['op1'] = $question[0]['op1'];
            }
                       if(!empty($question[0]['op2'])){
                           $options['op2'] = $question[0]['op2'];   
            }
 
                       if(!empty($question[0]['op3'])){
                             $options['op3'] = $question[0]['op3'];
            }
 
                       if(!empty($question[0]['op4'])){
                             $options['op4'] = $question[0]['op4'];
            }
 
                       if(!empty($question[0]['op5'])){
                             $options['op5'] = $question[0]['op5'];
    
            }
 
    //  return $question;
            
            return View::make('admin.questions.next',compact('question','options'));
            
        }
        public function anySave(){

            $validator = Validator::make($data = Input::all(), Question::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
                
                $data['user_id']=Auth::user()->id;
                
                Question::create($data);
                
            return Redirect::route('uquestion.index');
            
        }
        
	/**
	 * Display the specified question.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$question = Question::findOrFail($id);

                 $options = [];
            if(!empty($question->op1)){
                $options['op1'] = $question->op1;
            }
                       if(!empty($question->op2)){
                           $options['op2'] = $question->op2;   
            }
 
                       if(!empty($question->op3)){
                             $options['op3'] = $question->op3;
            }
 
                       if(!empty($question->op4)){
                             $options['op4'] = $question->op4;
            }
 
                       if(!empty($question->op5)){
                             $options['op5'] = $question->op5;
    
            }
 
		return View::make('admin.questions.show', compact('question','options'));
	}

	/**
	 * Show the form for editing the specified question.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$question = Question::find($id);
            $categories = Category::toOptionArray();

		return View::make('admin.questions.edit', compact('question','categories'));
	}

	/**
	 * Update the specified question in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$question = Question::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Question::$rules);
               
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
                
                 $question->update($data);
                 $data['correct'] = $question->correct;
                 $data['id'] = $question->id;
                          Session::push('questionupdate', $data);
		return Redirect::to('/questions/nextupdate');
	
	}
         public function getNextupdate(){


             if(Session::has('questionupdate'))
        {
            $question = Session::pull('questionupdate');
           
        }
        else{
            return Redirect::route('uquestion.index');
            
        }
        $options = [];
            if(!empty($question[0]['op1'])){
                $options['op1'] = $question[0]['op1'];
            }
                       if(!empty($question[0]['op2'])){
                           $options['op2'] = $question[0]['op2'];   
            }
 
                       if(!empty($question[0]['op3'])){
                             $options['op3'] = $question[0]['op3'];
            }
 
                       if(!empty($question[0]['op4'])){
                             $options['op4'] = $question[0]['op4'];
            }
 
                       if(!empty($question[0]['op5'])){
                             $options['op5'] = $question[0]['op5'];
    
            }
 
    //  return $question;
            
            return View::make('admin.questions.nextUpdate',compact('question','options'));
            
        }

	/**
	 * Remove the specified question from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
        
        public function anyQupdate(){
            $id = Input::get('id');
            	$question = Question::findOrFail($id);

           $validator = Validator::make($data = Input::all(), Question::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
                
                
                
                $question->update($data);
                
            return Redirect::route('uquestion.index');
            
        }
        
	public function destroy($id)
	{
		Question::destroy($id);

		return Redirect::route('uquestion.index');
	}
        
     

}
