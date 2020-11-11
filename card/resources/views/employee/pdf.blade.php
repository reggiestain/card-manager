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
                <td colspan="5">
                    <strong>Surname :</strong> {{$employee->surname}}
                    <br><br>
                    <strong>Gender:</strong> {{$employee->gender}}
                    <br><br>
                    <strong>TEL :</strong> {{$employee->mobile}}
                    <br><br>
                </td>
                <td colspan="5">
                    <br />
                    @if ($employee->profile_image)
<<<<<<< HEAD
                    <img src="{{ asset('/card/storage/app/public'.$employee->profile_image)}}" alt=" profile" width="100" height="100" />
=======
                    <img src="{{ asset('/card/storage/app/public'.$employee->profile_image)}}" alt=" profile" width="150" height="150" />
>>>>>>> 302745d68e845183c354bf22ef91d5620ec815cc
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
                <th></th>
                <th></th>
                <th></th>
                <br><br>
            </tr>
            <tr>
                <td colspan="5">
                    <strong>C of C /Reference number: </strong> #{{$employee->license->cert_no}}
                    <br><br>
                    <strong>Driver's License No: </strong> {{$employee->license->issued_date}}
                    <br><br>
                    <strong>Class :</strong> {{$employee->license->lic_cat}}
                </td>
                <td colspan="5">
                    <strong>Issued Date: </strong> #{{$employee->license->app_no}}
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
            <tr>
                <td colspan="5">
                    <strong>School :</strong> {{$employee->surname}}
                    <br><br>
                    <strong>Email :</strong> {{$employee->mobile}}
                    <br><br>
                </td>
                <td colspan="5">
                    <strong>Contact Person:</strong> {{$employee->gender}}
                    <br><br>
                </td>
            </tr>
        </thead>
        <!--<tbody>
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

        </tbody>-->
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
