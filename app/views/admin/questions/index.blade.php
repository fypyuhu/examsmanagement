@extends('admin.template')

@section('title')
Questions
@stop

@section('content')





@include('partials.error.list',compact('errors')) 

@include('admin.questions._table',compact('questions'))


@stop