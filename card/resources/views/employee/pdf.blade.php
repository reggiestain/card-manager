@extends('layouts.pdf')
@section('content')
                     <div class="table-responsive">
                      <table class="table tablssse-striped">
                           <caption></caption>
                                            <thead>
                                                <tr>
                                                    <th colspan="6">
                                                        <h4>PERSONAL DETAILS</h4>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td colspan="4">
                                                        <br>
                                                        <strong>Name</strong> {{$employee->name}}
                                                        <br><br>
                                                        <strong>Certificate No:</strong> {{$employee->id_number}}
                                                        <br><br>
                                                        <strong>Email:</strong> {{$employee->email}}
                                                        <br><br>
                                                        <strong>Date of birth:</strong> {{$employee->birth_date}}
                                                        <br><br>
                                                    </td>
                                                    <td colspan="4">
                                                        <br>
                                                        <strong>Surname :</strong> {{$employee->surname}}
                                                        <br><br>
                                                        <strong>Gender:</strong> {{$employee->gender}}
                                                        <br><br>
                                                        <strong>TEL :</strong> {{$employee->mobile}}
                                                        <br><br>
                                                        <strong>Nationality :</strong> {{$employee->nationality}}
                                                        <br><br>
                                                    </td>
                                                    <td colspan="4">
                                                        <br>
                                                        @if ($employee->profile_image)
                                                        <img src="{{asset('/card/storage/app/public'.$employee->profile_image)}}" alt="profile" width="150" height="150" />
                                                        @else

                                                        @endif

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="6">
                                                        <h4>LICENSE DETAILS</h4>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td colspan="6">
                                                        <br>
                                                        <strong>Driver's License No: </strong> #{{$employee->license->app_no}}
                                                        <br><br>
                                                        <strong>Category :</strong> {{$employee->license->lic_cat_1.''.$employee->license->lic_cat_2.''.$employee->license->lic_cat_3}}
                                                        <br><br>
                                                        <strong>C of C / Reference Number: </strong> {{ join('/', str_split($employee->license->cert_no,2) )}}
                                                    </td>
                                                    <td colspan="6">
                                                        <br>
                                                        <strong>Issue Date: </strong> {{$employee->license->issued_date}}
                                                        <br><br>
                                                        <strong>Expiry Date: </strong> {{$employee->license->expiry_date}}
                                                        <br><br>
                                                        <strong>Year of license registration: </strong> {{$employee->license->reg_date}}
                                                        <br><br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th colspan="6">
                                                        <h4>DRIVING SCHOOL DETAILS</h4>
                                                    </th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>

                                                    <th colspan="2">School Name</th>
                                                    <th colspan="2">Contact Person</th>
                                                    <th colspan="2">Email</th>
                                                    <th colspan="2">Mobile Number</th>
                                                    <th colspan="2">Start Date</th>
                                                    <th colspan="2">End Date</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>

                                                </tr>

                                                @foreach($employee->employer as $employer)
                                                <tr>
                                                    <td colspan="2">{{$employer->emp_name}}</td>
                                                    <td colspan="2">{{$employer->contact_person}}</td>
                                                    <td colspan="2">{{$employer->emp_email}}</td>
                                                    <td colspan="2">{{$employer->contact_number}}</td>
                                                    <td colspan="2">{{$employer->s_start_date}}</td>
                                                    <td colspan="2">{{$employer->s_end_date}}</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="10"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

<div>
    <h4>Declaration:</h4>
    <p>
        I confirm that all the details in this registration form are correct and that I will provide copies of the appropriate photographs and documents where required. I understand and agree that DVLA will use these and other data to create and maintain records on me, both during my active and non-active status as a beneficiary.
    </p>

</div>

@endsection
