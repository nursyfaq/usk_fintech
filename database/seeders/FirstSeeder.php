<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Role;
use App\Models\Saldo;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //membuat isi role
        $admin = Role::create(
            ["name"=>"Administrator"
        ]);

        $bank_mini = Role::create(
            ["name" => "Bank Mini"]
        );

        $kantin = Role::create(
            ["name" => "Kantin"]
        );

        $siswa = Role::create(
            ["name" => "Siswa"]
        );

        //membuat isi user
        User::create([
            "name"=>"Nursyfa Aprilianti",
            "email"=>"nursyfa@gmail.com",
            "password"=> Hash::make("nursyfa"),
            "role_id"=>$admin->id
        ]);

        User::create([
            "name"=>"Igun",
            "email"=>"igun@gmail.com",
            "password"=> Hash::make("igun"),
            "role_id"=>$bank_mini->id
        ]);

        User::create([
            "name"=>"Keren Matilda",
            "email"=>"keren@gmail.com",
            "password"=> Hash::make("nursyfa"),
            "role_id"=>$kantin->id
        ]);

        $fadiah = User::create([
            "name"=>"Fadiah Ahmad",
            "email"=>"fadiah@gmail.com",
            "password"=> Hash::make("fadiah"),
            "role_id"=>$siswa->id
        ]);

        //membuat isi barang
        $bakso = Barang::create([
            "name"=>"Bakso",
            "price"=>"10000",
            "stock"=>"25",
            "image"=>"pj2.PNG",
            "desc"=>"bakso"
        ]);

        $mie_ayam = Barang::create([
            "name"=>"Mie Ayam",
            "price"=>"13000",
            "stock"=>"25",
            "image"=>"ffjwf",
            "desc"=>"mie ayam"
        ]);

        $es_teh = Barang::create([
            "name"=>"Es Teh",
            "price"=>"5000",
            "stock"=>"50",
            "image"=>"ffjwf",
            "desc"=>"es teh"
        ]);

        $aqua = Barang::create([
            "name"=>"aqua",
            "price"=>"3000",
            "stock"=> "75",
            "image"=>"ffjwf",
            "desc"=>"aqua"
        ]);

        //membuat isi transaksi (yang ingin isi saldo)

        Saldo::create([
            "user_id" => $fadiah->id,
            "saldo" => 50000
        ]);

        //isi saldo
        Transaksi::create([
            "user_id" => $fadiah->id,
            "barang_id" => null,
            "jumlah" => 50000,
            "invoice_id" => "SAL_001",
            "type" => 1,
            "status" => 2
         ]);

         //belanja
         Transaksi::create([
            "user_id" => $fadiah->id,
            "barang_id" => $mie_ayam->id,
            "jumlah" => 2,
            "invoice_id" => "INV_001",
            "type" => 2,
            "status" => 1
         ]);


         Transaksi::create([
            "user_id" => $fadiah->id,
            "barang_id" => $es_teh->id,
            "jumlah" => 2,
            "invoice_id" => "INV_001",
            "type" => 2,
            "status" => 1
         ]);



    }
}
