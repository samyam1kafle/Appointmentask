@extends('Admin.layouts.master')
@section('main_content')
    <!-- start page content -->
    <div class="page-content-wrapper" >
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
            <div class="row" >
                <div class="col-md-12 col-sm-12" >
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Avaialable Todo Details</header>
                            <a class="parent-item pull-right btn btn-primary" href="{{ route('Todo.create') }}">Add
                                +</a>
                        </div>
                        <div class="card-body " id="bar-parent">
                            <table id="exportTable" class="display nowrap">
                        <div class="table-scrollable " id="bar-parent">
                            <table id="exportTable" class="display nowrap" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Assigned Date</th>
                                    <th>Completed Date</th>
                                    <th>Assigned To</th>
                                    <th>Re-Assigned To</th>
                                    <th>Assigned By</th>
                                    <th>Deadline</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($Todos as $Todos_data)
                                    <tr>
                                        <td>{{$Todos_data->title}}</td>
                                        <td>{!!$Todos_data->description!!}</td>
                                        <td>{{$Todos_data->assignedDate}}</td>
                                        @if($Todos_data->status==0)
                                            {{$Todos_data->CompletedDate='Pending'}}
                                        @else
                                            {{$Todos_data->CompletedDate}}
                                        @endif
                                        <td>{{$Todos_data->CompletedDate}}</td>
                                        <td>{{$Todos_data->employee['name']}}</td>
                                        <td>{{@$Todos_data->reassignto['name']}}</td>
                                        <td>{{$Todos_data->superadmin['name']}}</td>
                                        <td>{{$Todos_data->DeadLine}}</td>
                                        <td>{{$Todos_data->remarks  }}</td>

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

                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action="{{ route('Todo.edit', $Todos_data->id)}}"
                                                                  method="GET"
                                                                  style="display: inline-block">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn btn-primary btn-sm" type="submit">
                                                                    <span class="fa fa-pencil"></span></button>
                                                            </form>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action="{{ route('Todo.destroy', $Todos_data->id)}}"
                                                                  method="post" style="display: inline-block">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button class="btn btn-danger btn-sm" type="submit">
                                                                    <span class="fa fa-trash-o"></span></button>
                                                            </form>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>
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
    </div>
@endsection