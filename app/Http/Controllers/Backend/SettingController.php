<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Setting;
use Illuminate\Http\Request;

class SettingController extends BackendBackendBaseController
{
    protected $base_route = 'backend.setting.';
    protected $base_view = 'backend.setting.';
    protected $module = 'Setting';

    public function __construct()
    {
        $this->model = new Setting();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $data['records'] = $this->model->find(1);
            if(!$data['records'])
            {
                request()->session()->flash('error','Error:Invalid Request');
                return redirect()->route($this->__loadDataToView($this->base_route.'index'));
            }
        }
        catch(Exception $exception)
        {
            request()->session()->flash('error','Error:'.$exception->getMessage());
        }
        return view($this->__loadDataToView($this->base_view.'index'),compact('data'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);
        try{

            $attribute=$this->model->create($request->all());
            if($attribute){
                $request->session()->flash('success','Product added successfuly');
            }else{
                $request->session()->flash('error','Product addition failed');
            }
        }
        catch (\Exception $exception){
            $request->session()->flash('error','Error'.$exception->getMessage());
        }
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
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
                $request->session()->flash('success',' Product Updated Successfully!!');
            }else{
                $request->session()->flash('error','Product Update Failed!!');
            }
        }catch(\Exception $exception){
            $request->session()->flash('error','Error: ' . $exception->getMessage());
        }
        return redirect()->route($this->__loadDataToView($this->base_route.'index'));
    }

}
