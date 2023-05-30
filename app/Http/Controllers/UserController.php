<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function viewRegister(){
        return view('user.register');
    }
    public function viewLogin(){
        return view('user.login');
    }
    public function viewHome(){
        return view('home.home');
    }
    public function viewGoolge(){
        return Socialite::driver('google')->redirect();
    }
    public function viewUser(){
        $users = User::all();
        return view('home.users',['users'=>$users]);
    }


    public function viewGoogleCallback(){
        $user = Socialite::driver('google')->user();


        $userExists = User::where('external_id',$user->id)->first();

        if($userExists){
            Auth::login($userExists);
        }else{

            $userNew =   User::create([
                'fullname' => $user->name,
                'email'=>$user->email,
                'avatar' => $user->avatar,
                'external_id' =>$user->id,
                'external_auth' => 'google',
                'img'=> $user['picture']
            ]);
            Auth::login($userNew);

        }

        return redirect()->route('viewHeader');
    }

    public function userRegister(Request $request){
        $fecha = Carbon::now('America/Lima')->format('Y-m-d H:i:s');

            $image = $request->file('img');
            $imgName = time().'-'.$image->getClientOriginalName();
            $path = 'img/'.$imgName;
            $image->move(public_path('img'), $path);

            $user = User::create([
                'fullname' => $request->fullname,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'time' => $fecha,
                'img' => $path

              ]);

          Mail::to($user->email)->send(new VerifyEmail($user));

         return redirect()->route('viewLogin');
    }

    public function userLogin(Request $request){

         $credencials = $request->only(['email','password']);
         $auth = Auth::attempt($credencials);
         if($auth){
            return redirect()->route('viewHeader');
        }else{
            return redirect()->route('viewHeader')->with('msg','Las Credenciales no son Validas');

        }

    }
    public function deleteUser(Request $request ){
      $id = $request->id;
      $user = User::find($id)->delete();
      return redirect()->back();
    }
    public function editUser(Request $request){
        $id = $request->id_edit;
        $user = User::where('id', $id)->first();

        return view('home.editUser',['user'=>$user]);
    }
    public function updateUser(Request $request){
        $id =$request->id;
        $user = User::where('id', $id)->update([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        return redirect()->route('viewUser');
    }
    public function userLogout(){
        Auth::logout();
        return redirect('/login');
    }



}
