<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\report;
use App\Models\report_rows;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
      $report->data = $request['data'];
      $report->created_by = \Auth::user()->getAuthIdentifier();
      if($report->save()){
           foreach($request['item'] as $item){

                  report_rows::create([
                      'method_id'   => $item['id'],
                      'data'        => $item['data'],
                      'report_id'   => $report['id']
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $report = report::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(report $report)
    {

    }

    /**
     * @param $report report
     */
    public function send(report $report)
    {

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, report $report)
    {
        //
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
