<?php
use Carbon\Carbon;

class QuizController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /quiz
	 *
	 * @return Response
	 */
    public function isValidTimeToStart($exam){
         $current =   Carbon::now()->timestamp;
        $start =    Carbon::parse($exam->start)->timestamp;
     
       $end = Carbon::parse($exam->end)->timestamp;
          
        if($start <= $current   && $current < $end){
                return true;
                
            }
            
        echo "Quiz is Expired";
        exit();
        }
    public function validateHash($hash){
        $arr = [];
       $es =  ExamStudent::where('hash',$hash);
        if($es->count()){
            $es = $es->first();
            $arr['student_id'] = $es->student_id;
            $arr['exam_id'] = $es->exam_id;
            return $arr;
        }
        else{
            
            echo "Your link is Experied";
            exit();
            
        }
    }
    public function updateStartAndEndTime($exam_id,$student_id,$duration){
        $es = ExamStudent::where('exam_id',$exam_id)->where('student_id',$student_id)->first();
        $es->start = Carbon::now();
        $es->end = Carbon::now()->addHours($duration);
        $es->update();
    }
    //////////////// 
    public function repeatedValidations(){
          
           $idss = $this->idsss();
         
            $student_id = $idss['student_id']; 
            $exam_id = $idss['exam_id'];
          
            
//flushing hash
//  $this->flushHash($student_id, $exam_id);
            
            
            
            $exam  = Exam::where('id',$exam_id)->first();
             $this->isValidTimeToStart($exam); 
          
             $es = ExamStudent::where('student_id',$student_id)->where('exam_id',$exam_id)->first();
           
             if($es->start == ''){
               $this->updateStartAndEndTime($exam_id, $student_id, $exam->duration);
             }else{
                 
                $this->isValidDurationPeriod($exam_id, $student_id);
                 
                 
             }
            
             
            
        }
     
public function idsss(){
    $hash = Input::get('hash');
           
           $arr = $this->validateHash($hash);
           $arr['hash'] = $hash;
           return $arr; 
           
    
}
        public function getStart(){
           
            $idss = $this->idsss();
            $student_id =  $idss['student_id'];
            $exam_id = $idss['exam_id'];
            
            $student = Student::where('id',$student_id)->first();
            $exam = Exam::where('id',$exam_id)->first();
            
            $this->isValidTimeToStart($exam);
            
            $hash = $idss['hash'];
             
            return View::make('quiz.start',compact('student','exam','hash'));
            
            
        }
        
        
        
       
        public function getClickstart(){
            $idss = $this->idsss();
         
            $this->repeatedValidations(); 
           
            $student_id = $idss['student_id']; 
            $exam_id = $idss['exam_id'];
          
           // return View::make('quiz.start',compact('student','exam'));
           $this->timeRemainig($student_id, $exam_id);
           
           $hash = $idss['hash'];
            return Redirect::to("/quiz/question?hash=$hash");
           
        }
        public function getQuestion(){
           $this->repeatedValidations(); 
          $idss = $this->idsss();
         
            $student_id = $idss['student_id']; 
            $exam_id = $idss['exam_id'];
            
            
             $hash = $idss['hash'];
            $this->timeRemainig($student_id, $exam_id);
         
            $question_id = $this->getQuestionID($exam_id,$student_id,$hash);
            $question = Question::where('id',$question_id)->first();
           $remaining = $this->timeRemainig($student_id, $exam_id); 
           $options =  $this->options($question);
          
           return View::make('quiz.question',compact('question','remaining','options','hash'));
           
            
        }
 
           
   
      public function getQuestionID($exam_id,$student_id,$hash){
         
          $dquestions = Result::select('question_id')->where('exam_id',$exam_id)->where('student_id',$student_id)->get();
            
            $questions = ExamQuestion::select('question_id')->where('exam_id',$exam_id)->get();
            $found = false;
           foreach($questions as $q){
            $found = false;
               foreach($dquestions as $dq){
                    if($q->question_id == $dq->question_id){
                        $found = true;
                        break;
                    }
                    
                }
                if($found == false){
                    
                    return $q->question_id;
                }
                    
                }
                echo Redirect::to("/quiz/result?hash=$hash");
                //echo "quiz is done";
             
               // Session::flush();
                exit();
            }
          public function getResult(){
                $idss = $this->idsss();
                $exam_id = $idss['exam_id'];
                $student_id = $idss['student_id'];
                
                $results = Result::where('exam_id',$exam_id)->where('student_id',$student_id)->get();
                
                return View::make('quiz.result',compact('results'));
              
          }
          public  function  postQuestionsub(){
              
                   $idss = $this->idsss();
               $option =  Input::get('option');
               $question_id = Input::get('question_id');
               $exam_id = $idss['exam_id'];
               $student_id = $idss['student_id'];
               $question = Question::where('id',$question_id)->first();
               
               if($option == ''){
                    return Redirect::back()->withErrors(['You Must Select One']);                 
               }
               
              $correct = $question->correct;
              $isCorrect = 0; 
              if($option == $correct)
                  $isCorrect =1;
              
             $result = new Result();
              $result->question_id = $question_id;
              $result->exam_id = $exam_id;
              $result->student_id = $student_id;
              $result->isCorrect = $isCorrect;
              $result->option = $option;
              $result->save();
              $hash = $idss['hash'] ;
            return Redirect::to("/quiz/question?hash=$hash");   
           }

        
        
        public function timeRemainig($student_id,$exam_id){
            
            $es = ExamStudent::where('student_id',$student_id)->where('exam_id',$exam_id)->first();
           $current  = Carbon::now()->timestamp;
           
           $end = Carbon::parse($es->end)->timestamp;
    
          
           $seconds = $end - $current;
           $miniute = round($seconds / 60 , 2);
           
           return $miniute;
           
        }
            
        
        public function flushHash($student_id,$exam_id){
            ExamStudent::where('student_id',$student_id)->where('exam_id',$exam_id)->update(['hash' => '']);
            
        }
        public function isValidDurationPeriod($exam_id,$student_id){
            $es = ExamStudent::where('exam_id',$exam_id)->where('student_id',$student_id)->first();
            
            $current =   Carbon::now()->timestamp;
               
        $end =    Carbon::parse($es->end)->timestamp;
     
          
        if($end > $current){
                return true;
                
            }
            
        echo "Quiz Time is Up";
        exit();
            
        }
        
           public function options($question){
          
          	
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
            
            return $options;
 
      } 
                }


