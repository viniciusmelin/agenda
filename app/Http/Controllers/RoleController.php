<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Roles;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Roles::all();
        return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
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
            $role = new Roles($request->all());
            
            DB::beginTransaction();
            if($role->save())
            {
                \Session::flash('success',"Perfil cadastrado com sucesso");
                DB::commit();
                return redirect()->route('role.index');
            }
            DB::rollBack();
            \Session::flash('warning','Não foi possível cadastrar Perfil');
            return back()->withInput();  
        }
        catch(\Exception $ex)
        {
            dd($ex);
            DB::rollBack();
            \Session::flash('danger','Não foi possível cadastrar Perfil');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Roles::find($id);
        return view('role.edit',compact('role'));
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
            if(Roles::where('id',$id)->update($request->except('_token','_method')))
            {
                \Session::flash('success',"Paciente atualizado com sucesso");
                DB::commit();
                return redirect()->route('patient.index');
            }
            DB::rollBack();
            \Session::flash('warning','Não foi possível atualizar Paciente');
            return back()->withInput();  
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            \Session::flash('danger','Não foi possível atualizar Paciente');
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
            $patient = Roles::find($request->id);
            if(empty($patient))
            {
                return json_encode(['result'=>'error','msg'=>'Não foi encontrado nenhum registro!']);
            }
            if($patient->delete())
            {
                \Session::flash('flash_message',
                [ 
                    'msg'=>'Perfil excluído com sucesso!',
                    'class'=>'alert-success'
                ]);
                return json_encode(['result'=>'ok','action'=>'delete']);
            }
            else
            {
                \Session::flash('flash_message',
                [ 
                    'msg'=>'Não foi possível excluir Perfil!',
                    'class'=>'alert-danger'
                ]);
                return json_encode(['result'=>'error','msg'=>'Não foi possível excluir Perfil!']);
            }
        }
        catch(\Exception $e)
        {
            return json_encode(['result'=>'error','msg'=>$e]);
        }
    }
}
