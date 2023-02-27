<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User_role;

class DashboardController extends Controller

{

    public function index()
    {
        $user = Auth::user();
        $role = User_role::where('user_id', $user->id)->get();
        foreach ($role as $user_role) ;
        if ($user_role->role != '') {
//role dashboard
            $data['role'] = $user_role->role;
            return Inertia::render('Dashboard/' . Ucfirst($user_role->role), $data);
        } else {
//page error
            return redirect()->intended('/');
        }
    }


}
