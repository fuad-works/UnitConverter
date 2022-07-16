<tr>
    <td>
        <select required class="form-control" name="unit[]">
            @foreach ($alltable as $unit)
            <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input required type="number" class="form-control" step="0.00001" name="quantity[]" />
    </td>
    <td>
        <button onclick="deleteRow(this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
    </td>
</tr>
