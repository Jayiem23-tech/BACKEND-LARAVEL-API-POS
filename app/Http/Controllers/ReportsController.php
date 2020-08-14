<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ReportsController extends Controller
{
    public function SalesReport(Request $req){
        $filterBy = 1;
        $result = ''; 
        $result = DB::table("trans_headers")
                    ->join("trans_bodies","trans_headers.id","=","trans_bodies.trans_header_id")
                    ->select("trans_headers.*") 
                    ->groupBy("trans_headers.id")
                    ->get(); 
        return $result; 
    }
    public function TransactionHistory(){
        return 'history';
    }
    public function TransactionDetails(){
        // User
        // datetime
        // Orders list
    }

}
