<?php $__env->startSection('content'); ?>
    <div class="card border-primary mb-3 w-100">
        <div class="card-header">Units Table</div>
        <div class="card-body">


            <a class="btn ml-auto float-end mb-2 rounded-2 btn-lg btn-primary" href="<?php echo e(URL::to('add_unit/0')); ?>"><i
                    class="fas fa-plus"></i> Add New</a>

            <h3 class="card-title">Here are all registed units</h3>
            <br />

            <div class="accordion border border-success rounded" id="accordionFlushExample">

                <?php
                $cnt = 1;
                ?>

                <?php
                if(isset($table))
                    foreach ($table as $row) {
                        ?>

                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-heading<?php echo e($row->id); ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse<?php echo e($row->id); ?>" aria-expanded="false"
                            aria-controls="flush-collapse<?php echo e($row->id); ?>">
                            <strong> #<?php echo e($cnt); ?> <?php echo e($row->unit_name); ?> </strong>
                        </button>
                    </h2>
                    <div id="flush-collapse<?php echo e($row->id); ?>" class="accordion-collapse collapse"
                        aria-labelledby="flush-heading<?php echo e($row->id); ?>" data-bs-parent="#accordionFlushExample">
                        <hr>
                        &nbsp;
                        <a class="btn btn-sm btn-outline-success" href="<?php echo e(URL::to('add_unit/' . $row->id . '/0')); ?>"><i
                                class="fas fa-plus"></i> New SubUnit</a>
                        <a class="btn btn-sm btn-outline-primary" href="<?php echo e(URL::to('add_unit/0/' . $row->id)); ?>"><i
                                class="fas fa-edit"></i> Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-outline-danger" href="<?php echo e(URL::to('delete_unit/' . $row->id)); ?>"><i
                                class="fas fa-trash"></i> Delete</a>
                        <hr>
                        <div class="accordion-body">
                            <h6>Subunits:</h6>
                            <table class="table table-border">
                                <thead>
                                    <tr>
                                        <th>Unit Name</th>
                                        <th>Convert Rate</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $row->sub_units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subunit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($subunit->unit_name); ?></td>
                                            <td>1 <?php echo e($row->unit_name); ?> = <?php echo e(1 / $subunit->unit_rate); ?> <?php echo e($subunit->unit_name); ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-primary" href="<?php echo e(URL::to('add_unit/0/' . $subunit->id)); ?>"><i
                                                        class="fas fa-edit"></i></a>
                                                <a onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-outline-danger" href="<?php echo e(URL::to('delete_unit/' . $subunit->id)); ?>"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>


                <?php
                $cnt++;
                    }
                    ?>



            </div>


        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\UnitConverter\resources\views/pages/units/table.blade.php ENDPATH**/ ?>