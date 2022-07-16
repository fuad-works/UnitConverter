<tr>
    <td>
        <select required class="form-control" name="unit[]">
            <?php $__currentLoopData = $alltable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($unit->id); ?>"><?php echo e($unit->unit_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </td>
    <td>
        <input required type="number" class="form-control" step="0.00001" name="quantity[]" />
    </td>
    <td>
        <button onclick="deleteRow(this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
    </td>
</tr>
<?php /**PATH C:\xampp\htdocs\UnitConverter\resources\views/pages/products/quantity_row.blade.php ENDPATH**/ ?>