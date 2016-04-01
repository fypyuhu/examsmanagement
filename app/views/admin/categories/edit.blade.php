@extends('admin.template')

@section('title')
Categories
@stop

@section('purpose')
Edit a Category
@stop
@section('content')
{{Form::model($category, ['route' => ['category.update', $category->id]])}}
<input type="hidden" name="_method" value="PATCH">
 
         @include('partials.input.text',['errors'=>$errors,'name' =>'title','example' => 'title','value'=>$category->title])
     
    
   @include('partials.button.submit')
{{Form::close()}}

@stop