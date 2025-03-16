<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produsen;

class ProdusenController extends Controller
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
        
        $produsen = Produsen::where('produsen_status', '=', '1')
            ->orderBy('produsen_ins_date','asc')
            ->get();
        //return response()->json($kategori);        
        Controller::respResult(200, 'Success Get Produsen Data', $produsen);
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

        $produsen = new Produsen();
        $produsen_id = Controller::getPk();
        $produsen->produsen_id = $produsen_id;
        $produsen->produsen = $request->produsen;
        $produsen->produsen_status = $request->produsen_status;
        $produsen->produsen_ins_user = $request->produsen_ins_user;
        $produsen->produsen_ins_date = Controller::dateNow();

        $cekProdusen = Produsen::where('produsen', '=', $request->produsen);
        if ($cekProdusen->exists()) {
            Controller::respResult(400, 'Produsen: ' . $request->produsen . ' is exist', );
            exit;
        } else {
            $produsen->save();
        }

        Controller::respResult(200, 'Success Insert Produsen ID: ' . $produsen_id, $produsen);
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

        $produsen = Produsen::find($id);
        //return response()->json($kategori);
        Controller::respResult(200, 'Success Show Produsen ID:' . $id, $produsen);
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

        $produsen = Produsen::find($id);
        $produsen->produsen = $request->produsen;
        $produsen->produsen_status = $request->produsen_status;
        $produsen->produsen_upd_user = $request->produsen_upd_user;
        $produsen->produsen_upd_date = Controller::dateNow();
        $produsen->save();

        //return response()->json($kategori);
        Controller::respResult(200, 'Success Update Produsen ID: ' . $id, $produsen);
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

        Produsen::destroy($id);
        //return response()->json(['message' => 'Deleted']);
        Controller::respResult(200, 'Success Delete Produsen ID: ' . $id);
        return;
    }
}
