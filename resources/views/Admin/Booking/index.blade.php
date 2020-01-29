

@extends('Admin.layouts.master')
@section('main_content')


        <!-- start page content -->
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">Bookings Details</div>
                        </div>
                        
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                   href="{{route('admin-dashboard')}}">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
                            </li>
                            <li><a class="parent-item" href="">Bookings</a>&nbsp;<i
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
                                <header>Bookings Details</header>
                                <a class="parent-item pull-right btn btn-primary" href="{{ route('bookings.create') }}">Add +</a>                              
                                
                            </div>
                            <div class="card-body " id="bar-parent">
                                <table id="exportTable" class="display nowrap" style="width:100%">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Service</th>
                                        <th>Booking Date</th>
                                        <th>Booking Time</th>
                                        <th>Booking Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $book)
                                    <tr>
                                        <td>{{$book->id}}</td>
                                        <td></td>
                                        <td>{{$book->user}}</td>
                                        <td>{{$book->service_id}}</td>
                                        <td>{{$book->booking_date}}</td>
                                        <td>{{$book->booking_time}}</td>
                                        <td>{{$book->status}}</td>
                                        <td class="text-left">
                                        
                                        <form action="{{ route('bookings.edit', $book->id)}}" method="GET" style="display: inline-block">
                                        {{csrf_field()}}
                                        {{method_field('PUT')}}
                                        <button class="btn btn-primary btn-sm" type="submit">Edit</button>
                                        </form>
                                      
                                        <form action="{{ route('bookings.destroy', $book->id)}}" method="post" style="display: inline-block">
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