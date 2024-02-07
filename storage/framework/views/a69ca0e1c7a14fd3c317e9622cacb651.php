<?php $__env->startSection('page_title', 'Dashborad'); ?>

<?php $__env->startSection('breadcrumb_link_one',Str::ucfirst(Request::segment(2))); ?>
<?php $__env->startSection('breadcrumb_link_two',Str::ucfirst(Request::segment(3))); ?>


<?php $__env->startSection('page_style'); ?>




<?php $__env->stopSection(); ?>

<?php
    $id = Auth::user()->id;
    $userid = App\Models\User::find($id);
    $status = $userid->status;

    $visitor = App\Models\Visitor::get();

?>

<?php $__env->startSection('page-content'); ?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 row-cols-xxl-4">

    <div class="col">
      <div class="card radius-10 border-0 border-start border-tiffany border-3">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="">
              <p class="mb-1">Total Visitor</p>
              <h4 class="mb-0 text-tiffany"><?php echo e($visitor->count()); ?></h4>
            </div>
            <div class="ms-auto widget-icon bg-tiffany text-white">
              <i class="bi bi-bag-check-fill"></i>
            </div>
          </div>
        </div>
      </div>
     </div>


    </div>

<?php echo e(php_uname()); ?>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.backend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\work.kroyhaat.com\resources\views/backend/index.blade.php ENDPATH**/ ?>