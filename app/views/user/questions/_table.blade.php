<div class="col-xs-12">
       
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Questions Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="dataTables_wrapper form-inline dt-bootstrap" id="example1_wrapper">
                  
                  
   
                      
                      <div class="row"><div class="col-sm-12">
                              
                <table  class="table table-bordered table-striped dataTable">
                <thead>
                <tr role="row">
                   <th >Statement</th><th >Actions</th></tr>
                </thead>
                <tbody>
                @foreach($questions as $q)
                <tr class="even" role="row">
             
               
                  <td>{{$q->statement }}</td>
                 
                  <td>    
                     
                      @include('partials.button.show',['table'=>$q,'route'=>'uquestion'])
        
                      @include('partials.button.edit',['table'=>$q,'route'=>'uquestion'])
        
                      @include('partials.button.delete',['table'=>$q,'route'=>'uquestion'])
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
