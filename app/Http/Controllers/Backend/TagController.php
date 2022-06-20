<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Tag;
use App\Models\User;
use function PHPUnit\Framework\returnValueMap;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['records'] = tag::all();
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
        $request->validate([
            'title'=>'required',
            'slug'=>'required'
        ]);
        $request->request->add(['created_by'=>auth()->user()->id]);
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
    function edit($id)
    {
        try{
            $userid = Tag::all();
            $data = Tag::find($id);
            if(!$data){
                request()->session()->flash('error','Error: Invalid Request');
                return redirect()->route('tag.index');

            }
        }catch(\Exception $exception){
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view('backend.tag.edit', compact('data','userid'));
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
            $data = Tag::find($id);
            if(!$data)
            {
                request()->session()->flash('error','Error: Invalid Request');
                return redirect()->route('tag.index');
            }
            if ($data->update($request->all())){
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
        $data['record']=Tag::find($id);
        if(!$data['record' ]){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route('tag.index');

        }
        if($data["record"]->delete())
        {
            request()->session()->flash('success',"Successfully Deleted");

        }else{
            request()->session()->flash('error',"Error:Delete Failed ");

        }
        return redirect()->route('tag.index');
    }
    public function trash()
    {
        $data['records'] = Tag::onlyTrashed()->get();
        return view('backend.tag.trash', compact('data'));


    }
    public function restore(Request $request, $id)
    {
        try {
            $data['record'] = Tag::onlyTrashed()->where('id', $id)->first();
            if (!$data['record']) {
                $data['record']->restore();
                request()->session()->flash('error', "Error:Invalid Request");
                return redirect()->route('tag.index');
            }
            /*$request->request->add(['updated_by'=>auth()->user()->id]);
            $record=$data['record']->update($request->all());*/
            if ($data['record']){
                $data['record']->restore();
            request()->session()->flash('success', "Tag Restored");
            }else{
                request()->session()->flash('error',"Tag Restore  Failed ");
            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());

        }

        return redirect()->route('tag.index');
    }
    public function permanentDelete($id)
    {
        $data['record']=Tag::onlyTrashed()->where('id',$id)->first();
        if(!$data['record' ]){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route('tag.index');

        }
        if($data["record"]->forceDelete())
        {
            request()->session()->flash('success',"Successfully Deleted");

        }else{
            request()->session()->flash('error',"Error:Delete Failed ");

        }
        return redirect()->route('tag.index');
    }
}

