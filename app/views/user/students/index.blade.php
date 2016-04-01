@extends('user.main')

@section('title')
Students
@stop

@section('content')





@include('partials.error.list',compact('errors')) 

@include('user.students._table',compact('students'))


@stop