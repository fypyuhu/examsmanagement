@extends('user.main')

@section('title')
Questions
@stop

@section('content')





@include('partials.error.list',compact('errors')) 

@include('user.questions._table',compact('questions'))


@stop