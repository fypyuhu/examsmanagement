@extends('admin.template')
@section('title')
Questions    
@stop
@section('purpose')
Create a Question    
@stop
@section('content')
@include('partials.error.list',compact('errors')) 
  {{Form::open(array('route' => 'question.store'))}}
                
       @include('partials.select.select',[ 'name'=>'category_id','options'=>$categories])
        
        @include('partials.input.text',['errors'=>$errors,'name' =>'statement','example' => 'statement','value'=>''])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op1','example' => 'op1','value'=>''])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op2','example' => 'op2','value'=>''])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op3','example' => 'op3','value'=>''])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op4','example' => 'op4','value'=>''])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op5','example' => 'op5','value'=>''])
       
           
        @include('partials.button.submit')
              
  {{Form::close()}}
  

@stop