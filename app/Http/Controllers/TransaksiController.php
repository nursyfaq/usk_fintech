<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Transaksi;


class TransaksiController extends Controller
{
    public function index()
    {
        return view("pages.user.transaksi");
    }

    public function store(Request $request)
    {
        if ($request->type == 1) {
            $invoice_id = "SAL_" . Auth::user()->id . now()->timestamp;

            Transaksi::create([
                "user_id" => Auth::user()->id,
                "jumlah" => $request->balance,
                "invoice_id" => $invoice_id,
                "type" => $request->type,
                "status" => 2
            ]);

            return redirect()->back()->with("status", "Top Up Saldo Sedang Diproses");
        }
    }
}
