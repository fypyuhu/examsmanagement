<div class="col-xs-12">
       
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Exam Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="dataTables_wrapper form-inline dt-bootstrap" id="example1_wrapper">
                  
                  
   
                      
                      <div class="row"><div class="col-sm-12">
                              
                <table  class="table table-bordered table-striped dataTable">
                <thead>
                <tr role="row">
                    <th >title</th>
                    <th >start</th>
                    <th >end</th>
                    
                    <th >duration</th>
                 
                    <th >Questions</th>
                    <th >students</th>
                    
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($exams as $e)
                <tr class="even" role="row">
              
               
                  <td>{{$e->title }}</td>
                  <td>{{$e->start}}</td>
                  <td>{{$e->end}}</td>
                  <td>{{$e->duration}}</td>
                  <td>{{$e->questions()->count()}}</td>
                  <td>{{$e->students()->count()}}</td>
                    
                  <td>    
                      
                    @include('partials.button.link',['title' => 'Students' , 'link'=>"exams/student?exam_id=$e->id"])
                    @include('partials.button.link',['title' => 'Questions' , 'link'=>"exams/question?exam_id=$e->id"])
        
                    @include('partials.button.edit',['table'=>$e,'route'=>'exam'])
        
                    @include('partials.button.delete',['table'=>$e,'route'=>'exam'])
                      
                    @include('partials.button.link',['title' => 'Send Invitation' , 'link'=>"/exams/sending?exam_id=$e->id"])
                    @include('partials.button.link',['title' => 'Results' , 'link'=>'#'])
                    
                  </td>
                </tr>
                 @endforeach
                </tbody>
              
              </table></div></div>
                  
                  
                    </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
