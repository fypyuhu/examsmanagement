@extends('admin.template')

@section('title')
Questions
@stop

@section('purpose')
Edit a Question
@stop
@section('content')
{{Form::model($question, ['route' => ['question.update', $question->id]])}}
<input type="hidden" name="_method" value="PATCH">

 
    @include('partials.select.selected',[ 'name'=>'category_id','options'=>$categories,'selected' => $question->category_id])
        
        @include('partials.input.text',['errors'=>$errors,'name' =>'statement','example' => 'statement','value'=>$question->statement])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op1','example' => 'op1','value'=>$question->op1])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op2','example' => 'op2','value'=>$question->op2])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op3','example' => 'op3','value'=>$question->op3])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op4','example' => 'op4','value'=>$question->op4])
        @include('partials.input.text',['errors'=>$errors,'name' =>'op5','example' => 'op5','value'=>$question->op5])
       
           
     
    
   @include('partials.button.submit')
{{Form::close()}}

@stop