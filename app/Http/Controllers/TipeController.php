<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipe;

class TipeController extends Controller
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
        
        $tipe = Tipe::where('tipe_status', '=', '1')
            ->orderBy('tipe_ins_date','asc')
            ->get();
        //return response()->json($kategori);        
        Controller::respResult(200, 'Success Get Tipe Data', $tipe);
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

        $tipe = new Tipe();
        $tipe_id = Controller::getPk();
        $tipe->tipe_id = $tipe_id;
        $tipe->tipe = $request->tipe;
        $tipe->tipe_status = $request->tipe_status;
        $tipe->tipe_ins_user = $request->tipe_ins_user;
        $tipe->tipe_ins_date = Controller::dateNow();

        $cekTipe = Tipe::where('tipe', '=', $request->produsen);
        if ($cekTipe->exists()) {
            Controller::respResult(400, 'Tipe: ' . $request->tipe . ' is exist', );
            exit;
        } else {
            $tipe->save();
        }

        Controller::respResult(200, 'Success Insert Tipe ID: ' . $tipe_id, $tipe);
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

        $tipe = Tipe::find($id);
        //return response()->json($kategori);
        Controller::respResult(200, 'Success Show Tipe ID:' . $id, $tipe);
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

        $tipe = Tipe::find($id);
        $tipe->tipe = $request->tipe;
        $tipe->tipe_status = $request->tipe_status;
        $tipe->tipe_upd_user = $request->tipe_upd_user;
        $tipe->tipe_upd_date = Controller::dateNow();
        $tipe->save();

        //return response()->json($kategori);
        Controller::respResult(200, 'Success Update Tipe ID: ' . $id, $tipe);
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

        Tipe::destroy($id);
        //return response()->json(['message' => 'Deleted']);
        Controller::respResult(200, 'Success Delete Tipe ID: ' . $id);
        return;
    }
}
