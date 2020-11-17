@extends('layouts.dashboard')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">
                Create Driving Instructor
                <img src="{{asset('img/logo/dvla-logo.jpeg')}}" alt="dvla logo" style="width:120px;height:120px; margin-left: 400px" />
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Create Driving Instructor</li>
            </ol>
            <div class="card mb-4">
                <div class="card-body">
                    <div class='row'>
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#adduserModal">Add user</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#adduserModal">Upload Doc</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- Card Body -->

                                <p class="mb-4"></p>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="container">
                                            <div class="stepwizard">
                                                <div class="stepwizard-row setup-panel">
                                                    <div class="stepwizard-step col-xs-3">
                                                        <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                                                        <p><small>Personal Details</small></p>
                                                    </div>
                                                    <div class="stepwizard-step col-xs-3">
                                                        <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                                                        <p><small>License Details</small></p>
                                                    </div>
                                                    <div class="stepwizard-step col-xs-3">
                                                        <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                                                        <p><small>Driving School Details</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <form role="form" method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="panel panel-primary setup-content" id="step-1">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Personal Details</h3>
                                                    </div>

                                                    <div class="panel-body">
                                                        <div class="row">

                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="control-label">First Name</label>
                                                                    <input type="hidden" name="institution_id" value="{{$id}}" />
                                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter First Name" value="{{ old('name') }}" autocomplete="name" />
                                                                    @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Last Name</label>
                                                                    <input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="Enter Last Name" value="{{ old('surname') }}" autocomplete="surname" />
                                                                    @error('surname')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">ID Number</label>
                                                                    <input type="text" name="id_number" class="form-control @error('id_number') is-invalid @enderror" placeholder="Enter ID number" value="{{ old('id_number') }}" autocomplete="id_number" />
                                                                    @error('id_number')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Mobile</label>
                                                                    <input type="text" name="mobile" class="form-control @error('mobile') is-invalid @enderror" placeholder="Enter Contact Number" value="{{ old('mobile') }}" autocomplete="mobile" />
                                                                    @error('mobile')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Email</label>
                                                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter email" value="{{ old('email') }}" autocomplete="email" />
                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label">Gender</label>
                                                                    <select class="form-control" id="selectGender" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ old('gender') }}" autocomplete="gender">
                                                                        <option value="Female" disabled selected>Please select gender</option>
                                                                        @foreach($genders as $gender)
                                                                        <option value="{{$gender}}">{{$gender}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('gender')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="row">
                                                    <div class='form-group col-md-6'>
                                                        <label class="control-label">Date of birth</label>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker4'>
                                                                <input type='text' name="birth_date" class="form-control @error('s_start_date') is-invalid @enderror" value="{{ old('birth_date') }}" autocomplete="birth_date" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @error('birth_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class='form-group col-md-6'>

                                                        <div class="form-group">
                                                        <label class="control-label">Nationality</label>
                                                                    <select class="form-control" id="selectN" name="nationality" class="form-control @error('nationality') is-invalid @enderror" value="{{ old('nationality') }}" autocomplete="nationality">
                                                                        <option value="Female" disabled selected>Please select nationality</option>
                                                                        @foreach($nations as $nation)
                                                                        <option value="{{$nation}}">{{$nation}}</option>
                                                                        @endforeach
                                                                    </select>
                                                        </div>
                                                        @error('nationality')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                                <button class="btn btn-primary nextBtn" style="float:right" type="button">Next</button>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <br>
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-md-12 imgUp">
                                                                                <div class="imagePreview" style="background: url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg)"></div>
                                                                                <label class="btn btn-primary">
                                                                                    Upload
                                                                                    <input type="file" name="profile_image" class="uploadFile img" style="width: 0px;height: 0px;overflow: hidden;" class="form-control @error('profile_image') is-invalid @enderror" autocomplete="profile_image">

                                                                                </label>
                                                                            </div><!-- col-2 -->
                                                                            <!--<i class="fa fa-plus imgAdd"></i>-->
                                                                        </div><!-- row -->
                                                                    </div><!-- container -->
                                                                </div>
                                                                @error('profile_image')
                                                                <div class="alert alert-danger" role="alert">
                                                                    <strong>{{$message}}</strong>
                                                                </div>
                                                                @enderror

                                                                <div class="container d-flex justify-content-center" style="margin-top: 50px">
                                                                    <!--<button class="btn btn-primary" data-toggle="modal" data-target="#my-modal">Authentication</button>-->
                                                                    <!--<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered justify-content-center " role="document">-->
                                                                    <div class="modal-content border-0 mx-3">
                                                                        <div class="modal-body p-0">
                                                                            <div class="row justify-content-center">
                                                                                <div class="col-auto">
                                                                                    <div class="card border-0 justify-content-center">
                                                                                        <div class="card-header pb-0 bg-white text-center">
                                                                                            <div class="row mb-0 justify-content-end">
                                                                                                <!--<div class="col-3"><<img class="img-fluid cross mb-auto " src="https://i.imgur.com/YFpQ0hW.jpg" data-dismiss="modal"></div>-->
                                                                                            </div>

                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--</div>
                                                                    </div>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-primary setup-content" id="step-2">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">License Details</h3>
                                                    </div>
                                                    <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">License Category 1</label>
                                                        <select class="form-control" id="selectCat" name="lic_cat_1" class="form-control @error('lic_cat') is-invalid @enderror" value="{{ old('lic_cat') }}" autocomplete="lic_cat">
                                                            <option value="Female" disabled selected>Please select category</option>
                                                            @foreach($licCat as $cat)
                                                            <option value="{{$cat}}">{{$cat}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">License Category 2</label>
                                                        <select class="form-control" id="selectCat" name="lic_cat_2" class="form-control @error('lic_cat') is-invalid @enderror" value="{{ old('lic_cat') }}" autocomplete="lic_cat">
                                                            <option value="Female" disabled selected>Please select category</option>
                                                            @foreach($licCat as $cat)
                                                            <option value="{{$cat}}">{{$cat}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="control-label">License Category 3</label>
                                                        <select class="form-control" id="selectCat" name="lic_cat_3" class="form-control @error('lic_cat') is-invalid @enderror" value="{{ old('lic_cat') }}" autocomplete="lic_cat">
                                                            <option value="Female" disabled selected>Please select category</option>
                                                            @foreach($licCat as $cat)
                                                            <option value="{{$cat}}">{{$cat}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('gender')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">C of C / Reference Number</label>
                                                        <input type="text" name="cert_no" class="form-control @error('cert_no') is-invalid @enderror" placeholder="Enter Certificate Number" value="{{ old('cert_no') }}" autocomplete="cert_no" />
                                                        @error('cert_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Driver's license number</label>
                                                        <input type="text" name="app_no" class="form-control @error('app_no') is-invalid @enderror" placeholder="Enter driver's license number" value="{{ old('app_no') }}" autocomplete="app_no" />
                                                        @error('app_no')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class='form-group'>
                                                        <label class="control-label">License Issue Date</label>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker2'>
                                                                <input type='text' name="issued_date" class="form-control @error('issued_date') is-invalid @enderror" value="{{ old('issued_date') }}" autocomplete="issued_date" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @error('issued_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                    <div class='form-group col-md-6'>
                                                        <label class="control-label">License Expiry Date</label>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker1'>
                                                                <input type='text' name="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror" value="{{ old('expiry_date') }}" autocomplete="expiry_date" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @error('expiry_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class='form-group col-md-6'>
                                                        <label class="control-label">Year of certification</label>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker3'>
                                                                <input type='text' name="reg_date" class="form-control @error('reg_date') is-invalid @enderror" value="{{ old('reg_date') }}" autocomplete="reg_date" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @error('reg_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                    <!--<div class='form-group col-md-12'>
                                                        <label class="control-label">Upload Instructor Certificate</label>
                                                        <div class="form-group">
                                                        <input id="input-b1" name="input-b1" type="file" class="file" data-browse-on-zone-click="true">
                                                        </div>
                                                        @error('expiry_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>-->
                                                    <button class="btn btn-primary nextBtn" style="float:right" type="button">Next</button>
                                                </div>
                                                <div class="panel panel-primary setup-content" id="step-3">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Driving School Details<h3>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">School Name</label>
                                                        <input type="text" name="emp_name" class="form-control @error('emp_name') is-invalid @enderror" placeholder="Employer name" value="{{ old('emp_name') }}" autocomplete="emp_name" />
                                                        @error('emp_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Contact Person</label>
                                                        <input type="text" name="contact_person" class="form-control @error('contact_person') is-invalid @enderror" placeholder="Contact Person" value="{{ old('contact_person') }}" autocomplete="contact_person" />
                                                        @error('contact_person')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input type="text" name="emp_email" class="form-control @error('emp_email') is-invalid @enderror" placeholder="Enter employer email" value="{{ old('emp_email') }}" autocomplete="emp_email" />
                                                        @error('emp_email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Contact Number</label>
                                                        <input type="text" name="contact_number" class="form-control @error('contact_number') is-invalid @enderror" placeholder="Contact Number" value="{{ old('contact_number') }}" autocomplete="contact_number" />
                                                        @error('contact_number')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="row">
                                                    <div class='form-group col-md-6'>
                                                        <label class="control-label">School Start Date</label>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker6'>
                                                                <input type='text' name="s_start_date" class="form-control @error('s_start_date') is-invalid @enderror" value="{{ old('s_start_date') }}" autocomplete="s_start_date" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @error('s_start_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class='form-group col-md-6'>
                                                        <label class="control-label">School End Date</label>
                                                        <div class="form-group">
                                                            <div class='input-group date' id='datetimepicker5'>
                                                                <input type='text' name="s_end_date" class="form-control @error('s_end_date') is-invalid @enderror" value="{{ old('s_end_date') }}" autocomplete="s_end_date" />
                                                                <span class="input-group-addon">
                                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        @error('s_end_date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <button type="submit" class="btn btn-success float-right">Submit</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height: 100vh;"></div>
            <div class="card mb-4">
                <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
            </div>
        </div>
    </main>
    @endsection
