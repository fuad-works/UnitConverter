@extends('layouts.site')
@section('content')
    <div class="card border-primary mb-3 w-100">
        <div class="card-header">Products Table</div>
        <div class="card-body">


            <a class="btn ml-auto float-end mb-2 rounded-2 btn-lg btn-primary" href="{{ URL::to('add_product') }}"><i
                    class="fas fa-plus"></i> Add New</a>

            <h3 class="card-title">Here are all registed products</h3>
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
                    <h2 class="accordion-header" id="flush-heading{{ $row->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapse{{ $row->id }}" aria-expanded="false"
                            aria-controls="flush-collapse{{ $row->id }}">
                            <strong> #{{ $cnt }} {{ $row->product_name }} </strong>
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $row->id }}" class="accordion-collapse collapse"
                        aria-labelledby="flush-heading{{ $row->id }}" data-bs-parent="#accordionFlushExample">
                        <hr>
                        &nbsp;
                        <a class="btn btn-sm btn-outline-primary" href="{{ URL::to('add_product/' . $row->id) }}"><i
                                class="fas fa-edit"></i> Edit</a>
                        <a onclick="return confirm('Are you sure you want to delete this item?');"
                            class="btn btn-sm btn-outline-danger" href="{{ URL::to('delete_product/' . $row->id) }}"><i
                                class="fas fa-trash"></i> Delete</a>
                        <hr>
                        <div class="accordion-body">
                            <h6>Quantities:</h6>

                            @for ($i = 0; $i < sizeof($row->quantites); $i++)
                                <strong> {{ $row->quantites[$i]->quantity }}
                                    {{ $row->quantites[$i]->unit->unit_name }}
                                </strong>
                                @if ($i < sizeof($row->quantites) - 1)
                                    {{ ' and ' }}
                                @endif
                            @endfor

                            <hr />

                            Equals: <br>
                            <?php
                            foreach($row->quantites as $quantity)
                            {
                                $q_val = $quantity->quantity;

                                $parent_val = 0;
                                if($quantity->unit->parent_unit != null)
                                    foreach ($row->quantites as $parent) {
                                        if($parent->unit_id == $quantity->unit->parent_unit)
                                            $parent_val += $parent->quantity;
                                    }

                                //echo "[".$parent_val."]";

                                $q_val += $parent_val / $quantity->unit->unit_rate;


                                $child_val = 0;
                                if($quantity->unit->sub_units != null)
                                foreach ($quantity->unit->sub_units as $sub_unit) {

                                    foreach ($row->quantites as $parent) {
                                        if($parent->unit_id == $sub_unit->id)
                                            $child_val += $parent->quantity * $sub_unit->unit_rate;
                                    }

                                }
                                $q_val += $child_val;

                                //echo "[".$child_val."]";

                                echo "<strong>".$q_val." ".$quantity->unit->unit_name."</strong><br/>";

                            }
                            ?>


                            <hr />
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
@endsection
