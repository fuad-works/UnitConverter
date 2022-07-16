@extends('layouts.site')
@section('content')
    <div class="card border-primary mb-3 w-100">
        <div class="card-header">Product Form</div>
        <div class="card-body">

            <h3 class="card-title">Enter Product's info and hit "Save Data"</h3>
            <br />

            <form method="POST" action="{{ URL::to('/add_product') }}">
                @csrf

                <input type="hidden" name="id" value="<?php if (isset($row)) {
                    echo $row->id;
                } else {
                    echo '0';
                } ?>" />

                <div class="form-floating mb-3">
                    <input type="text" name="product_name" class="form-control" id="floatingName"
                        value="<?php if (isset($row)) {
                            echo $row->product_name;
                        } ?>" placeholder="Product Name">
                    <label for="floatingName">Product Name</label>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5>Quantites</h5>

                        <button type="button" onclick="AddQuantityRow()"
                            class="btn ml-auto float-end mb-2 rounded-1 btn-sm btn-outline-primary"><i
                                class="fas fa-plus"></i> Add quantity</button>

                        <table id="quantities_table" class="table table-border">
                            <thead>
                                <tr>
                                    <th>Unit</th>
                                    <th>Quantity</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (!isset($row))
                                    @include('pages.products.quantity_row')
                                @else
                                    @foreach ($quantities as $quantity)
                                        <tr>
                                            <td>
                                                <select required class="form-control" name="unit[]">
                                                    @foreach ($alltable as $unit)
                                                        <?php
                                                        $selected = '';
                                                        if ($unit->id == $quantity->unit_id) {
                                                            $selected = 'selected="selected"';
                                                        }
                                                        ?>
                                                        <option {{ $selected }} value="{{ $unit->id }}">
                                                            {{ $unit->unit_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input value="{{ $quantity->quantity }}" required type="number" class="form-control" step="0.00001"
                                                    name="quantity[]" />
                                            </td>
                                            <td>
                                                <button onclick="deleteRow(this)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>

                <button type="submit" class="btn btn-lg w-100 btn-success"> Save Data <i class="fas fa-save"></i></button>
            </form>

            <script>
                var table = document.getElementById("quantities_table");

                function AddQuantityRow() {
                    var row = table.insertRow(1);
                    row.innerHTML = `@include('pages.products.quantity_row')`;
                }

                function deleteRow(btn) {
                    var row = btn.parentNode.parentNode;
                    row.parentNode.removeChild(row);
                }
            </script>

        </div>
    </div>
@endsection
