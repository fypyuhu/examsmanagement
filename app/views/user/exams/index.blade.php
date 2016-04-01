@extends('user.main')

@section('title')
Exams
@stop

@section('content')





@include('partials.error.list',compact('errors')) 

@include('user.exams._table',compact('exams'))


@stop