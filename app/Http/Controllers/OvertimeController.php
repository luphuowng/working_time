<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Overtime;
use App\Models\User;
use App\Http\Requests\Overtime\StoreRequest;

class overtimeController extends Controller
{
    public function getdata(){
        $data = Overtime::where('status',0)->get()->toArray();
        dd($data);
        return view('Overtime.getdata');
    }

    public function createOT(){
        $data = User::select('id','name','email')->where('id',1)->get()->toArray();
        // dd();
        return view('Overtime.createOT', compact('data'));
    }

    public function storeOT(Request $request){
        
        $ot = new Overtime();
        $ot->id_user = $request->id_user;        
        $ot->reason = $request->reason;
        $ot->number = $request->number;

        // dd($ot->toArray());

        $ot->save();
        
        echo 'da luu thanh cong!';

        // return view('createOT');
        
    }

    public function editOT(){
        
    }

    public function updateOT(){
        
    }



}