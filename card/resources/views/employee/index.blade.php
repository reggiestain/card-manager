@extends('layouts.dashboard')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">View Driving Instructors  <img src="{{asset('img/logo/dvla-logo.jpeg')}}"
                alt="dvla logo" style="width:120px;height:120px; margin-left: 400px"/></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('employee.index',$employees[0]->institution_id)}}">Dashboard</a></li>
                <li class="breadcrumb-item active"> View Driving Instructors </li>
            </ol>
        <div>
            <ul class="nav">
                <li class="ml-auto"><a href="{{route('employee.add',$id)}}" class="nav-link"><span class="fa fa-plus"></span> Add</a></li>
             </ul>
        </div>
            <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif

                                @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Gender</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($employees as $employee)
                                        <tr>
                                            <td>00{{$employee->id}}</td>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->surname}}</td>
                                            <td>{{$employee->gender}}</td>
                                            <td>{{$employee->email}}</td>
                                            <td>{{$employee->mobile}}</td>
                                            <td>{{$employee->created_at}}</td>
                                            <td>
                                            @if ($employee->status == 'for-print')
                                            <a href="#" class="btn-warning btn-sm"><li class="fa fa-print"></li></a>
                                            @endif
                                                <a href="{{route('employee.view',$employee->id)}}" id="pdf-view" class="btn-success btn-sm">View</a>
                                                <a href="{{route('employee.edit',$employee->id)}}" class="btn-info btn-sm">Edit</a>
                                                <a href="#" class="btn-danger btn-sm">Delete</a>
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
        <!-- /.container-fluid -->
    </div>
    @endsection


