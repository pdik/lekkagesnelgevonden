<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\report;
use App\Models\report_rows;

use Carbon\Carbon;
use DOMDocument;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use PDF;
use QCod\AppSettings\Setting\AppSettings;
use ReportRows;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('reports.index',['reports' => report::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create', ['customers' => customers::all(),
        ]);
    }

    /**
     * Generate pdf report
     */
    public function generatPdf($report){
       $report = report::findOrFail($report);
       if($report){

        $data = ['data' => $report];
         PDF::setOptions(['isRemoteEnabled' => true,'debugPng' => true,'isPhpEnabled', true,  ]);
        $pdf = PDF::loadView('themplates.basic.report',$data );
        return $pdf->stream();
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'customer_id' => 'required',
        'data' => 'nullable',
    ]);
      $report = new report();
      $report->customer_id = $request['customer_id'];
      $report->created_at = now();
      $report->updated_at = now();
      $report->status = 1;
      $report->advice = $request['advice'];
      $report->data = $request['data'];
      $report->created_by = \Auth::user()->getAuthIdentifier();
      if($report->save()){
           foreach($request['item'] as $item){

                  report_rows::create([
                      'method_id'   => $item['id'],
                      'data'        => $item['data'],
                      'report_id'   => $report['id'],
                      'images'      => $item['files'],
                  ]);
              }
      }
        try{
           $r = Report::findOrFail($report->id);
            return redirect()->route('rapport.index')->with('status', __('global.report') . ' ' . __('global.saved'));
        }
        catch (ModelNotFoundException $exception){

            return redirect()->route('rapport.create')->with('status','Failed to save report');
        }
    }

    public static function ChangeImageForPDF($html){
        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        foreach ($dom->getElementsByTagName('img') as $img) {
//            $path = App::environment('local') ? public_path($img->getAttribute('src')) : url($img->getAttribute('src'));
//            $type = pathinfo($path, PATHINFO_EXTENSION);
//            $data = file_get_contents($path);
//            $img->setAttribute( 'src','data:image/' . $type . ';base64,' . base64_encode($data));
              $img->setAttribute( 'src',substr($img->getAttribute('src'), 1));
        }
        return $dom->saveHTML();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $data['data'] = report::find($id);
        return view('reports.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($report)
    {
        $data['customers'] = customers::all();
        $data['report'] =   report::find($report);
        return view('reports.edit', $data);
    }


    public function addItem(Request $request){
        foreach($request['item'] as $item){
                  report_rows::create([
                      'method_id'   => $item['id'],
                      'data'        => $item['data'],
                      'report_id'   => $request->report_id,
                      'images'      => $item['files'],
                  ]);
              }
         return redirect()->route('rapport.edit',$request->report_id)->with('status', __('global.report') . ' ' . __('global.saved'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $report = report::find($id);
       $report->created_at = Carbon::createFromDate($request->date);
       $report->customer_id = $request->customer_id;
       $report->updated_at = now();
       $report->save();
       foreach ($request->item as $item){
           if(isset($item['id'])){
              $row = report_rows::find($item['id']);
              $row->images = $item['files']; //String of ids
              $row->method_id = $item['item']; //Item id
              $row->data = $item['data'];
              $row->save();
           }
       }
       return redirect()->route('rapport.edit', $report->id)->with('status',__('global.saved'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(report $report)
    {
        //
    }
}
