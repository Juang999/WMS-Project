<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\SoShipDDetail;
use App\SoShipMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = DB::table('public.soship_mstr')
        //         ->selectRaw('public.soship_mstr.*, public.soshipd_det.*')
        //         ->join('public.soshipd_det', 'public.soship_mstr.soship_oid', '=', 'public.soshipd_det.soshipd_soship_oid')
        //         ->paginate(100);

        $data = SoShipMaster::with('SoShipDDetail')->paginate(50);

        return response()->json([
            'data' => $data
        ], 200);
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
     * @param  \App\SoShipMaster  $soShipMaster
     * @return \Illuminate\Http\Response
     */
    public function show($soship_code)
    {
        try {
            $data = SoShipMaster::where('soship_code', $soship_code)->first();

            $detailData = SoShipDDetail::where('soshipd_soship_oid', $data->soship_oid)->orderBy('soshipd_dt', 'DESC')->get();

            // $lastData = $data->SoShipDDetail->latest();

            return response()->json([
                'status' => 'success',
                'message' => 'success get data',
                'data' => compact('data', 'detailData')
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'messsage' => 'failed to get data',
                'error' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoShipMaster  $soShipMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoShipMaster $soShipMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoShipMaster  $soShipMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(SoShipMaster $soShipMaster)
    {
        //
    }
}
