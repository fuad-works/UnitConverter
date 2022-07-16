<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function the_form($parent_id = 0, $id = 0)
    {
        $row = Unit::find($id);
        $table = Unit::where('parent_unit', '=', '0')->get();
        return view('pages.units.form')
            ->with('table', $table)
            ->with('parent_id', $parent_id)
            ->with('id', $id)->with('row', $row);
    }

    public function delete($id)
    {
        Unit::find($id)->delete();
        Unit::where('parent_unit', $id)->delete();

        return redirect('units_table');
    }

    public function post_form(Request $request)
    {
        $row = new Unit();
        if ($request->id > 0) {
            $row = Unit::find($request->id);
        }

        $row->unit_name = $request->unit_name;
        $row->parent_unit = $request->parent_unit;
        $row->unit_rate = $request->unit_rate;
        $row->save();

        return redirect('units_table');
    }

    public function table()
    {
        $table = Unit::where('parent_unit', '=', 'NULL')->with('sub_units')->get();
        return view('pages.units.table')->with('table', $table);
    }
}
