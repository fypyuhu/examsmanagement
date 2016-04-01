@extends('user.main')

@section('title')
Exam
@stop

@section('purpose')
Edit a Exam
@stop
@section('content')
{{Form::model($exam, ['route' => ['exam.update', $exam->id]])}}
<input type="hidden" name="_method" value="PATCH">
 
       @include('partials.input.text',['errors'=>$errors,'name' =>'title','example' => 'title','value'=>$exam->title])
       @include('partials.date.range')
        
       @include('partials.input.numeric',['errors'=>$errors,'name' =>'duration','example' => 'duration','value'=>$exam->duration])
          
    
   @include('partials.button.submit')
{{Form::close()}}

@stop