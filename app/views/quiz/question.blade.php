@extends('sessions.template')
@section('content')




 <div class="login-box">
      <div class="login-logo">
        <a href="{{URL::to('/')}}/assets/index2.html"><b>Quiz </b> Online</a>
      </div>
        <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"><b>Time Remaining {{$remaining}} minutes</b> </p>
       @include('partials.error.list',compact('errors')) 
      {{Form::open(array('url' => "/quiz/questionsub?hash=$hash"))}}
      <input type="hidden" name="question_id" value="{{$question->id}}"  />
<div class="w3-container">
    <div class="w3-padding-jumbo w3-light-grey">
            <p class="w3-large" style="margin-bottom:30px;">{{$question->statement}}</p>


              @include('quiz._options',compact('options'))

            <br>
              @include('partials.button.submit')
    </div>
</div>

       
{{Form::close()}}
 
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@stop