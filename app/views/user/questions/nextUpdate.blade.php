@extends('user.main')
@section('title')
Questions    
@stop
@section('purpose')
Create a Question    
@stop
@section('content')
@include('partials.error.list',compact('errors')) 
  {{Form::open(array('url' => '/uquestions/qupdate'))}}
                
        @include('partials.input.hidden',['errors'=>$errors,'name' =>'id','example' => '','value'=>$question[0]['id']])
       
        @include('partials.input.hidden',['errors'=>$errors,'name' =>'statement','example' => 'statement','value'=>$question[0]['statement']])
        
        @include('partials.input.hidden',['errors'=>$errors,'name' =>'op1','example' => 'op1','value'=>$question[0]['op1']])
        @include('partials.input.hidden',['errors'=>$errors,'name' =>'op2','example' => 'op2','value'=>$question[0]['op2']])
        @include('partials.input.hidden',['errors'=>$errors,'name' =>'op3','example' => 'op3','value'=>$question[0]['op3']])
        @include('partials.input.hidden',['errors'=>$errors,'name' =>'op4','example' => 'op4','value'=>$question[0]['op4']])
        @include('partials.input.hidden',['errors'=>$errors,'name' =>'op5','example' => 'op5','value'=>$question[0]['op5']])
        @include('partials.input.hidden',['errors'=>$errors,'name' =>'category_id','example' => 'category_id','value'=>$question[0]['category_id']])
        
        
        @include('partials.label.label',['value'=>"Question : ".$question[0]['statement']])
        
        
        
        @include        ('admin.questions._options',compact('options'))
        
        
        @include('partials.select.selected',[ 'name'=>'correct','options'=>$options,'selected'=>$question[0]['correct'] ])
        
        @include('partials.button.submit')
              
  {{Form::close()}}
  

@stop