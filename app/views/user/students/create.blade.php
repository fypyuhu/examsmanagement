@extends('user.main')
@section('title')
Student
@stop
@section('purpose')
Create a Student    
@stop
@section('content')
@include('partials.error.list',compact('errors')) 
  {{Form::open(array('route' => 'student.store'))}}
        @include('partials.input.text',['errors'=>$errors,'name' =>'name','example' => 'name','value'=>''])
           @include('partials.input.email',['errors'=>$errors,'name' =>'email','value'=>''])
             
          
        @include('partials.button.submit')
               
  {{Form::close()}}
  

@stop