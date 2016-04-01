@extends('user.main')
@section('title')
Exam
@stop
@section('purpose')
Create a Exam    
@stop
@section('content')
@include('partials.error.list',compact('errors')) 
  {{Form::open(array('route' => 'exam.store'))}}
       
  @include('partials.select.select',[ 'name'=>'category_id','options'=>$categories])
       
        @include('partials.input.text',['errors'=>$errors,'name' =>'title','example' => 'title','value'=>''])
                
        @include('partials.date.range')
        
        @include('partials.input.numeric',['errors'=>$errors,'name' =>'duration','example' => 'duration','value'=>''])
          
        @include('partials.button.submit')
               
  {{Form::close()}}
  

@stop