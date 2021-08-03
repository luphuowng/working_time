<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_acc;
use App\Models\User;
use Session;
use Carbon\Carbon;

class TypeAccController extends Controller
{

    public function getType()
    {
        $data = type_acc::select('type_acc.id_type','type_acc.type_name')->get()->toArray();
        return response()->json($data);
    }


    public function storeType(Request $request)
    {
        $ta = new type_acc();
        $ta->type_name = $request->type_name;
        $ta->save();
    }

    public function updateType(Request $request, $id_type)
    {
        $data = type_acc::find($id_type);
        $data->type_name = $request->type_name;
        $data->save();
        return reponse()->json($data);
    }

    public function destroyType($id_type)
    {
        $data = type_acc::find($id_type);
        $data->delete();
        return response()->json($data);
    }
}
