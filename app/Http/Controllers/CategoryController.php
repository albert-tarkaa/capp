<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;

class CategoryController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
				$incomes = category::where('category_type','Income')->get();
				$expenditures = category::where('category_type','Expenditure')->get();

        return view('categories.create', compact('incomes', 'expenditures'));
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
                'name'=>'required',
                'category'=>'required'
            ]);
    
            $post = new Category;
            $post->category = $request->input('name');
            $post->category_type = $request->input('category');
            
            $post->save();
    
            return redirect(route('categories.create'))->with('success','Category Created');

           } catch(\Illuminate\Database\QueryException $ex){ 
             //dd($ex->getMessage());
             return redirect(route('categories.create'))->with('error','Category already exists'); 
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
        $post =  category::find($id);
        return view('categories.edit')->with('categories',$post);
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
        try { 
                $this->validate($request,[
                        'name'=>'required',
                        'category'=>'required'
                ]);

                $post = category::find($id);
                $post->category = $request->input('name');
                $post->category_type = $request->input('category');
                $post->save();

                return redirect(route('categories.create'))->with('success','Category updated');

                } catch(\Illuminate\Database\QueryException $ex){ 
                    //dd($ex->getMessage());
                    return redirect(route('categories.create'))->with('error','Category already exists'); 
                }
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
        $post =category::find($id);
        $post->delete();
        return redirect(route('categories.create'))->with('success','Category removed'); 
    }
}
