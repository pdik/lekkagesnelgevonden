<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\report_rows;
use Illuminate\Http\Request;

class ReportRowsController extends Controller
{
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $row = report_rows::find($id);
        if($row->delete()){
            return true;
        }
        return false;

    }
}
