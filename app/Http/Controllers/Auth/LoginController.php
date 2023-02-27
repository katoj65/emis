<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;



class LoginController extends Controller
{







    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Show the application's login form.
     *
     * @return \Inertia\Response
     */
    public function showLoginForm()
    {
if(Auth::check()){

return redirect('/dashboard');

}else{

    return view('login');
}

    }

// post login


public function loginPost(Request $request){
$validate=$request->validate(['email'=>'required','password'=>'required']);
if(!$validate){
}else{

//authentication
$credentials = $request->only('email', 'password');
if (Auth::attempt($credentials)) {
$userData=Auth::user();
if(Auth::check()){

return redirect('/home');

}else{
return redirect('/');

}
}else{
return redirect('/');
}


}

}









public function logout(Request $request)
{
//Auth::logout();


return Auth::user();



}




}








