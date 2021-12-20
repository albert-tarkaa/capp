<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\category;
use App\entry;

use Illuminate\Support\Facades\DB;

class EntryController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entries = DB::table('entries')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->join('users', 'entries.user_id', '=', 'users.id')
            ->select('entry', 'amount', 'category','entries.category_type','name')
            ->orderBy('entries.created_at','desc')->paginate(5);
         return view('entries.create', compact('entries'));
    }

    public function getCategory($id) {
        $getCategory = category::where("category_type",'=',$id)->pluck("category","id");
       
        return json_encode($getCategory);
        //dd($getCategory());

    }

   public function store(Request $request)
    {
        try { 
            
            $this->validate($request,[
                'amount'=>'required',
                'category'=>'required',
                'type'=>'required',
                'entry'=>'required'
            ]);
    
            $entry = new entry;
            $entry->amount = $request->input('amount');
            $entry->entry = $request->input('entry');
            $entry->category_type = $request->input('category');
            $entry->category_id = $request->input('type');
            $entry->user_id = auth()->user()->id;
            
            
            $entry->save();
    
            return redirect(route('entries.create'))->with('success','Entry Added');

           } catch(\Illuminate\Database\QueryException $ex){ 
            dd($ex->getMessage());
             return redirect(route('entries.create'))->with('error','Entry already exists'); 
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
