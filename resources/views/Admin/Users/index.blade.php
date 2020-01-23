@extends('Admin.layouts.master')
@section('main_content')
    <!-- start page content -->

    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">User Table</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="{{route('user.index')}}">Users</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">All Users</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-topline-red">
                        <div class="card-head">
                            <header>Users Details</header>
                            <div class="tools">
                                <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-6">
                                    <a class="parent-item btn btn-primary" href="{{ route('user.create') }}">Add
                                        +</a>
                                </div>
                            </div>
                            <div class="table-scrollable">
                                <table
                                        class="table table-striped table-bordered table-hover table-checkable order-column"
                                        id="example4">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Department</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)

                                        <tr class="odd gradeX">
                                            <td>
                                                {{$user->name}}
                                            </td>
                                            <td> {{$user->roles->name}}</td>
                                            <td>
                                                <a href="mailto:{{$user->email}}"> {{$user->email}} </a>
                                            </td>
                                            @if($user->image)
                                                <td>
                                                    <img src="{{asset('Uploads/users/thumbnails/'.$user->image)}}"
                                                         alt="Users image" width="auto" height="60px">
                                                </td>
                                            @else
                                                <td>No image available</td>
                                            @endif
                                            @if($user->department_id)
                                                <td>{{$user->department->name}}</td>

                                            @else
                                                <td>No department assigned</td>
                                            @endif
                                            <td class="valigntop">
                                                <div class="btn-group">
                                                    <button
                                                            class="btn btn-xs deepPink-bgcolor dropdown-toggle no-margin"
                                                            type="button" data-toggle="dropdown"
                                                            aria-expanded="false">
                                                        Actions
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-left" role="menu">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <form action="{{ route('user.edit', $user->id)}}"
                                                                      method="GET"
                                                                      style="display: inline-block">
                                                                    {{csrf_field()}}
                                                                    {{method_field('PUT')}}
                                                                    <button class="btn btn-primary btn-sm"
                                                                            type="submit"><span
                                                                                class="note-icon-pencil"></span> Update
                                                                    </button>
                                                                </form>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <form action="{{ route('user.destroy', $user->id)}}"
                                                                      method="post"
                                                                      style="display: inline-block">
                                                                    {{csrf_field()}}
                                                                    {{method_field('DELETE')}}
                                                                    <button class="btn btn-danger btn-sm" type="submit">
                                                                        <span class="fa fa-trash-o"></span> Delete
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
    </div>

    <!-- end page content -->



@endsection