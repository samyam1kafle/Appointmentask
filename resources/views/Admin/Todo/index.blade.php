@extends('Admin.layouts.master')
@section('main_content')


    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Available Todo Details</div>
                    </div>

                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('Todo.index')}}"> Todo</a>&nbsp;<i
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
                            <header>Avaialable Todo Details</header>
                            <a class="parent-item pull-right btn btn-primary" href="{{ route('Todo.create') }}">Add
                                +</a>
                        </div>
                        <div class="card-body " id="bar-parent">
                            <table id="exportTable" class="display nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Assigned Date</th>
                                    <th>Completed Date</th>
                                    <th>Assigned To</th>
                                    <th>Requested By</th>
                                    <th>Deadline</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Todos as $Todos_data)
                                    <tr>
                                        <td>{{$Todos_data->User_id}}</td>
                                        <td>{{$Todos_data->title}}</td>
                                        <td>{{$Todos_data->description}}</td>
                                        <td>{{$Todos_data->assignedDate}}</td>
                                        <td>{{$Todos_data->CompletedDate}}</td>
                                        <td>{{$Todos_data->assignedTo}}</td>
                                        <td>{{$Todos_data->requestedBy}}</td>
                                        <td>{{$Todos_data->DeadLine}}</td>
                                        <td>{{$Todos_data->status}}</td>
                                        <td class="text-left">

                                            <form action="{{ route('Todo.edit', $Todos_data->id)}}" method="GET"
                                                  style="display: inline-block">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="PUT">
                                                <button class="btn btn-primary btn-sm" type="submit"><span class="fa fa-pencil"></span></button>
                                            </form>

                                            <form action="{{ route('Todo.destroy', $Todos_data->id)}}"
                                                  method="post" style="display: inline-block">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm" type="submit"><span class="fa fa-trash-o"></span></button>
                                            </form>
                                        </td>
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
@endsection