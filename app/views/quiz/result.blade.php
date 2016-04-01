@extends('sessions.template')
@section('content')




 <div class="login-box">
      <div class="login-logo">
        <a href="{{URL::to('/')}}"><b>Quiz </b> Online</a>
      </div>
        <!-- /.login-logo -->
         <center> <p class="login-box-msg"><b><h3>Your Result</h3></b> </p></center>

      <div class="login-box-body">
         
        <p class="login-box-msg"><b></b> </p>
       @include('partials.error.list',compact('errors')) 
<div class="w3-container">
    <div class="w3-padding-jumbo w3-light-grey">
        
 
        <table border="1">
            <tr><td>Question</td><td>Your Selected</td><td>Correct</td><td>Status</td></tr>
        <?php
        $ccount=0;
            $total =$results->count();
        ?>
        @foreach($results  as  $r)    
            <?php
            $q = $r->question()->first();
            
            ?>
            <tr><td>{{$q->statement}}</td><td>{{Question::solve($r->option,$q->id)}}</td><td>{{Question::solve($q->correct,$q->id)}}</td>
                <td>
                    @if($r->isCorrect) 
                    <?php $ccount = $ccount +1 ;?>
                    <label style="color:green">Correct</label>
                    @else
                    <label style="color:red">Wrong</label>
                    @endif
                </td>
            </tr>
           
        @endforeach
        
</table>    
        <p>
            <b> Total Questions : </b>{{$total}}<br>
            <b>Total Correct : </b>{{$ccount}}<br>
            <b>Total Wrong : </b>{{$total - $ccount}}<br>
        </p> 
        <br>
    </div>
</div>

       
 
        
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@stop