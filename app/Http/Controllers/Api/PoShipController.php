<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\PoShipMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
        $data = PoShipMaster::paginate(100);

            return response()->json([
                'status' => 'success',
                'message' => 'success get data',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'failed to get data',
                'error' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PoShipMaster  $poShipMaster
     * @return \Illuminate\Http\Response
     */
    public function show(PoShipMaster $poShipMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PoShipMaster  $poShipMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PoShipMaster $poShipMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PoShipMaster  $poShipMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(PoShipMaster $poShipMaster)
    {
        //
    }
}
