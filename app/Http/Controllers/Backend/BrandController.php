<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::all();
        return view('backend.brand.index', compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
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
            $request->request->add(['created_by'=>auth()->user()->id]);
            $brand=Brand::create($request->all());
            if($brand){

                $request->session()->flash('success','Brand added successfuly');
            }else{
                $request->session()->flash('error','Brand addition failed');
            }
        }
        catch (\Exception $exception){
            $request->session()->flash('error','Error'.$exception->getMessage());
        }
        return redirect()->route('brand.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        return view('backend.brand.show',compact('brand'));
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
            $brand = Brand::find($id);
            if(!$brand)
            {
                request()->session()->flash('error','Error:Invalid Request');
                return redirect()->route('brand.index');
            }
        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view('backend.brand.edit',compact('brand'));
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
            $brand = Brand::find($id);
            request()->request->add(['updated_by'=>auth()->user()->id]);
            if(!$brand)
            {
                request()->session()->flash('error','Error:Invalid Request');
                return redirect()->route('brand.index');
            }
            if($brand->update($request->all()))
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
        return redirect()->route('brand.index');
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
            $brand = Brand::find($id);
            if($brand->delete())
            {
                request()->session()->flash('success','Brand Deleted Successfully!!');
            }
            else
            {
                request()->session()->flash('error','Brand Deleted Failed');
            }

        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return redirect()->route('brand.index');
    }
}
