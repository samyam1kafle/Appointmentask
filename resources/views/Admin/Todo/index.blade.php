@extends('Admin.layouts.master')
@section('main_content')


    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">ToDoS Details</div>
                    </div>

                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">ToDoS</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Details</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>ToDoS Details</header>
                            <a class="parent-item pull-right btn btn-primary" href="{{ route('Todo.create') }}">Add
                                +</a>
                        </div>
                        <div class="card-body " id="bar-parent">
                            <table id="exportTable" class="display nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Assigned To</th>
                                    <th>Assigned Date </th>
                                    <th>Deadline</th>
                                    <th>Task Status</th>
                                    <th>Set Status</th>
                                    <th>Action</th>
                                    @foreach($Todos as $Todos_data)
                                    @if($Todos_data->reassignedto)
                                    <th>Re-Assigned To</th>
                                    <th>Re-Assigned Date </th>
                                    <th>Re-Deadline</th>
                                    @endif
                                    @endforeach                                    
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($Todos as $Todos_data)
                                    <tr>
                                        <td><a href="{{route('Todo-detail',$Todos_data->title)}}">{{$Todos_data->title}}</a></td>
                                        <td>{{$Todos_data->employee['name']}}</td>
                                        <td>{{$Todos_data->assignedDate}}</td>
                                        <td>{{$Todos_data->DeadLine}}</td>
                                        <td> @if($Todos_data->status==0)
                                                        Pending
                                                    @else
                                                        Completed
                                                    @endif</td>  
                                        
                                        <td class="valigntop">
                                            <div class="btn-group">
                                                <button
                                                        class="btn btn-xs  dropdown-toggle no-margin"
                                                        type="button" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                    @if($Todos_data->status==0)
                                                        Pending
                                                    @else
                                                        Completed
                                                    @endif
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">                                                   
                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action="{{route('pending',$Todos_data->id)}}"
                                                                  method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn "
                                                                        type="submit"><span
                                                                            class=""></span> Pending
                                                                </button>
                                                            </form>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action="{{route('complete',$Todos_data->id)}}"
                                                                  method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn " type="submit">
                                                                    <span class=""></span> Completed
                                                                </button>
                                                            </form>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action="{{route('reassign',$Todos_data->id)}}"
                                                                  method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn " type="submit">
                                                                    <span class=""></span> Re-assign
                                                                </button>
                                                            </form>
                                                        </a>
                                                    </li>

                                                    
                                                </ul>
                                            </div>
                                        </td>                                       
                                        <td class="text-left">                                                                                          
                                                <a href="javascript:;">
                                                    <form action="{{ route('Todo.edit', $Todos_data->id)}}"  method="GET"
                                                                  style="display: inline-block">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn btn-primary btn-sm" type="submit">
                                                                    <span class="fa fa-pencil"></span></button>
                                                            </form>
                                                        </a>
                                                   
                                                        <a href="javascript:;">
                                                            <form action="{{ route('Todo.destroy', $Todos_data->id)}}"
                                                                  method="post" style="display: inline-block">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button class="btn btn-danger btn-sm" type="submit">
                                                                    <span class="fa fa-trash-o"></span></button>
                                                            </form>
                                                        </a>                                               
                                                </td>
                                            @if($Todos_data->reassignedto)
                                                <td>{{@$Todos_data->reassignto['name']}}</td>
                                                <td>{{$Todos_data->reAssignedDate}}</td>
                                                <td>{{$Todos_data->reDeadLine}}</td>                                        
                                            @endif
                                            </div>
                                            
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content -->



@endsection
