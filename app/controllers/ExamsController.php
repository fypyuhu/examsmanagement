<?php

use Carbon\Carbon;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExamsController
 *
 * @author Muhammad
 */
class ExamsController extends \BaseController {
     public function __construct()
    {
        $this->beforeFilter('auth');
        
      
    }
    	/**
	 * Display a listing of categories
	 *
	 * @return Response
	 */
         
	public function index()
	{
		$exams = Exam::where('user_id',Auth::user()->id)->get();
             
      
                
                
		return View::make('user.exams.index', compact('exams'));
	}

        public function toQuestionHash($category_id){
            $arr = [];
            $questions = Question::where('user_id',Auth::user()->id)->where('category_id',$category_id)->get();
            foreach($questions as $q)
             
                $arr[$q->id] = $q->statement;
            
            return $arr;
        }
        public function getQuestion(){
           
            $exam_id = Input::get('exam_id');
            
            $exam = Exam::findOrFail($exam_id);
            $questions = $this->toQuestionHash($exam->category_id);
            return 
            View::make('user.exams.question',compact('exam','questions'));
        }
        public function postQuestion(){
            
            $question_id = Input::get('question');
            $exam_id = Input::get('exam_id');
            
            
            ExamQuestion::create(['exam_id' => $exam_id,'question_id' => $question_id]);
          
            
            
            return Redirect::to("/exams/question?exam_id=$exam_id");
            
        }
         public function getDquestion(){
            
            $question_id = Input::get('question_id');
            $exam_id = Input::get('exam_id');
            
            
           ExamQuestion::where('exam_id',$exam_id)->where('question_id',$question_id)->delete();
            
            
            
            return Redirect::to("/exams/question?exam_id=$exam_id");
            
        }
        public function toStudentHash(){
            $arr = [];
            $students = Student::where('user_id',Auth::user()->id)->get();
            foreach($students as $s)
             
                $arr[$s->id] = $s->name." - ".$s->email;
            
            return $arr;
        }
        
        
        public function getStudent(){
           
            $exam_id = Input::get('exam_id');
            
            $exam = Exam::findOrFail($exam_id);
            $studenthash = $this->toStudentHash();
                
            return 
            View::make('user.exams.student',compact('exam','studenthash'));
        }
        public function postStudent(){
            
            $student_id = Input::get('student_id');
            $exam_id = Input::get('exam_id');
            
            
            ExamStudent::create(['exam_id' => $exam_id,'student_id' => $student_id]);
          
            
            
            return Redirect::to("/exams/student?exam_id=$exam_id");
            
        }
         public function getDstudent(){
            
            $question_id = Input::get('student_id');
            $exam_id = Input::get('exam_id');
            
            
            ExamStudent::where('exam_id',$exam_id)->where('student_id',$question_id)->delete();
                
            
            
            return Redirect::to("/exams/student?exam_id=$exam_id");
            
        }
        public function getSending(){
            
            $exam_id = Input::get('exam_id');
            $exam = Exam::where('id',$exam_id)->first();
            
            $students = $exam->students()->get();
            foreach($students as $s){
               
                ExamStudent::where('exam_id',$exam_id)->where('student_id',$s->id)->update(['hash' => Hash::make($exam_id+$s->id),'start' => '','end'=>'']) ;
                
            }
            foreach($students as $s){
                $hash =  ExamStudent::where('exam_id',$exam_id)->where('student_id',$s->id)->first()->hash;
                
             $data = [
                 'hash' => $hash,
                     ];
                Mail::send('emails.welcome', $data, function($message) use ($s)
                {
                  $message->to($s->email, $s->name)
                          ->subject('Welcome to Exam!');
                });

            }
            return Redirect::to("/exam?exam_id=$exam_id");
            
        }
        
	/**
	 * Show the form for creating a new category
	 *
	 * @return Response
	 */
	public function create()
	{
               $categories = Category::toOptionArray();
		return View::make('user.exams.create',compact('categories'));
	}

	/**
	 * Store a newly created category in storage.
	 *
	 * @return Response
	 */
        public function rules(){
            return [
              'range' =>'required',
               'title' => 'required',
                'duration' => 'required'
            ];
            
            
        }
        public function dateTokenzer($str){
            $token = strtok($str, "-");
            $arr =[];
            
            while ($token !== false)
            {
                array_push($arr, $token);
            $token = strtok("-");
            } 
            return $arr;
            
        }
        
        
	public function store()
	{
		
                
                
                $validator = Validator::make($data = Input::all(), $this->rules());
                
                
                
		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
                
                
                
                $data['user_id'] = Auth::user()->id;
               $date_time = $this->dateTokenzer($data['range']);
                $start = $date_time[0];
               $end = $date_time[1];
               $start = Carbon::parse($start);
               $end = Carbon::parse($end);
               
            
                $data['start'] = $start;
                $data['end'] = $end;
                
                Exam::create($data);
                
		return Redirect::route('exam.index');
	}

	/**
	 * Display the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$category = Category::findOrFail($id);

		return View::make('admin.categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified category.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$exam = Exam::find($id);
                
		return View::make('user.exams.edit', compact('exam'));
	}

	/**
	 * Update the specified category in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$exam = Exam::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Exam::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
                
                $date_time = $this->dateTokenzer($data['range']);
                
                $start = $date_time[0];
                 $end = $date_time[1];
                
                $start = Carbon::parse($start);
                $end = Carbon::parse($end);

            
                $data['start'] = $start;
                $data['end'] = $end;
                
                
		$exam->update($data);

		return Redirect::route('exam.index');
	}

	/**
	 * Remove the specified category from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Exam::destroy($id);

		return Redirect::route('exam.index');
	}

    //put your code here
}
