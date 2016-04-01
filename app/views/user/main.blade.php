@extends('user.template')

@section('aside')
<ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
              </a>
             
            </li>
            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Question</span> <i class="fa fa-angle-left pull-right"></i>
                
              </a>
              <ul class="treeview-menu">
             
                 <li><a href="{{route('uquestion.index')}}"><i class="fa fa-circle-o"></i> View All Questions</a></li>
                 <li><a href="{{route('uquestion.create')}}"><i class="fa fa-circle-o"></i> Add new Question</a></li>
             
              </ul>
            </li>
               <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Student</span> <i class="fa fa-angle-left pull-right"></i>
                
              </a>
              <ul class="treeview-menu">
             
                 <li><a href="{{route('student.index')}}"><i class="fa fa-circle-o"></i> View All </a></li>
                 <li><a href="{{route('student.create')}}"><i class="fa fa-circle-o"></i> Add new </a></li>
             
              </ul>
            </li>
             <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Exam</span> <i class="fa fa-angle-left pull-right"></i>
                
              </a>
              <ul class="treeview-menu">
             
                 <li><a href="{{route('exam.index')}}"><i class="fa fa-circle-o"></i> View All </a></li>
                 <li><a href="{{route('exam.create')}}"><i class="fa fa-circle-o"></i> Add new </a></li>
             
              </ul>
            </li>
      
            
         </ul>
@stop