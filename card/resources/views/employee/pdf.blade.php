@extends('layouts.pdf')
@section('content')
<div class="table-responsive">
    <table class="table table-striped">
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
                <td colspan="3">
                    <strong>Name</strong> {{$employee->name}}
                    <br><br>
                    <strong>ID No:</strong> {{$employee->id_number}}
                    <br><br>
                    <strong>Email:</strong> {{$employee->email}}
                    <br><br>
                </td>
                <td colspan="3">
                    <strong>Surname :</strong> {{$employee->surname}}
                    <br><br>
                    <strong>Gender:</strong> {{$employee->gender}}
                    <br><br>
                    <strong>TEL :</strong> {{$employee->mobile}}
                    <br><br>
                </td>
                <td colspan="3">
                    @if ($employee->profile_image)
                    <img src="{{asset(config('app.file_path').$employee->profile_image)}}" alt="profile" width="200" height="200" />
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
                <br><br>
            </tr>
            <tr>
                <td colspan="4">
                    <strong>Certificate No: </strong> #{{$employee->license->cert_no}}
                    <br><br>
                    <strong>Issued Date: </strong> {{$employee->license->issued_date}}
                    <br><br>
                    <strong>Category :</strong> {{$employee->license->lic_cat}}
                </td>
                <td colspan="4">
                    <strong>Driver's License No: </strong> #{{$employee->license->app_no}}
                    <br><br>
                    <strong>Expiry Date: </strong> {{$employee->license->issued_date}}
                    <br><br>
                    <strong style="color:#fff">X</strong>
                </td>
            </tr>
            <tr>
                <th colspan="6">
                    <h4>EMPLOYER DETAILS</h4>
                </th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <br><br>
            </tr>
        </thead>
        <tbody>
            <tr>

                <th colspan="2">Employer Name</th>
                <th colspan="2">Contact Person</th>
                <th colspan="2">Contact Number</th>
                <th colspan="2">Email</th>
                <th></th>
                <th></th>
                <th></th>

            </tr>

            @foreach($employee->employer as $employer)
            <tr>
                <td colspan="2">{{$employer->emp_name}}</td>
                <td colspan="2">{{$employer->contact_person}}</td>
                <td colspan="2">{{$employer->contact_number}}</td>
                <td colspan="2">{{$employer->emp_email}}</td>
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