@extends('layouts.dashboard')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">
                View Institutions
                <img src="{{asset("img/logo/dvla.jpeg")}}" 
                alt="dvla logo" style="width:120px;height:120px; margin-left: 400px"/>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Institution</a></li>
                <li class="breadcrumb-item active">View Institution</li>
            </ol>
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
                                            <th>Email</th>
                                            <th>Contact Person</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($institutions as $institution)
                                        <tr>
                                            <td>00{{$institution->id}}</td>
                                            <td>{{$institution->name}}</td>
                                            <td>{{$institution->email}}</td>
                                            <td>{{$institution->contact_person}}</td>
                                            <td>{{$institution->created_at}}</td>
                                            <td>
                                                <a href="#" id="pdf-view" class="btn-light btn-sm">View</a>
                                                <a href="#" class="btn-dark btn-sm">Edit</a>  
                                                <a href="{{route('employee.index',$institution->id)}}" class="btn-success btn-sm">Driving Instructors</a> 
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


