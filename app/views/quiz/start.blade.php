@extends('sessions.template')

@section('content')

 <div class="login-box">
      <div class="login-logo">
        <a href="{{URL::to('/')}}/assets/index2.html"><b>Quiz </b> Online</a>
      </div>
        <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><b>WELCOME !</b> {{$student->name}}</p>
       @include('partials.error.list',compact('errors')) 
       
      <center><p >here You can start the quiz</p></center> 
      <h4>Quiz Details</h4>
      <details>
          Quiz Title : {{$exam->title}}<br>
          Can start : {{$exam->start}}<br>
          will end : {{$exam->end}}<br>
          Duration : {{$exam->duration}} hour<br>
          Total Questions : {{$exam->questions()->count()}} <br>
      </details>
      <h3>Warning:</h3><p>Once You start the exam Your link will be experied</p>
      @include('partials.button.link',['link'=>"/quiz/clickstart?hash=$hash",'title'=>'Start the Quiz'])

        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop