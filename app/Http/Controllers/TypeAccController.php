<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\type_acc;
use DB;
use Session;
use Carbon\Carbon;
use PhpParser\Node\Stmt\TryCatch;

class TypeAccController extends Controller
{
    public function getTypes()
    {
        $data = type_acc::select('type_acc.*')->get()->toArray();
        return response()->json($data);
    }

    public function getType()
    {
        $data = DB::table('type_acc')->get();
        if($data) {
            return response()->json($data);
        }else {
            $res = [
                'status' => 401,
                'des' => 'Error code'
            ];
            return response()->json($res, 401);
        }
        return response()->json($data);
    }


    public function storeType(Request $request)
    {
        $type_name = $request->type_name;
        if($type_name) {
            DB::table('type_acc')->insert([
                'type_name' => $type_name
            ]);

            $res = [
                'status' => 200,
                'des' => 'Save type success'
            ];
            return response()->json($res, 200);
        }else {
            $res = [
                'status' => 401,
                'des' => 'save type fail'
            ];
            return response()->json($res, 401);
        }
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
