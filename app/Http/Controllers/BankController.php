<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function get_transaksi() {
        $transaksi = Transaksi::all();
        return view('pages.bank.index', compact('transaksi'));
    }
    

    public function acc_transaksi($transaksi_id) {
        $subs = Transaksi::where("type", 1)
                        ->where("status", 2)
                        ->get();

        return view('bank', compact("subs"));
    }
}
