<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Day;

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

    public function workshopCourse(Request $request,$id) {
        $workshop = Workshop::with(['days'=>function($q)use($request) {
            // if($request->has('search')) {
            //     $q->whereAny(['question','answer'],'LIKE','%'.$request->query('search').'%');
            // }
            $q->orderBy('day');
        }])->find($id);
        return response()->json(['html' => view('workshop_layouts.course',compact(['workshop', 'request']))->render()]);
    }

    public function workshopToday(Request $request,$id) {
        $workshop = Workshop::with(['today'=>function($q)use($request) {
            // if($request->has('search')) {
            //     $q->whereAny(['question','answer'],'LIKE','%'.$request->query('search').'%');
            // }
            $q->orderByDesc('day');
        }])->find($id);
        return response()->json(['html' => view('workshop_layouts.today',compact(['workshop', 'request']))->render()]);
    }

    public function workshopResources(Request $request,$id) {
        $workshop = Workshop::with(['resources'=>function($q)use($request) {
            if($request->has('search')) {
                $q->whereAny(['title','description','resource_link'],'LIKE','%'.$request->query('search').'%');
            }
            $q->orderBy('day');
        }])->find($id);

        // $days = Day::where('workshop_id',$id)->with(['resources'])->orderBy('day')->get();
        return response()->json(['html' => view('workshop_layouts.resources',compact(['workshop', 'request']))->render()]);
    }
}
