<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Social; //sử dụng model Social
use App\Models\User;
use NunoMaduro\Collision\Provider;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    public function redirectToProvider(){
        return Socialite::driver('gitlab')->redirect()->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Headers',  'Content-Type, X-Auth-Token, Authorization, Origin')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    public function handleProviderCallback(){
        $user = Socialite::driver('gitlab')->user();
        $accessTokenResponseBody = $user->token;
        $response = [
            'status' => 201,
            'token' => $accessTokenResponseBody
        ];
        // return response()->json($response, 201);
        $users = new User([
            'remember_token' => $accessTokenResponseBody
        ]);

        $users->save();
        $id_git = $user->id;
        $account_g = Social::where('provide', 'gilab')->where('provide_user_id', $id_git)->count();
        if($account_g) {
            $response = [
                'status' => 201,
                'description' => 'Login successfully'
            ];
            return response()->json($response, 200);

        }else{

            $new = new Social([
                'provider_user_id' => $user->id,
                'provider' => 'gitlab'
            ]);
            $new->save();

            $orang = new User([
                'id' => 'provider_user_id',
                'name' => $user->name,
                'email' => $user->email,
                'type_acc' => 1
            ]);
            $orang -> save();

            $response = [
                'status' => 201,
                'description' => 'Login successfully'
            ];
            return response()->json($response, 201);
        }
    }
}
