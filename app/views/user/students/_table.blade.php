<div class="col-xs-12">
       
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Students Records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="dataTables_wrapper form-inline dt-bootstrap" id="example1_wrapper">
                  
                  
   
                      
                      <div class="row"><div class="col-sm-12">
                              
                <table  class="table table-bordered table-striped dataTable">
                <thead>
                <tr role="row">
                    <th >name</th>
                    <th >email</th>
                   
                    
                    <th >Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $s)
                <tr class="even" role="row">
              
               
                  <td>{{$s->name }}</td>
                  <td>{{$s->email}}</td>
                 
               
                    
                  <td>    
                      
                   
                    @include('partials.button.edit',['table'=>$s,'route'=>'student'])
        
                    @include('partials.button.delete',['table'=>$s,'route'=>'student'])
                      
                
                    
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
