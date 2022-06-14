<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Atttribute;

class AtttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Atttribute::all();
        return view('backend.attribute.index', compact('data'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.attribute.create');
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
            $attribute=Atttribute::create($request->all());
            if($attribute){
                $request->session()->flash('success','Attribute added successfuly');
            }else{
                $request->session()->flash('error','Attribute addition failed');
            }
        }
        catch (\Exception $exception){
            $request->session()->flash('error','Error'.$exception->getMessage());
        }
        return redirect()->route('attribute.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribute = Atttribute::find($id);
        return view('backend.attribute.show',compact('attribute'));
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
            $attribute = Atttribute::find($id);
            if(!$attribute)
            {
                request()->session()->flash('error','Error:Invalid Request');
                return redirect()->route('attribute.index');
            }
        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view('backend.attribute.edit',compact('attribute'));
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
            $attribute = Atttribute::find($id);
            if(!$attribute)
            {
                request()->session()->flash('error','Error:Invalid Request');
                return redirect()->route('attribute.index');
            }
            if($attribute->update($request->all()))
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
        return redirect()->route('attribute.index');
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
            $attribute = Atttribute::find($id);
            if($attribute->delete())
            {
                request()->session()->flash('success','Attribute Deleted Successfully!!');
            }
            else
            {
                request()->session()->flash('error','Attribute Deleted Failed');
            }

        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return redirect()->route('attribute.index');
    }
}
