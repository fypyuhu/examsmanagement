@extends('user.template')

@section('title')
Student
@stop

@section('purpose')
Edit a Student
@stop
@section('content')
{{Form::model($student, ['route' => ['student.update', $student->id]])}}
<input type="hidden" name="_method" value="PATCH">
 
          @include('partials.input.text',['errors'=>$errors,'name' =>'name','example' => 'name','value'=>$student->name])
           @include('partials.input.email',['errors'=>$errors,'name' =>'email','value'=>$student->email])
     
    
   @include('partials.button.submit')
{{Form::close()}}

@stop