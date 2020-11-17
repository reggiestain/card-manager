<?php $__env->startSection('content'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">View Driving Instructors  <img src="<?php echo e(asset('img/logo/dvla-logo.jpeg')); ?>"
                alt="dvla logo" style="width:120px;height:120px; margin-left: 400px"/></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?php echo e(route('employee.index',$employees[0]->institution_id)); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active"> View Driving Instructors </li>
            </ol>
        <div>
            <ul class="nav">
                <li class="ml-auto"><a href="<?php echo e(route('employee.add',$id)); ?>" class="nav-link"><span class="fa fa-plus"></span> Add</a></li>
             </ul>
        </div>
            <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php if($message = Session::get('success')): ?>
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php endif; ?>

                                <?php if($message = Session::get('error')): ?>
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong><?php echo e($message); ?></strong>
                                </div>
                                <?php endif; ?>
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
                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td>00<?php echo e($employee->id); ?></td>
                                            <td><?php echo e($employee->name); ?></td>
                                            <td><?php echo e($employee->surname); ?></td>
                                            <td><?php echo e($employee->gender); ?></td>
                                            <td><?php echo e($employee->email); ?></td>
                                            <td><?php echo e($employee->mobile); ?></td>
                                            <td><?php echo e($employee->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('employee.view',$employee->id)); ?>" id="pdf-view" class="btn-success btn-sm">View</a>
                                                <a href="<?php echo e(route('employee.edit',$employee->id)); ?>" class="btn-info btn-sm">Edit</a>
                                                <a href="#" class="btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\ID-Management\card\resources\views/employee/index.blade.php ENDPATH**/ ?>