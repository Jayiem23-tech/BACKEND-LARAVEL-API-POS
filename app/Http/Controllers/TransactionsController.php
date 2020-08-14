<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransHeader;
use App\TransBody;

class TransactionsController extends Controller{
 
    public function saveHeader(Request $req){
        $data = $req->validate([
            "transno" => "required", 
            "totalItems" => "required",
            "totalAmount" => "required",
            "vatableSales" => "required",
            "vat" => "required",
            "cashTendered" => "required",
            "change" => "required" 
        ]); 
        $newTrans = new TransHeader;
        $newTrans->companies_id = 1 ;
        $newTrans->users_id = 1;
        $newTrans->transno = $req->transno;
        $newTrans->totalItems = $req->totalItems;
        $newTrans->totalAmount = $req->totalAmount;
        $newTrans->vatableSales = $req->vatableSales;
        $newTrans->vat = $req->vat;
        $newTrans->cashTendered = $req->cashTendered;
        $newTrans->change = $req->change; 
        $newTrans->save();
        $id = $newTrans->id;
        return $id;
    }
    
    public function saveBody(Request $req){ 
        $header = TransHeader::find($req->trans_headers_id); 
        $body = new TransBody;
        $body->products_id = $req->products_id;
        $body->price = $req->price;
        $body->quantity = $req->quantity;
        $body->subtotal = $req->subtotal; 
        $header->Transbodies()->save($body);
        return TransBody::all();
    }
    public function show(){
        return TransHeader::all();
    } 
}
