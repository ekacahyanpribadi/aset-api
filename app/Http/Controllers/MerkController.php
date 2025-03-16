<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;

class MerkController extends Controller
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
        
        $merk = Merk::where('merk_status', '=', '1')
            ->orderBy('merk_ins_date','asc')
            ->get();
        //return response()->json($kategori);        
        Controller::respResult(200, 'Success Get Data', $merk);
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

        $merk = new Merk();
        $merk_id = Controller::getPk();
        $merk->merk_id = $merk_id;
        $merk->merk = $request->merk;
        $merk->merk_status = $request->merk_status;
        $merk->merk_ins_user = $request->merk_ins_user;
        $merk->merk_ins_date = Controller::dateNow();
        $merk->merk_upd_user = $request->merk_upd_user;
        $merk->merk_upd_date = $request->merk_upd_date;

        $cekMerk = Merk::where('merk', '=', $request->merk);
        if ($cekMerk->exists()) {
            Controller::respResult(400, 'Merk: ' . $request->merk . ' is exist', );
            exit;
        } else {
            $merk->save();
        }

        Controller::respResult(200, 'Success Insert Merk ID: ' . $merk_id, $merk);
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

        $merk = Merk::find($id);
        //return response()->json($kategori);
        Controller::respResult(200, 'Success Show Merk ID:' . $id, $merk);
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

        $merk = Merk::find($id);
        $merk->merk = $request->merk;
        $merk->merk_status = $request->merk_status;
        $merk->merk_upd_user = $request->merk_upd_user;
        $merk->merk_upd_date = Controller::dateNow();
        $merk->save();

        //return response()->json($kategori);
        Controller::respResult(200, 'Success Update Merk ID: ' . $id, $merk);
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

        Merk::destroy($id);
        //return response()->json(['message' => 'Deleted']);
        Controller::respResult(200, 'Success Delete Merk ID: ' . $id);
        return;
    }
}
