<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cekToken = $request->token;
        $cekToken2 = Controller::tokenAccess();
        if ($cekToken != $cekToken2) {
            Controller::respResult(400, "Token request invalid!");
            exit;
        }


        //$kategori = Kategori::get();
        $aset = Aset::where('aset_status', '=', '1')
            ->orderBy('aset_ins_date','asc')
            ->get();
        //return response()->json($kategori);        
        Controller::respResult(200, 'Success Get Aset Data', $aset);
        return;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cekToken = $request->token;
        $cekToken2 = Controller::tokenAccess();
        if ($cekToken != $cekToken2) {
            Controller::respResult(400, "Token request invalid!");
            exit;
        }

        $aset = new Aset();
        $aset_id = Controller::getPk();
                
        $aset->aset_id = $aset_id;
        $aset->aset_kode = $request->aset_kode;
        $aset->aset = $request->aset;
        $aset->aset_katagori_id = $request->aset_katagori_id;
        $aset->aset_merk_id = $request->aset_merk_id;
        $aset->aset_tipe_id = $request->aset_tipe_id;
        $aset->aset_produsen_id = $request->aset_produsen_id;
        $aset->aset_no_seri = $request->aset_no_seri;
        $aset->aset_tahun_produksi = $request->aset_tahun_produksi;
        $aset->aset_deskripsi = $request->aset_deskripsi;
        $aset->aset_tanggal_pembelian = $request->aset_tanggal_pembelian;
        $aset->aset_todis_id = $request->aset_todis_id;
        $aset->aset_no_invoice = $request->aset_no_invoice;
        $aset->aset_jumlah = $request->aset_jumlah;
        $aset->aset_harga_satuan = $request->aset_harga_satuan;
        $aset->aset_harga_total = $request->aset_harga_total;
        $aset->aset_file_foto = $request->aset_file_foto;
        $aset->aset_file_lampiran = $request->aset_file_lampiran;
        $aset->aset_file_path = $request->aset_file_path;
        $aset->aset_keterangan_tambahan = $request->aset_keterangan_tambahan;
        $aset->aset_tahun_penyusutan = $request->aset_tahun_penyusutan;
        $aset->aset_penyusutan_perbulan = $request->aset_penyusutan_perbulan;
        $aset->aset_status = $request->aset_status;
        $aset->aset_ins_user = $request->aset_ins_user;
        $aset->aset_ins_date = Controller::dateNow();
        $aset->save();

        Controller::respResult(200, 'Success Insert ID: ' . $aset_id, $aset);
        return;
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $cekToken = $request->token;
        $cekToken2 = Controller::tokenAccess();
        if ($cekToken != $cekToken2) {
            Controller::respResult(400, "Token request invalid!");
            exit;
        }
        //

        $aset = Aset::find($id);
        //return response()->json($kategori);
        Controller::respResult(200, 'Success Show Aset ID: ' . $id, $aset);
        exit;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cekToken = $request->token;
        $cekToken2 = Controller::tokenAccess();
        if ($cekToken != $cekToken2) {
            Controller::respResult(400, "Token request invalid!");
            exit;
        }

        $aset = Aset::find($id);
        $aset->aset = $request->aset;
        $aset->aset_katagori_id = $request->aset_katagori_id;
        $aset->aset_merk_id = $request->aset_merk_id;
        $aset->aset_tipe_id = $request->aset_tipe_id;
        $aset->aset_produsen_id = $request->aset_produsen_id;
        $aset->aset_no_seri = $request->aset_no_seri;
        $aset->aset_tahun_produksi = $request->aset_tahun_produksi;
        $aset->aset_deskripsi = $request->aset_deskripsi;
        $aset->aset_tanggal_pembelian = $request->aset_tanggal_pembelian;
        $aset->aset_todis_id = $request->aset_todis_id;
        $aset->aset_no_invoice = $request->aset_no_invoice;
        $aset->aset_jumlah = $request->aset_jumlah;
        $aset->aset_harga_satuan = $request->aset_harga_satuan;
        $aset->aset_harga_total = $request->aset_harga_total;
        $aset->aset_file_foto = $request->aset_file_foto;
        $aset->aset_file_lampiran = $request->aset_file_lampiran;
        $aset->aset_file_path = $request->aset_file_path;
        $aset->aset_keterangan_tambahan = $request->aset_keterangan_tambahan;
        $aset->aset_tahun_penyusutan = $request->aset_tahun_penyusutan;
        $aset->aset_penyusutan_perbulan = $request->aset_penyusutan_perbulan;
        $aset->aset_status = $request->aset_status;
        $aset->aset_upd_user = $request->aset_ins_user;
        $aset->aset_upd_date = Controller::dateNow();
        $aset->save();

        //return response()->json($kategori);
        Controller::respResult(200, 'Success Update Aset ID: ' . $id, $aset);
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $cekToken = $request->token;
        $cekToken2 = Controller::tokenAccess();
        if ($cekToken != $cekToken2) {
            Controller::respResult(400, "Token request invalid!");
            exit;
        }

        Aset::destroy($id);
        //return response()->json(['message' => 'Deleted']);
        Controller::respResult(200, 'Success Delete Aset ID: ' . $id);
        return;
    }
}
