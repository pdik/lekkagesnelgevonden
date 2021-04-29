<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Mail\DownloadRapport;
use App\Models\customers;
use App\Models\report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use QCod\AppSettings\Setting\AppSettings;
use PDF;
class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

        /**
     * Generate pdf report
     */
    public function Download($report){
       $report = report::findOrFail($report);
       if($report){

        $data = ['data' => $report];
         PDF::setOptions(['isRemoteEnabled' => true,'debugPng' => false,'isPhpEnabled', true,  ]);
        $pdf = PDF::loadView('themplates.basic.report',$data );
        return $pdf->download();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function send(Request $request, $id){
        if(isset($id) && isset($request['customer'])){
         $customer = customers::find($request['customer']);
         $report = report::find($id);
         foreach ($customer->detials as $data){

             if($data->options->title === "email"){

                 Mail::to($data->data)
                         ->send(new DownloadRapport($report->id));
             }
         }
         return true;
        }


    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $r = report::find($id);
        $r->delete();
    }
}
