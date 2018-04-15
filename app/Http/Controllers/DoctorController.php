<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\DoctorRequest;
use App\Doctor;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        try
        {
            
            $doctor = new Doctor($request->all());
            DB::beginTransaction();
            if($doctor->save())
            {
                \Session::flash('success',"Paciente cadastrado com sucesso");
                DB::commit();
                return redirect()->route('doctor.index');
            }
            DB::rollBack();
            \Session::flash('warning','Não foi possível cadastrar Paciente');
            dd('fff');
            return back()->withInput();  
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            \Session::flash('danger','Não foi possível cadastrar Paciente');
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
        // $doctor = Doctor::find($id);
        // return view('doctor.edit',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $doctor = Doctor::find($id);
        return view('doctor.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, $id)
    {
        try
        {
            DB::beginTransaction();
            if(Doctor::where('id',$id)->update($request->except('_token','_method')))
            {
                \Session::flash('success',"Médico atualizado com sucesso");
                DB::commit();
                return redirect()->route('doctor.index');
            }
            DB::rollBack();
            \Session::flash('warning','Não foi possível atualizar Médico');
            return back()->withInput();  
        }
        catch(\Exception $ex)
        {
            
            DB::rollBack();
            \Session::flash('danger','Não foi possível atualizar Médico');
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
            $doctor = Doctor::find($request->id);
            if(empty($doctor))
            {
                return json_encode(['result'=>'error','msg'=>'Não foi encontrado nenhum registro!']);
            }
            if($doctor->delete())
            {

                return json_encode(['result'=>'ok','class'=>'success','msg'=>'Médico excluído com sucesso!']);
            }
            else
            {

                return json_encode(['result'=>'error','class'=>'error','msg'=>'Não foi possível excluir Médico!']);
            }
        }
        catch(\Exception $e)
        {
            return json_encode(['result'=>'error','class'=>'error','msg'=>$e]);
        }
    }
}
