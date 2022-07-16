<?php $__env->startSection('content'); ?>
    <div class="card border-primary mb-3 w-100">
        <div class="card-header">Unit Form</div>
        <div class="card-body">

            <h3 class="card-title">Enter Unit's info and hit "Save Data"</h3>
            <br />

            <form method="POST" action="<?php echo e(URL::to('/add_unit')); ?>">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="id" value="<?php if (isset($row)) {
                    echo $row->id;
                } else {
                    echo '0';
                } ?>" />

                <div class="form-floating mb-3">
                    <input type="text" name="unit_name" class="form-control" id="floatingName"
                        value="<?php if (isset($row)) {
                            echo $row->unit_name;
                        } ?>" placeholder="Unit Name">
                    <label for="floatingName">Unit Name</label>
                </div>

                <div class="form-floating mb-3">
                    <select name="parent_unit" class="form-control" id="floatingParent">
                        <?php
                        $selected = '';
                        if (isset($row)) {
                            if ($row->parent_unit == 0 || $parent_id == 0) {
                                $selected = 'selected="selected"';
                            }
                        }
                        ?>

                        <option <?php echo e($selected); ?> value="0">None</option>

                        <?php
                        if(isset($table))
                            foreach ($table as $parent) {
                                $selected = '';
                                if (isset($row))
                                {
                                    if ($row->parent_unit == $parent->id)
                                        $selected = 'selected="selected"';
                                }
                                else
                                if ($parent_id == $parent->id)
                                        $selected = 'selected="selected"';

                                    ?>

                        <option <?php echo e($selected); ?> value="<?php echo e($parent->id); ?>"><?php echo e($parent->unit_name); ?></option>
                        <?php
                                                        }
                        ?>
                    </select>
                    <label for="floatingParent">Base Unit</label>
                </div>


                <div class="form-floating mb-3">
                    <input name="unit_rate" type="number" step=".0001" class="form-control" value="<?php if (isset($row)) {
                        echo $row->unit_rate;
                    } else echo "1" ?>"
                        id="floatingRate" placeholder="1.1">
                    <label for="floatingRate">Convert Rate</label>
                    <div id="rateHelper" class="form-text">how much this unit equls to the base unit</div>
                </div>


                <button type="submit" class="btn btn-lg w-100 btn-success"> Save Data <i class="fas fa-save"></i></button>
            </form>



        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\UnitConverter\resources\views/pages/units/form.blade.php ENDPATH**/ ?>