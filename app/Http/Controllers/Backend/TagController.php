<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\backend\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //calling view file
        //$data = Employee::all(); //fetch all employee data
        //$data = Employee::where('phone','>',50)->get();//whose phone number is great than 50
        //$data = Employee::where('phone','>',50)->orderby('name')->get();//display by name order
        $data = tag::all();
        return view('backend.tag.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //calling create view
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store
        try{
           $tag=Tag::create($request->all());
           if($tag){
               $request->session()->flash('success','Tag added successfuly');
           }else{
               $request->session()->flash('error','Tag addition failed');
           }
        }
        catch (\Exception $exception){
            $request->session()->flash('error','Error'.$exception->getMessage());
        }
        return redirect()->route('tag.index');
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
    public function edit($tags_id)
    {
        try{
            $tag = Tag::find($tags_id);
            if(!$tag){
                request()->session()->flash('error','Error: Invalid Request');
                return redirect()->route('tag.index');
            }
        }catch(\Exception $exception){
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view('backend.tag.edit',compact('tag'));
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
        try{
            $tag = Employee::find($id);
            if(!$tag)
            {
                request()->session()->flash('error','Error: Invalid Request');
                return redirect()->route('employee.index');
            }
            if ($tag->update($request->all())){
                $request->session()->flash('success','Tag Updated Successfully!!');
            }else{
                $request->session()->flash('error','Tag Update Failed!!');
            }
        }catch(\Exception $exception){
            $request->session()->flash('error','Error: ' . $exception->getMessage());
        }
        return redirect()->route("tag.index");
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
