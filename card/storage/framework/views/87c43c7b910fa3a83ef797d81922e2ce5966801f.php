<?php $__env->startSection('content'); ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4 ">View Driving Instructor
                <img src="<?php echo e(asset('img/logo/dvla-logo.jpeg')); ?>" alt="dvla logo" style="width:120px;height:120px; margin-left: 400px" />
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo e(route('employee.index',$employee->institution_id)); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">View Driving Instructor</li>
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
                                        <!--<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Dropdown Header:</div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#adduserModal">Add user</a>
                                </div>-->
                                    </div>
                                    <a href="<?php echo e(route('employee.edit',$employee->id)); ?>" class="btn btn-primary">Edit <span class="fa fa-edit"></span></a>
                                    <a href="<?php echo e(route('employee.pdf',$employee->id)); ?>" class="btn btn-danger pdf-view"><span class="fa fa-file-pdf"></span> Download PDF</a>
                                </div>
                                <!-- Card Body -->
                                <p class="mb-4"></p>
                                <div class="card-body">
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
                                                        <strong>Name</strong> <?php echo e($employee->name); ?>

                                                        <br><br>
                                                        <strong>ID No:</strong> <?php echo e($employee->id_number); ?>

                                                        <br><br>
                                                        <strong>Email:</strong> <?php echo e($employee->email); ?>

                                                        <br><br>
                                                        <strong>Date of birth:</strong> <?php echo e($employee->birth_date); ?>

                                                        <br><br>
                                                    </td>
                                                    <td colspan="3">
                                                        <strong>Surname :</strong> <?php echo e($employee->surname); ?>

                                                        <br><br>
                                                        <strong>Gender:</strong> <?php echo e($employee->gender); ?>

                                                        <br><br>
                                                        <strong>TEL :</strong> <?php echo e($employee->mobile); ?>

                                                        <br><br>
                                                        <strong>Nationality :</strong> <?php echo e($employee->nationality); ?>

                                                        <br><br>
                                                    </td>
                                                    <td colspan="3">
                                                        <?php if($employee->profile_image): ?>
                                                        <img src="<?php echo e(asset('/card/storage/app/public'.$employee->profile_image)); ?>" alt="profile" class="img-thumbnail" width="200" height="200" />
                                                        <?php else: ?>

                                                        <?php endif; ?>

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
                                                    <td colspan="4">
                                                        <strong>Driver's License No: </strong> #<?php echo e($employee->license->app_no); ?>

                                                        <br><br>
                                                        <strong>Category :</strong> <?php echo e($employee->license->lic_cat_1.''.$employee->license->lic_cat_2.''.$employee->license->lic_cat_3); ?>

                                                        <br><br>
                                                        <strong>C of C / Reference Number: </strong> <?php echo e(join('/', str_split($employee->license->cert_no,2) )); ?>

                                                    </td>
                                                    <td colspan="4">
                                                        <strong>Issue Date: </strong> <?php echo e($employee->license->issued_date); ?>

                                                        <br><br>
                                                        <strong>Expiry Date: </strong> <?php echo e($employee->license->expiry_date); ?>

                                                        <br><br>
                                                        <strong>Year of license registration: </strong> <?php echo e($employee->license->reg_date); ?>

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

                                                <?php $__currentLoopData = $employee->employer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td colspan="2"><?php echo e($employer->emp_name); ?></td>
                                                    <td colspan="2"><?php echo e($employer->contact_person); ?></td>
                                                    <td colspan="2"><?php echo e($employer->emp_email); ?></td>
                                                    <td colspan="2"><?php echo e($employer->contact_number); ?></td>
                                                    <td colspan="2"><?php echo e($employer->s_start_date); ?></td>
                                                    <td colspan="2"><?php echo e($employer->s_end_date); ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="10"></th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\ID-Management\card\resources\views/employee/view.blade.php ENDPATH**/ ?>