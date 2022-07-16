<?php echo $__env->make('layouts.parts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.parts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-3">

            <?php echo $__env->make('layouts.parts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-9">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.parts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\UnitConverter\resources\views/layouts/site.blade.php ENDPATH**/ ?>