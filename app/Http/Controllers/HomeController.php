<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function previousWorkshop(Request $request) {
        $workshop = Workshop::whereHas('payment',function($query){
            $query->where(['user_id'=>auth()->user()->id]);
        })->where('end_time',Carbon::now())->get();
        dd($workshop);
    }
}
