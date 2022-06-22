<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;

class CategoryController extends BackendBackendBaseController
{
    protected $base_route = 'backend.category.';
    protected $base_view = 'backend.category.';
    protected $module = 'Category';

    public function __construct()
    {
        $this->model = new Category();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['records'] = $this->model->all();
        return view($this->__loadDataToView($this->base_view.'index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //calling create view

        return view($this->__loadDataToView($this->base_view.'create'));
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
            'title'=>'required'
        ]);
        $request->request->add(['created_by'=>auth()->user()->id]);
        //store
        try{
            $tag=$this->model->create($request->all());
            if($tag){
                $request->session()->flash('success','Category added successfuly');
            }else{
                $request->session()->flash('error','Category addition failed');
            }
        }
        catch (\Exception $exception){
            $request->session()->flash('error','Error'.$exception->getMessage());
        }
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
       $data['records'] = $this->model->find($id);
        if(!$data['records']){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route($this->__loadDataToView($this->base_route.'index'));

        }
        return view($this->__loadDataToView($this->base_view.'show'),compact('data'));
    }*/
    public function show($id)
    {
        $data = $this->model->find($id);
        return view($this->__loadDataToView($this->base_view.'show'),compact('data'));
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
            $userid = $this->model->all();
            $data['records'] = $this->model->find($id);
            if(!$data){
                request()->session()->flash('error','Error: Invalid Request');
                request()->request->add(['updated_by'=>auth()->user()->id]);
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));

            }
        }catch(\Exception $exception){
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view($this->__loadDataToView($this->base_view.'edit'), compact('data','userid'));
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
            $data = $this->model->find($id);
            if(!$data)
            {
                request()->session()->flash('error','Error: Invalid Request');
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));
            }
            if ($data->update($request->all())){
                $request->session()->flash('success','Category Updated Successfully!!');
            }else{
                $request->session()->flash('error','Category Update Failed!!');
            }
        }catch(\Exception $exception){
            $request->session()->flash('error','Error: ' . $exception->getMessage());
        }
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['record']=$this->model->find($id);
        if(!$data['record' ]){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route($this->__loadDataToView($this->base_route.'index'));

        }
        if($data["record"]->delete())
        {
            request()->session()->flash('success',"Successfully Deleted");

        }else{
            request()->session()->flash('error',"Error:Delete Failed ");

        }
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }
    public function trash()
    {
        $data['records'] = $this->model->onlyTrashed()->get();
        return view($this->__loadDataToView($this->base_view.'trash'), compact('data'));


    }
    public function restore(Request $request, $id)
    {
        try {
            $data['record'] = $this->model->onlyTrashed()->where('id', $id)->first();
            if (!$data['record']) {
                $data['record']->restore();
                request()->session()->flash('error', "Error:Invalid Request");
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));
            }
            /*$request->request->add(['updated_by'=>auth()->user()->id]);
            $record=$data['record']->update($request->all());*/
            if ($data['record']){
                $data['record']->restore();
                request()->session()->flash('success', "Category Restored");
            }else{
                request()->session()->flash('error',"Category Restore  Failed ");
            }
        }
        catch(\Exception $exception){
            request()->session()->flash('error',"Error:".$exception->getMessage());

        }

        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }
    public function permanentDelete($id)
    {
        $data['record']=$this->model->onlyTrashed()->where('id',$id)->first();
        if(!$data['record']){
            request()->session()->flash('error',"Error:Invalid Request");
            return redirect()->route($this->__loadDataToView($this->base_route.'index'));
        }
        if($data["record"]->forceDelete())
        {
            request()->session()->flash('success',"Successfully Deleted");

        }else{
            request()->session()->flash('error',"Error:Delete Failed ");

        }
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }
}
