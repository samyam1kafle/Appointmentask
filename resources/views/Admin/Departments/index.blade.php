@extends('Admin.layouts.master')
@section('main_content')


    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Department Details</div>
                    </div>

                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Department</a>&nbsp;<i
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
                            <header>Department Details</header>
                            <a class="parent-item pull-right btn btn-primary" href="{{ route('department.create') }}">Add
                                +</a>

                        </div>
                        <div class="card-body " id="bar-parent">
                            <table id="exportTable" class="display nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Parent</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($department as $depart)
                                    <tr>
                                        <td>{{$depart->id}}</td>
                                        <td>{{$depart->name}}</td>
                                        @if($depart->parent_id)
                                        <td>{{$depart->parent_id}}</td>
                                        @else
                                        <td>Default Parent</td>
                                        @endif
                                        <td>{!! $depart->description !!}</td>
                                        <td class="text-left">
                                        
                                        <form action="{{ route('department.edit', $depart->id)}}" method="GET" style="display: inline-block">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                                        </form>
                                      
                                        <form action="{{ route('department.destroy', $depart->id)}}" method="post" style="display: inline-block">
                                         {{csrf_field()}}
                                         {{method_field('DELETE')}}
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
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
    <!-- end page content -->



@endsection