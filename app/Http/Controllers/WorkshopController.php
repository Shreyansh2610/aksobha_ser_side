<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class WorkshopController extends Controller
{
    public function workshopShow(Request $request,$id) {
        $workshop = Workshop::find($id);
        return response()->json(['html' => view('workshop_layouts.workshop_pages',compact(['workshop']))->render()]);
    }

    public function workshopFaq(Request $request,$id) {


        $workshop = Workshop::with(['faqs'=>function($q)use($request) {
            if($request->has('search')) {
                $q->whereAny(['question','answer'],'LIKE','%'.$request->query('search').'%');
            }
            $q->orderByDesc('day');
        }])->find($id);
        return response()->json(['html' => view('workshop_layouts.faq',compact(['workshop', 'request']))->render()]);
    }
}
