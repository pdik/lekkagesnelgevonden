<?php

namespace App\Http\Controllers;

use App\Models\CustomerDetials;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCustomerDetials;
class CustomerDetialsController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerDetials $request)
    {
        CustomerDetials::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerDetials  $customerDetials
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerDetials $customerDetials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerDetials  $customerDetials
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerDetials $customerDetials)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomerDetials  $customerDetials
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerDetials $customerDetials)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerDetials  $customerDetials
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerDetials $customerDetials)
    {
        //
    }
}
