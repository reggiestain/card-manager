<?php

namespace App\Http\Controllers;

use App\Employee;
use App\License;
use App\Employer;
use App\LicenseCertificates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadTrait;
use PDF;
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
use \FileUploader;

class EmployeeController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $employees = Employee::all();

        return view('employee.index')->with(['employees' => $employees, 'id' => $id]);
    }

    public function view($id)
    {
        $employee = Employee::where('id', $id)->with(['license', 'employer'])->get();

        $employee = $employee[0];

        $name = $employee->name . '-' . $employee->surname;

        $genders = ['Male', 'Female'];

        return view('employee.view')->with([
            'genders' => $genders,
            'employee' => $employee,
        ]);
    }

    public function create($id)
    {
        $genders = ['Male', 'Female'];

        $nations = ['Ghanaian'];

        $licCat = ['A', 'B', 'C', 'D', 'E', 'F'];

        return view('employee.add')->with([
            'genders' => $genders,
            'nations' => $nations,
            'id' => $id,
            'licCat' => $licCat
        ]);
    }

    public function edit($id)
    {
        $employee = Employee::with(['institution', 'license', 'employer'])->find($id);

        //$employee = $employee[0];

        $genders = ['Male', 'Female'];
        $nations = ['Ghanaian'];
        $licCat = ['A', 'B', 'C', 'D', 'E', 'F'];

        return view('employee.edit')->with([
            'genders' => $genders,
            'nations' => $nations,
            'employee' => $employee,
            'licCat' => $licCat,
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        $employee = Employee::find($employee->id);

        // Check if a profile image has been uploaded
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',

        ]);

        if ($request->has('files')) {
            // initialize FileUploader
            $FileUploader = new FileUploader('files', array(
            // options
            // example: ['jpg', 'pdf', 'text/plain', 'audio/*']
            'extensions' => ['jpg', 'png','jpeg'],
            'limit' => 4,
            'uploadDir' => storage_path('app/public/uploads/'),
            'title' => 'auto'
        ));
            // upload
            $upload = $FileUploader->upload();

            if ($upload['isSuccess']) {
                $certs = LicenseCertificates::where('license_id', $employee->license->id)->get();
                if (empty($certs)) {
                    foreach ($upload['files'] as $cert) {
                        $uploadCert = LicenseCertificates::create([
                    'license_id' => $employee->license->id,
                    'cert' => $cert['name']
                ]);
                    }
                } else {
                    $v = LicenseCertificates::where('license_id', $employee->license->id)->delete();
                    foreach ($upload['files'] as $cert) {
                        $uploadCert = LicenseCertificates::create([
                    'license_id' => $employee->license->id,
                    'cert' => $cert['name']
                ]);
                    }
                }
            }
            if ($upload['hasWarnings']) {
                // get the warnings
                $warnings = $upload['warnings'];
                return \Redirect::route('employee.index', $employee->id)->with('success', $warnings[0]);
            }
        }

        if ($request->has('profile_image')) {
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp
            $name = $request->input('name') . '' . time();
            // Define folder path
            $folder = '/img/profile/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $employee->profile_image = $filePath;
        }

        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->email = $request->input('email');
        $employee->mobile = $request->input('mobile');
        $employee->gender = $request->input('gender') ?? 'Male';
        $employee->id_number = $request->input('id_number');
        $employee->birth_date = $request->input('birth_date');
        $employee->nationality = $request->input('nationality') ?? 'Ghanaian';
        //License info

        $employee->license->lic_cat_1 = $request->input('lic_cat_1');
        $employee->license->lic_cat_2 = $request->input('lic_cat_2');
        $employee->license->lic_cat_3 = $request->input('lic_cat_3');
        $employee->license->cert_no = $request->input('cert_no');
        $employee->license->issued_date = $request->input('issued_date');
        $employee->license->expiry_date = $request->input('expiry_date');
        $employee->license->reg_date = $request->input('reg_date');
        $employee->license->app_no = $request->input('app_no');
        //school info
        $employee->employer[0]->emp_name = $request->input('emp_name');
        $employee->employer[0]->contact_person = $request->input('contact_person');
        $employee->employer[0]->contact_number = $request->input('contact_number');
        $employee->employer[0]->s_start_date = $request->input('s_start_date');
        $employee->employer[0]->s_end_date = $request->input('s_end_date');
        $employee->push();

        return \Redirect::route('employee.index', $employee->id)->with('success', 'Success | Record updated successfully.');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'surname' => 'required',
                'email' => 'email|unique:employees',
                'gender' => 'required',
                'mobile' => 'required',
                'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cert_no' => 'required',
                'issued_date' => 'required',
                'expiry_date' => 'required',
                'contact_person' => 'required',
                'contact_number' => 'required',
                'id_number' => 'required',
                'app_no' => 'required',
                'lic_cat_1' => 'required',
            ]);

            if ($request->has('profile_image')) {

                // Get image file
                $image = $request->file('profile_image');
                // Make a image name based on user name and current timestamp
                $name = $request->input('firstname') . '' . time();
                // Define folder path
                $folder = '/img/profile/';
                // Make a file path where image will be stored [ folder path + file name + file extension]
                $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();
                // Upload image
                $this->uploadOne($image, $folder, 'public', $name);
                // Set user profile image path in database to filePath
            }


            $id = $request->input('institution_id');

            $license = License::create([
                'cert_no' => $request->input('cert_no'),
                'issued_date' => $request->input('issued_date'),
                'expiry_date' => $request->input('expiry_date'),
                'app_no' => $request->input('app_no'),
                'lic_cat_1' => $request->input('lic_cat'),
                'lic_cat_2' => $request->input('lic_cat'),
                'lic_cat_3' => $request->input('lic_cat'),
                'reg_date' => $request->input('reg_date'),
            ]);

            $employees = Employee::create([
                'user_id' => Auth::user()->id,
                'profile_image' => $filePath ?? '',
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'id_number' => $request->input('id_number'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'gender' => $request->input('gender'),
                'institution_id' => $request->input('institution_id'),
                'birth_date' => $request->input('birth_date'),
                'nationality' => $request->input('nationality'),
                'license_id' => $license->id,

            ]);

            $employer = Employer::create([
                'emp_name' => $request->input('emp_name'),
                'contact_person' => $request->input('contact_person'),
                'emp_email' => $request->input('emp_email'),
                'contact_number' => $request->input('contact_number'),
                's_start_date' => $request->input('s_start_date'),
                'end_date' => $request->input('s_end_date'),
                'employee_id' => $employees->id,
            ]);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return \Redirect::route('employee.index', $id)->with('success', 'Success | Record saved successfully.');
    }

    public function pdf($id)
    {
        $employee = Employee::where('id', $id)->with(['license', 'employer'])->get();

        $employee = $employee[0];

        $name = $employee->name . '-' . $employee->surname;

        $genders = ['Male', 'Female'];

        $customPaper = array(0,0,720,1440);
        $pdf = PDF::loadView('employee.pdf', [

            'employee' => $employee,
            'genders' => $genders,
        ])->setPaper($customPaper, 'portrait');


        return $pdf->download($name . '.pdf');
    }

    /**
     * delete a file
     *
     * @return void
     */
    public function removeFile(Request $request)
    {
        unlink($_POST['file']);
        exit;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Farmer  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $employee)
    {
        //
    }
}
