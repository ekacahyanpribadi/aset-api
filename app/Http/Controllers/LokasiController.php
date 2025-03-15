<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;

class LokasiController extends Controller
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

        //$lokasi = Lokasi::get(); //all lokasi
        $lokasi = Lokasi::where('lokasi_status', '=', '1')
            ->orderBy('lokasi_ins_date','asc')
            ->get();
        //return response()->json($kategori);        
        Controller::respResult(200, 'Success Get Data', $lokasi);
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

        $lokasi = new Lokasi();
        $lokasi_id = Controller::getPk();
        $lokasi->lokasi_id = $lokasi_id;
        $lokasi->lokasi = $request->lokasi;
        $lokasi->lokasi_status = $request->lokasi_status;
        $lokasi->lokasi_ins_user = $request->lokasi_ins_user;
        $lokasi->lokasi_ins_date = Controller::dateNow();
        $lokasi->lokasi_upd_user = $request->lokasi_upd_user;
        $lokasi->lokasi_upd_date = $request->lokasi_upd_date;

        $cekLokasi = Lokasi::where('lokasi', '=', $request->lokasi);
        if ($cekLokasi->exists()) {
            Controller::respResult(400, 'Lokasi: ' . $request->lokasi . ' is exist', );
            exit;
        } else {
            $lokasi->save();
        }

        Controller::respResult(200, 'Success Insert ID: ' . $lokasi_id, $lokasi);
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

        $lokasi = Lokasi::find($id);
        //return response()->json($kategori);
        Controller::respResult(200, 'Success Show ID:' . $id, $lokasi);
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

        $lokasi = Lokasi::find($id);
        $lokasi->lokasi = $request->lokasi;
        $lokasi->lokasi_status = $request->lokasi_status;
        $lokasi->lokasi_upd_user = $request->lokasi_upd_user;
        $lokasi->lokasi_upd_date = Controller::dateNow();
        $lokasi->save();

        //return response()->json($kategori);
        Controller::respResult(200, 'Success Update ID: ' . $id, $lokasi);
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

        Lokasi::destroy($id);
        //return response()->json(['message' => 'Deleted']);
        Controller::respResult(200, 'Success Delete ID: ' . $id);
        return;
    }
}
