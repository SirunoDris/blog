<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Pio;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Delete User
     *
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect(route('dashboard.index'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user());
        if(Auth::user()->role_id == 2){
            return view('dashboard',[
                'pios'=> Pio::with('user')->latest()->get(),
            ]); 
        }else{
           return view('dashboardadmin',[
            'pios'=> Pio::with('user')->latest()->get(),
            'users'=>User::all(),
        ]); 
        }
        
    }
    
}
