@extends('admin.template')
@section('title')
Users    
@stop
@section('purpose')
Create a User    
@stop
@section('content')
  {{Form::open(array('route' => 'user.store'))}}
                
        @include('partials.input.email',['errors'=>$errors,'name' =>'email','value'=>''])
       
        @include('partials.input.password',['errors'=>$errors,'name' =>'password'])
        @include('partials.input.text',['errors'=>$errors,'name' =>'name','example' => 'name','value'=>''])
       
           
        @include('partials.button.submit')
              
  {{Form::close()}}
  

@stop