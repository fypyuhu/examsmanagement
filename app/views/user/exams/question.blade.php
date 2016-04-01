@extends('user.main')

@section('title')
Exams
@stop

@section('content')





@include('partials.error.list',compact('errors')) 

 {{Form::open(array('url' => "exams/question?exam_id=".$exam->id))}}
 
    @include('partials.select.select',[ 'name'=>'question','options'=>$questions])
       
 
 @include('partials.button.submit')
               
  {{Form::close()}}
  
  
  @include('user.exams._qtable',['questions'=>$exam->questions()->get(),'exam_id'=>$exam->id])



@stop