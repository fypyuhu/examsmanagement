@extends('admin.template')

@section('title')
Questions
@stop

@section('purpose')
Showing a Question
@stop
@section('content')
<?php 
$category = $question->category()->first();

?>

 @include('partials.label.label',[ 'value'=>"Category: ".$category->title])
    
    @include('partials.label.label',[ 'value'=>"Statement: ".$question->statement ])
    
     @include('admin.questions._options',compact('options'))
            
    @include('partials.label.label',[ 'value'=>"Correct : ".$question->correct ])
     
    

@stop