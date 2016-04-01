@extends('admin.template')
@section('title')
Categories
@stop
@section('purpose')
Create a Category    
@stop
@section('content')
@include('partials.error.list',compact('errors')) 
  {{Form::open(array('route' => 'category.store'))}}
                
       
        @include('partials.input.text',['errors'=>$errors,'name' =>'title','example' => 'statement','value'=>''])
     
           
        @include('partials.button.submit')
              
  {{Form::close()}}
  

@stop