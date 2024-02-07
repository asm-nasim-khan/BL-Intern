<?php

namespace App\Http\Controllers;

use App\Models\ConnectDataBase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dataController extends Controller
{
    public function showall(){
        // $records = ConnectDataBase::all();
        $orders = DB::table('gbts_table')
        ->join('egbts_table', 'gbts_table.SiteName', '=', 'egbts_table.SiteName')
        ->select('gbts_table.*', 'egbts_table.SiteName','egbts_table.Email')
        ->get();


        return view('database_view',['database_all'=>$orders]);
    }
}
