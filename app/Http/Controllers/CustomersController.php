<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
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

        $customer = customers::create($cRequest->all());
        $contact_count = count($cRequest['contact_type']);

        for($i =0; $i < $contact_count; $i ++){
            //echo $cRequest['contact_type'][$i]. " ". $cRequest['contact_value'][$i]."<br>";
            Contact::create([
                'customer_id' => $customer->id,
                'contact_option_id' => $cRequest['detial'][$i],
                'data'=> $cRequest['value'][$i]
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
        $options = Contact_options::all();
        return view('customers.show', ['customer'=> $customer, 'options'=> $options]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomer $request, $id)
    {
        $data = $request->validated();
        $customer = customers::find($id);
        $customer->update($data);
        $count = count($request->value);
        Contact::where('customer_id', $customer->id)->delete();
        for($i =0; $i < $count; $i ++){

              Contact::create([
                  'contact_option_id' => $data['detial'][$i],
                  'customer_id'       => $customer->id,
                  'data'              => $data['value'][$i],
                  'updated_at'        => now()
              ]);
          }
          return redirect(route('klanten.edit', ['klanten'=> $customer->id]))->with('status','Klant Geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $customer =  customers::find($id);
        $customer->delete();
        return redirect(route('dashboard'))->with('status','Klant is succesvol aangemaakt');
    }

}
