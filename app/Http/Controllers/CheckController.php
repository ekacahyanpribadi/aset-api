<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cekToken = base64_encode($request->token);
        $cekToken2 = base64_encode('ZDwIspryCX3j7Lfdoo9B1rxjm2DfLerQsiVwJmrp3qDJYzVg0wj9iSrsTqaeFIcK');
        if ($cekToken != $cekToken2) {
            Controller::respResult(400,  "Token request invalid!");
            exit;
        }

        //
        
        //return response()->json($kategori);
        Controller::respResult(200,  $cekToken);
        exit;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
