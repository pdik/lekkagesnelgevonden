<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Contact_options;
use Illuminate\Http\Request;

class DetialsController extends Controller
{
    /*
     * Return all Contact details
     */
    public function index(){
        return Contact_options::all();
    }
}
