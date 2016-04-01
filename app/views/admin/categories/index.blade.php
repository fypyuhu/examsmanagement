@extends('admin.template')

@section('title')
Categories
@stop

@section('content')





@include('partials.error.list',compact('errors')) 

@include('admin.categories._table',compact('categories'))


@stop