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
        $workshops = Workshop::whereHas('payment',function($query){
            $query->where(['user_id'=>auth()->user()->id]);
        })->where('end_date','<',Carbon::now()->format('Y-m-d'))->get();
        $html = view('home_layouts.previous',compact('workshops'))->render();

        return response()->json(['html'=> $html],200);
    }
    public function currentWorkshop(Request $request) {
        $workshops = Workshop::whereHas('payment',function($query){
            $query->where(['user_id'=>auth()->user()->id]);
        })->where('start_date','<=',Carbon::now()->format('Y-m-d'))->where('end_date','>=',Carbon::now()->format('Y-m-d'))->get();
        $html = view('home_layouts.current',compact('workshops'))->render();
        // dd($workshops);
        return response()->json(['html'=> $html],200);
    }
    public function profile(Request $request) {
        $workshops = Workshop::whereHas('payment',function($query){
            $query->where(['user_id'=>auth()->user()->id]);
        })->where('end_time',Carbon::now())->get();
        $html = view('home_layouts.profile',compact('workshops'))->render();

        return response()->json(['html'=> $html],200);

    }
}
