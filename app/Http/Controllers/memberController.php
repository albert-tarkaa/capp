<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\member;

class memberController extends Controller
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
        $members = member::orderBy('surname')->paginate(50);
        
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('members.create');
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
            
            $this->validate($request,[
                'email'=>'required',
                'surname'=>'required',
                'firstname'=>'required',
                'dob'=>'required',
                'phone'=>'required',
                'address'=>'required',
            ]);
    
            $post = new member;
            $post->title = $request->input('title');
            $post->surname = $request->input('surname');
            $post->firstname = $request->input('firstname');
            $post->middlename = $request->input('middlename');
            $post->DOB = $request->input('dob');
            $post->email = $request->input('email');
            $post->phone = $request->input('phone');
            $post->contactAddress = $request->input('address');
            
            $post->save();
    
            return redirect(route('members.create'))->with('success','Enrolled successfully');

           } catch(\Illuminate\Database\QueryException $ex){ 
            // dd($ex->getMessage());
             return redirect(route('members.create'))->with('error','Enrollment failed'); 
           }
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

 
}
