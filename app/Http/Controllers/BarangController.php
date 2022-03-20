<?php

namespace App\Http\Controllers;
use App\Models\Barang;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        return view("pages.kantin.index", compact("barangs"));
        //compact supaya variabel yg dibuat bisa dipanggil ke blade

    }

    public function store(Request $request){
        $request->validate([
            "name"  => "required",
            "price"  => "required",
            "stock"  => "required",
            "desc"  => "required",
        ]);

        $barang = new Barang();
        $barang->name         = $request->name;
        $barang->image        = $request->image;
        $barang->price        = $request->price;
        $barang->stock        = $request->stock;
        $barang->desc  = $request->desc;
        $barang->save();
        return redirect()->back();

    }

    public function update(Request $request, Barang $barang){
        $barang->name = $request->name;
        $barang->image = $request->image;
        $barang->price = $request->price;
        $barang->stock = $request->stock;
        $barang->desc = $request ->desc;
        $barang->update();
        return redirect()->back();

    }

    public function destroy(Barang $barang){
        $barang->delete();
        return redirect()->back();
    }


}
