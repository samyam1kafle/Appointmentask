@extends('Admin.layouts.master')
@section('main_content')


    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Available Time Details</div>
                    </div>

                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Avalable Time</a>&nbsp;<i
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
                            <header>Avaialable Time Details</header>
                            <a class="parent-item pull-right btn btn-primary" href="{{ route('AvailableTime.create') }}">Add
                                +</a>
                            @if(session('success'))
                                <p class="alert alert-success">{{session('success')}}</p>
                            @endif

                            @if(session('error'))
                                <p class="alert alert-danger">{{session('error')}}</p>
                            @endif
                        </div>
                        <div class="card-body " id="bar-parent">
                            <table id="exportTable" class="display nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>


                                    @foreach($time as $time_data)
                                    <tr>
                                        <td>{{$time_data->id}}</td>
                                        <td>{{$time_data->Date_Available['date']}}</td>
                                        <td>{{$time_data->time}}</td>
                                        <td class="text-left">

                                            <form action="{{ route('AvailableTime.edit', $time_data->id)}}" method="GET"
                                                  style="display: inline-block">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="PUT">
                                                <button class="btn btn-primary btn-sm" type="submit"><span class="fa fa-pencil"></span></button>
                                            </form>

                                            <form action="{{ route('AvailableTime.destroy', $time_data->id)}}"
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
    <!-- end page content -->



@endsection