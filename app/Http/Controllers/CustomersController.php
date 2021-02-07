<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomer;
use App\Models\Contact;
use App\Models\Contact_options;
use App\Models\customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;
class CustomersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customers.index', ['customers' => customers::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $options = Contact_options::all();
        return view('customers.create', ['contact_options' => $options]);
    }

    /**
     * Store a new customer to Datbase
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomer $cRequest)
    {
        abort_if(Gate::denies('customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       // dd($cRequest);
        //dd($cRequest->all());
        $customer = customers::create($cRequest->all());
        $contact_count = count($cRequest['contact_type']);

        for($i =0; $i < $contact_count; $i ++){
            echo $cRequest['contact_type'][$i]. " ". $cRequest['contact_value'][$i]."<br>";
            Contact::create([
                'customer_id' => $customer->id,
                'contact_option_id' => $cRequest['contact_type'][$i],
                'data'=> $cRequest['contact_value'][$i]
            ]);

        }
        return redirect()->route('dashboard')->with('status','Klant is succesvol aangemaakt');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(customers $customers)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customers  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Find customer
        $customer =  customers::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('customer_delete')) {
            return abort(401);
        }
       $customer =  customers::find($id);
        $customer->delete();
        return redirect(route('dashboard'))->with('status','Klant is succesvol aangemaakt');
    }
}
