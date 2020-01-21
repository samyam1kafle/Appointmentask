@extends('Admin.layouts.master')
@section('main_content')


    <!-- start page content -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Available Date Details</div>
                    </div>

                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                               href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i
                                    class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="">Avalable Date</a>&nbsp;<i
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
                            <header>Avaialable Date Details</header>
                            <a class="parent-item pull-right btn btn-primary" href="{{ route('AvailableDate.create') }}">Add
                                +</a>

                            <div>
                                @if(session('success'))
                                    <p class="alert alert-success">{{session('success')}}</p>
                                @endif

                                @if(session('error'))
                                    <p class="alert alert-danger">{{session('error')}}</p>
                                @endif
                            </div>
                        </div>
                        <div class="card-body " id="bar-parent">
                            <table id="exportTable" class="display nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($Date as $Date_data)
                                    <tr>
                                        <td>{{$Date_data->id}}</td>
                                        <td>{{$Date_data->date}}</td>
                                        <td class="text-left">

                                            <form action="{{ route('AvailableDate.edit', $Date_data->id)}}" method="GET"
                                                  style="display: inline-block">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="PUT">
                                                <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                                            </form>

                                            <form action="{{ route('AvailableDate.destroy', $Date_data->id)}}"
                                                  method="post" style="display: inline-block">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
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