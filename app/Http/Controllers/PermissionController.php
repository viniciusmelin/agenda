<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permissions;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permissions::all();
        return view('permission.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create',compact('date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $permission = new Permissions($request->all());
            
            DB::beginTransaction();
            if($permission->save())
            {
                \Session::flash('success',"Permissão cadastrado com sucesso");
                DB::commit();
                return redirect()->route('permission.index');
            }
            DB::rollBack();
            \Session::flash('warning','Não foi possível cadastrar Permissão');
            return back()->withInput();  
        }
        catch(\Exception $ex)
        {
            dd($ex);
            DB::rollBack();
            \Session::flash('danger','Não foi possível cadastrar Permissão');
            return back()->withInput();
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
        $permissions = Permissions::find($id);
        return view('permission.edit',compact('permissions'));
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

            DB::beginTransaction();
            if(Permissions::where('id',$id)->update($request->except('_token','_method')))
            {
                \Session::flash('success',"Permissão atualizado com sucesso");
                DB::commit();
                return redirect()->route('permission.index');
            }
            DB::rollBack();
            \Session::flash('warning','Não foi possível atualizar Permissão');
            return back()->withInput();  
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            \Session::flash('danger','Não foi possível atualizar Permissão');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try
        {
            $permission = Permissions::find($request->id);
            if(empty($permission))
            {
                return json_encode(['result'=>'error','msg'=>'Não foi encontrado nenhum registro!']);
            }
            if($permission->delete())
            {
                \Session::flash('flash_message',
                [ 
                    'msg'=>'Permissão excluído com sucesso!',
                    'class'=>'alert-success'
                ]);
                return json_encode(['result'=>'ok','action'=>'delete']);
            }
            else
            {
                \Session::flash('flash_message',
                [ 
                    'msg'=>'Não foi possível excluir Permissão!',
                    'class'=>'alert-danger'
                ]);
                return json_encode(['result'=>'error','msg'=>'Não foi possível excluir Permissão!']);
            }
        }
        catch(\Exception $e)
        {
            return json_encode(['result'=>'error','msg'=>$e]);
        }
    }
}
