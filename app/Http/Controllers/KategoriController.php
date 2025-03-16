<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
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
        $kategori = Kategori::where('kategori_status', '=', '1')
            ->orderBy('kategori_ins_date', 'asc')
            ->get();
        //return response()->json($kategori);        
        Controller::respResult(200, 'Success Get Kategori Data', $kategori);
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

        $kategori = new Kategori();
        $kategori_id = Controller::getPk();
        $kategori->kategori_id = $kategori_id;
        $kategori->kategori = $request->kategori;
        $kategori->kategori_sub = $request->kategori_sub;
        $kategori->kategori_keterangan = $request->kategori_keterangan;
        $kategori->kategori_jumlah_aset = $request->kategori_jumlah_aset;
        $kategori->kategori_status = $request->kategori_status;
        $kategori->kategori_masa_manfaat = $request->kategori_masa_manfaat;
        $kategori->kategori_penyusutan_persen_pertahun = $request->kategori_penyusutan_persen_pertahun;
        $kategori->kategori_ins_user = $request->kategori_ins_user;
        $kategori->kategori_ins_date = Controller::dateNow();
        $kategori->kategori_upd_user = $request->kategori_upd_user;
        $kategori->kategori_upd_date = $request->kategori_upd_date;

        $cekKategori = Kategori::where('kategori', '=', $request->kategori);
        if ($cekKategori->exists()) {
            Controller::respResult(400, 'Kategori: ' . $request->kategori . ' is exist', );
            exit;
        } else {
            $kategori->save();
        }

        Controller::respResult(200, 'Success Insert Kategori ID: ' . $kategori_id, $kategori);
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

        $kategori = Kategori::find($id);
        //return response()->json($kategori);
        Controller::respResult(200, 'Success Show Kategori ID: ' . $id, $kategori);
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

        $kategori = Kategori::find($id);
        $kategori->kategori = $request->kategori;
        $kategori->kategori_sub = $request->kategori_sub;
        $kategori->kategori_keterangan = $request->kategori_keterangan;
        $kategori->kategori_jumlah_aset = $request->kategori_jumlah_aset;
        $kategori->kategori_status = $request->kategori_status;
        $kategori->kategori_masa_manfaat = $request->kategori_masa_manfaat;
        $kategori->kategori_penyusutan_persen_pertahun = $request->kategori_penyusutan_persen_pertahun;
        //$kategori->kategori_ins_user = $request->kategori_ins_date;
        //$kategori->kategori_ins_date = Controller::dateNow();
        $kategori->kategori_upd_user = $request->kategori_upd_user;
        $kategori->kategori_upd_date = Controller::dateNow();
        $kategori->save();

        //return response()->json($kategori);
        Controller::respResult(200, 'Success Update Kategori ID: ' . $id, $kategori);
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

        Kategori::destroy($id);
        //return response()->json(['message' => 'Deleted']);
        Controller::respResult(200, 'Success Delete Kategori ID: ' . $id);
        return;
    }
}
