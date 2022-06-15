<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\SubCategory;
use App\Models\Backend\Category;



class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = SubCategory::all();
        return view('backend.subcategories.index', compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('backend.subcategories.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $subcategory=SubCategory::create($request->all());
            if($subcategory){
                $request->session()->flash('success','Subcategories added successfuly');
            }else{
                $request->session()->flash('error','Subcategories addition failed');
            }
        }
        catch (\Exception $exception){
            $request->session()->flash('error','Error'.$exception->getMessage());
        }
        return redirect()->route('subcategories.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = SubCategory::find($id);
        return view('backend.subcategories.show',compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $subcategory = SubCategory::find($id);
            if(!$subcategory)
            {
                request()->session()->flash('error','Error:Invalid Request');
                return redirect()->route('subcategories.index');
            }
        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view('backend.subcategories.edit',compact('subcategory'));
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
        try
        {
            $subcategory = SubCategory::find($id);
            if(!$subcategory)
            {
                request()->session()->flash('error','Error:Invalid Request');
                return redirect()->route('subcategories.index');
            }
            if($subcategory->update($request->all()))
            {
                request()->session()->flash('success','Updated');

            }else
            {
                request()->session()->flash('error','Updated failed');
            }

        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return redirect()->route('subcategories.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $subcategory = SubCategory::find($id);
            if($subcategory->delete())
            {
                request()->session()->flash('success','Subcategory Deleted Successfully!!');
            }
            else
            {
                request()->session()->flash('error','Subcategory Deleted Failed');
            }

        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return redirect()->route('subcategories.index');
    }
}
