@extends('user.main')

@section('title')
Exams
@stop

@section('content')





@include('partials.error.list',compact('errors')) 

 {{Form::open(array('url' => "exams/student?exam_id=".$exam->id))}}
 
    @include('partials.select.select',[ 'name'=>'student_id','options'=>$studenthash])
       
 
 @include('partials.button.submit')
               
  {{Form::close()}}
  
  
  @include('user.exams._stable',['students'=>$exam->students()->get(),'exam_id'=>$exam->id])



@stop