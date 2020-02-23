@extends('Admin.layouts.master')
@section('main_content')


    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Task Details</div>
                    </div>

                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">task</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All List</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card card-box">
                        <div class="card-head">
                            <header>Task List</header>
                        </div>
                        <div class="card-body " id="bar-parent">
                            <table id="exportTable" class="display nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Assign By</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                               @foreach($todo as $todos_list)
                                    <tr>
                                            <td><a href="{{route('EmployeeDetails',$todos_list->title)}}">{{$todos_list->title}}</a></td>

                                        <td>{{$todos_list->superadmin['name']}}</td>
                                        <td class="valigntop">
                                            <div class="btn-group">
                                                <button
                                                        class="btn btn-xs  dropdown-toggle no-margin"
                                                        type="button" data-toggle="dropdown"
                                                        aria-expanded="false">
                                                    @if($todos_list->status==0)
                                                        Pending
                                                    @else
                                                        Completed
                                                    @endif
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <ul class="dropdown-menu pull-left" role="menu">
                                                    <li>
                                                        <a href="javascript:;">
                                                            <a href="{{route('EmployeeDetails',$todos_list->title)}}">
                                                                <button class="btn "
                                                                        type="submit"><span
                                                                            class=""></span> View Detail
                                                                </button>
                                                        </a>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;">
                                                            <form action="{{route('EmployeePending',$todos_list->id)}}"
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
                                                            <form action="{{route('EmployeeComplete',$todos_list->id)}}"
                                                                  method="post">
                                                                {{csrf_field()}}
                                                                <input type="hidden" name="_method" value="PUT">
                                                                <button class="btn " type="submit">
                                                                    <span class=""></span> Completed
                                                                </button>
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
    <!-- end page content -->



@endsection
