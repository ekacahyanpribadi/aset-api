<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TokoDistributor;

class TokoDistributorController extends Controller
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
        
        $todis = TokoDistributor::where('todis_status', '=', '1')
            ->orderBy('todis_ins_date','asc')
            ->get();
        //return response()->json($kategori);        
        Controller::respResult(200, 'Success Get Toko Distributor Data', $todis);
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

        $todis = new TokoDistributor();
        $todis_id = Controller::getPk();
        $todis->todis_id = $todis_id;
        $todis->todis = $request->todis;
        $todis->todis_alamat = $request->todis_alamat;
        $todis->todis_notelepon = $request->todis_notelepon;
        $todis->todis_pic = $request->todis_pic;
        $todis->todis_pic_notelepon = $request->todis_pic_notelepon;
        $todis->todis_status = $request->todis_status;
        $todis->todis_ins_user = $request->todis_ins_user;
        $todis->todis_ins_date = Controller::dateNow();

        $cekTipe = TokoDistributor::where('todis', '=', $request->todis);
        if ($cekTipe->exists()) {
            Controller::respResult(400, 'Toko Distributor: ' . $request->todis . ' is exist', );
            exit;
        } else {
            $todis->save();
        }

        Controller::respResult(200, 'Success Insert Toko Distributor ID: ' . $todis_id, $todis);
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

        $todis = TokoDistributor::find($id);
        //return response()->json($kategori);
        Controller::respResult(200, 'Success Show Toko Distributor ID: ' . $id, $todis);
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

        $todis = TokoDistributor::find($id);
        $todis->todis = $request->todis;
        $todis->todis_alamat = $request->todis_alamat;
        $todis->todis_notelepon = $request->todis_notelepon;
        $todis->todis_pic = $request->todis_pic;
        $todis->todis_pic_notelepon = $request->todis_pic_notelepon;
        $todis->todis_status = $request->todis_status;
        $todis->todis_ins_user = $request->todis_ins_user;
        $todis->todis_ins_date = Controller::dateNow();
        $todis->save();

        //return response()->json($kategori);
        Controller::respResult(200, 'Success Update Toko Distributor ID: ' . $id, $todis);
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

        TokoDistributor::destroy($id);
        //return response()->json(['message' => 'Deleted']);
        Controller::respResult(200, 'Success Delete Toko Distributor ID: ' . $id);
        return;
    }
}
