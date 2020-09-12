<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

use App\User;

use Socialite;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function init()
    {
        $user= Auth::user();
        return response()->json(['user' => $user],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
      if(Auth::attempt(['email'=>$request->email,'password'=>$request->password],true)){
        return response()->json(Auth::user(),200);
        
      }
      else{
        return response()->json(['error' => 'Could not log you in'],401);
      }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if (isset($user->id)) {
            return response()->json(['error'=>'email already exist'],401);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
 
        Auth::login($user);

        return response()->json($user,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();
    }

    /**
     * Sign In With GitHub
    */
    public function github()
    {
       return Socialite::driver('github')->redirect();
    }


    /**
     * Sign Up with Github
     * redirect link
    */

   public function githubredirect()
   {
     $user = Socialite::driver('github')->user();
     // if this user doesn'nt exist, add them
     // if they do, get the model
     // either way, authenticate the user into the application and redirect aftrewards

     $user = User::firstOrCreate([
       'email' => $user->email
     ],
     [
       'name' => $user->name,
       'password' => Hash::make($user->password),
     ]
     );
     Auth::login($user,true);
     return redirect('http://127.0.0.1:8000/#/');
   }
}
 