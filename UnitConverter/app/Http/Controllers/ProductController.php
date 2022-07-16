<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductQuantity;
use Illuminate\Http\Request;
use App\Models\Unit;

class ProductController extends Controller
{
    public function the_form($id = 0)
    {
        $row = Product::find($id);
        $quantities = ProductQuantity::where('product_id','=',$id)->get();
        $table = Unit::where('parent_unit','=','0')->get();
        $alltable = Unit::all();
        return view('pages.products.form')
            ->with('table', $table)
            ->with('quantities', $quantities)
            ->with('alltable', $alltable)
            ->with('id', $id)->with('row', $row);
    }

    public function delete($id)
    {
        Product::find($id)->delete();
        ProductQuantity::where('product_id','=',$id)->delete();
        return redirect('products_table');
    }

    public function post_form(Request $request)
    {
        $row = new Product();
        if ($request->id > 0) {
            $row = Product::find($request->id);
        }

        $row->product_name = $request->product_name;
        $row->unit_id = 0;
        $row->quantity = 0;
        $row->save();
        $product_id = $row->id;

        //delete all quantities
        ProductQuantity::where('product_id','=',$product_id)->delete();
        //sign all new quantites
        $units = $request->unit;

        $quantities = $request->quantity;
        for($i=0;$i<sizeof($units);$i++)
        {
            $product_quantity = new ProductQuantity();
            $product_quantity->product_id = $product_id;
            $product_quantity->unit_id = $units[$i];
            $product_quantity->quantity = $quantities[$i];
            $product_quantity->save();
        }

        return redirect('products_table');
    }

    public function table()
    {
        $table = Product::with('quantites')->with('quantites.unit')->with('unit.parent_unit')->get();
        $allunits = Unit::all();
        return view('pages.products.table')->with('allunits', $allunits)->with('table', $table);
    }
}
