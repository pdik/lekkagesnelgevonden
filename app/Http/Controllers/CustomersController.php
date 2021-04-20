<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomer;
use App\Http\Requests\UpdateCustomer;
use App\Models\Contact;
use App\Models\Contact_options;
use App\Models\customers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCustomer $cRequest)
    {

        $customer = customers::create($cRequest->all());
        foreach ($cRequest->customerDetials as $detial) {

            /**
             * Insert Contact detials into Database
             */
            Contact::create([
                'customer_id' => $customer->id,
                'contact_option_id' =>  $detial['type'],
                'data'=> $detial['data']
            ]);
        }
        try{
            return redirect()->route('customers.edit', [$customer->id])->with('status','Klant is succesvol aangemaakt');
        }
        catch (ModelNotFoundException $e){
            return redirect()->route('dashboard')->with('failed','Niet gelukt om klant aantemaken');
        }
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
     * @param UpdateCustomer $request
     * @param customers $customer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCustomer $request, customers $customer)
    {
        $data = $request->validated();
        $customer->update($data);
        /**
         * Remove old data en add new data
         */
        Contact::where('customer_id', $customer->id)->delete();
         foreach ($request->customerDetials as $detial) {

            /**
             * Insert Contact detials into Database
             */
            Contact::create([
                'customer_id' => $customer->id,
                'contact_option_id' =>  $detial['type'],
                'data'=> $detial['data']
            ]);
        }
         try{
             return redirect(route('customers.edit', ['customer'=> $customer->id]))->with('status','Klant Geupdate');
         }catch (\Exception $e){
              return redirect(route('customers.edit', ['customer'=> $customer->id]))->with('failed','Niet kunnen updaten');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
       $customer =  customers::find($id);
       if($customer->delete()){
           return redirect(route('dashboard'))->with('status','Klant is succesvol aangemaakt');
       }else{
         return redirect(route('dashboard'))->with('failed','Klant niet kunnen verwijderen');
       }
    }

}
