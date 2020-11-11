<?php $__env->startSection('content'); ?>
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
                    <strong>Name</strong> <?php echo e($employee->name); ?>

                    <br><br>
                    <strong>ID No:</strong> <?php echo e($employee->id_number); ?>

                    <br><br>
                    <strong>Email:</strong> <?php echo e($employee->email); ?>

                    <br><br>
                </td>
                <td colspan="5">
                    <strong>Surname :</strong> <?php echo e($employee->surname); ?>

                    <br><br>
                    <strong>Gender:</strong> <?php echo e($employee->gender); ?>

                    <br><br>
                    <strong>TEL :</strong> <?php echo e($employee->mobile); ?>

                    <br><br>
                </td>
                <td colspan="5">
                    <br />
                    <?php if($employee->profile_image): ?>
                    <img src="<?php echo e(asset('/card/storage/app/public'.$employee->profile_image)); ?>" alt=" profile" width="100" height="100" />
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
                <th></th>
                <th></th>
                <th></th>
                <br><br>
            </tr>
            <tr>
                <td colspan="5">
                    <strong>Certificate No: </strong> #<?php echo e($employee->license->cert_no); ?>

                    <br><br>
                    <strong>Issued Date: </strong> <?php echo e($employee->license->issued_date); ?>

                    <br><br>
                    <strong>Category :</strong> <?php echo e($employee->license->lic_cat); ?>

                </td>
                <td colspan="5">
                    <strong>Driver's License No: </strong> #<?php echo e($employee->license->app_no); ?>

                    <br><br>
                    <strong>Expiry Date: </strong> <?php echo e($employee->license->issued_date); ?>

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
                    <strong>School :</strong> <?php echo e($employee->surname); ?>

                    <br><br>
                    <strong>Email :</strong> <?php echo e($employee->mobile); ?>

                    <br><br>
                </td>
                <td colspan="5">
                    <strong>Contact Person:</strong> <?php echo e($employee->gender); ?>

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

            <?php $__currentLoopData = $employee->employer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="2"><?php echo e($employer->emp_name); ?></td>
                <td colspan="2"><?php echo e($employer->contact_person); ?></td>
                <td colspan="2"><?php echo e($employer->contact_number); ?></td>
                <td colspan="2"><?php echo e($employer->emp_email); ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pdf', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\ID-Management\card\resources\views/employee/pdf.blade.php ENDPATH**/ ?>