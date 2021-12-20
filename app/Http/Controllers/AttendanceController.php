<?php

namespace App\Http\Controllers;

use App\attendance;
use App\member;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $members = member::orderBy('surname')->get()->toArray();
        
        return view('attendance.attendance', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         try {
            $posts_date = $request->all()['date'];
            $posts = collect($request->all()['collection']);
            //$post_all = $posts->merge(['date' => $posts_date]);
            //$post_all->all();
           
            $filtered = $posts->where('attendance', "1");

            if (!(collect($filtered)->isEmpty())) {
                $posts_all = collect($request->all()['collection']);
                //$filtered1= $posts_all->merge(['date' => $posts_date]);
               

                foreach ($posts_all as $post=>$val) {
                $att = $val+array('date'=>$posts_date);
                $attend = new attendance;
                $attend->member_id = $att['id'];
                
                $attend->date = $att['date'];
               //dd($attend);
                $attend->save();
                }

                return redirect(route('dashboard'))->with('success','Attendance taken successfully');
            }
            
            else if (collect($filtered)->isEmpty()) {
                 return redirect(route('attendance.index'))->with('error','No user ticked');
            }
            
           } catch(\Illuminate\Database\QueryException $ex){ 
            // dd($ex->getMessage());
             return redirect(route('attendance.index'))->with('error','An error occurred'); 
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
         return view('attendance.show');

         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendance $attendance)
    {
        //
    }


    public function records(Request $request)
    {
         try { 
            
            $this->validate($request,[
                'date'=>'required'
                
            ]);
           
            //$post = new attendance;
            $post = $request->input('date');
            //dd($post);
            $entries = DB::table('attendances')
            ->join('members', 'attendances.id', '=', 'members.id')
            ->select('title', 'surname', 'firstname','middlename','email','date')
            ->where('attendances.date', $post)
            ->orderBy('surname','desc')->paginate(50);
             //   dd($entries[1]);

           return view('attendance.show', compact('entries','post'));
            
           } catch(\Illuminate\Database\QueryException $ex){ 
            // dd($ex->getMessage());
             return redirect(route('members.create'))->with('error','Enrollment failed'); 
           }
    }
}
