<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Category::all();
        return view('backend.category.index', compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            $category=Category::create($request->all());
            if($category){
                $request->session()->flash('success','Category added successfuly');
            }else{
                $request->session()->flash('error','Category addition failed');
            }
        }
        catch (\Exception $exception){
            $request->session()->flash('error','Error'.$exception->getMessage());
        }
        return redirect()->route('category.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.category.show',compact('category'));
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
            $category = Category::find($id);
            if(!$category)
            {
                request()->session()->flash('error','Error:Invalid Request');
                return redirect()->route('category.index');
            }
        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view('backend.category.edit',compact('category'));
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
            $category = Category::find($id);
            if(!$category)
            {
                request()->session()->flash('error','Error:Invalid Request');
                return redirect()->route('category.index');
            }
            if($category->update($request->all()))
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
        return redirect()->route('category.index');
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
            $category = Category::find($id);
            if($category->delete())
            {
                request()->session()->flash('success','category Deleted Successfully!!');
            }
            else
            {
                request()->session()->flash('error','category Deleted Failed');
            }

        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return redirect()->route('category.index');
    }
}
