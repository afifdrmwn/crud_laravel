<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Response;


class PegawaiController extends Controller
{
    public function index () {
        //mengambil data dari pegawai_tbl
        $pegawai = DB::table('knama')->GET();

        // echo json_encode(array("status" => 200, "data" => $pegawai));

         // Menampilkan data ke index
         return view('layouts.home', ['pegawai' => $pegawai]);
    }

    public function show () {
        //mengambil data dari pegawai_tbl
        $pegawai = DB::table('knama')->GET();

         // Menampilkan data ke index
         return view('layouts.tables.pegawaiTbl', ['pegawai' => $pegawai]);
    }

    public function showModal () {
        //mengambil data dari pegawai_tbl
        $pegawai = DB::table('knama')->GET();

         // Menampilkan data ke index
         return view('layouts.modals.pegawaiModal', ['pegawai' => $pegawai]);
    }

    public function store(Request $request) {
        $id = DB::table('knama')->insertGetId([
            'nama'      => $request->nama,
            'notelp'    => $request->notelp,
            'email'     => $request->email,
            'alamat'    => $request->alamat
        ]);

        //kembali ke index
        return Response::json([
            'id'        => $id,
            'nama'      => $request->nama,
            'notelp'    => $request->notelp,
            'email'     => $request->email,
            'alamat'    => $request->alamat
        ]);
    }

    public function update(Request $request) {
        //untuk mengupdate data pegawai
        DB::table('knama')->where('id', $request->id)->update([
            'nama'      => $request->nama,
            'notelp'    => $request->notelp,
            'email'     => $request->email,
            'alamat'    => $request->alamat
        ]);

        //kembali ke index
        return true;
    }

    public function hapus($id) {
        //untuk menghapus data berdasarkan id
        DB::table('knama')->where('id',$id)->delete();

        //kembali ke index
        return true;
    }

}
