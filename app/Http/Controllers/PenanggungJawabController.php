<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenanggungJawab;

class PenanggungJawabController extends Controller
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
        $penja = PenanggungJawab::where('penja_status', '=', '1')
            ->orderBy('penja_ins_date','asc')
            ->get();
        //return response()->json($kategori);        
        Controller::respResult(200, 'Success Get Data Penanggung Jawab', $penja);
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

        $penja = new PenanggungJawab();
        $penja_id = Controller::getPk();
        $penja->penja_id = $penja_id;
        $penja->penja_nama = $request->penja_nama;
        $penja->penja_no_telepon = $request->penja_no_telepon;
        $penja->penja_email = $request->penja_email;
        $penja->penja_alamat = $request->penja_alamat;
        $penja->penja_jabatan = $request->penja_jabatan;
        $penja->penja_instansi = $request->penja_instansi;
        $penja->penja_keterangan = $request->penja_keterangan;
        $penja->penja_status = $request->penja_status;
        $penja->penja_ins_user = $request->penja_ins_user;
        $penja->penja_ins_date = Controller::dateNow();
        $penja->penja_upd_user = $request->penja_upd_user;
        $penja->penja_upd_date = $request->penja_upd_date;
        $penja->save();

        Controller::respResult(200, 'Success Insert Penanggung Jawab ID: ' . $penja_id, $penja);
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

        $penja = PenanggungJawab::find($id);
        //return response()->json($kategori);
        Controller::respResult(200, 'Success Show Penanggung Jawab ID: ' . $id, $penja);
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

        $penja = PenanggungJawab::find($id);
        $penja->penja_nama = $request->penja_nama;
        $penja->penja_no_telepon = $request->penja_no_telepon;
        $penja->penja_email = $request->penja_email;
        $penja->penja_alamat = $request->penja_alamat;
        $penja->penja_jabatan = $request->penja_jabatan;
        $penja->penja_instansi = $request->penja_instansi;
        $penja->penja_keterangan = $request->penja_keterangan;
        $penja->penja_status = $request->penja_status;
        $penja->penja_upd_user = $request->penja_upd_user;
        $penja->penja_upd_date = Controller::dateNow();
        $penja->save();

        //return response()->json($kategori);
        Controller::respResult(200, 'Success Update Penanggung Jawab ID: ' . $id, $penja);
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

        PenanggungJawab::destroy($id);
        //return response()->json(['message' => 'Deleted']);
        Controller::respResult(200, 'Success Delete Penanggung Jawab ID: ' . $id);
        return;
    }
}
