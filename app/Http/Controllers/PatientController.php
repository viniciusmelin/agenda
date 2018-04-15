<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Patient;
use App\Http\Requests\PatientRequest;
use Carbon\Carbon;


class PatientController extends Controller
{


    public function index()
    {
        $patients = Patient::all();
        return view('patient.index',compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = Carbon::now()->format('Y-m-d');
        return view('patient.create',compact('date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        try
        {
            $patient = new Patient($request->all());
            
            DB::beginTransaction();
            if($patient->save())
            {
                \Session::flash('success',"Paciente cadastrado com sucesso");
                DB::commit();
                return redirect()->route('patient.index');
            }
            DB::rollBack();
            \Session::flash('warning','Não foi possível cadastrar Paciente');
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
        $patient = Patient::find($id);
        return view('patient.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, $id)
    {
        try
        {

            DB::beginTransaction();
            if(Patient::where('id',$id)->update($request->except('_token','_method')))
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
            $patient = Patient::find($request->id);
            if(empty($patient))
            {
                return json_encode(['result'=>'error','msg'=>'Não foi encontrado nenhum registro!']);
            }
            if($patient->delete())
            {
                \Session::flash('flash_message',
                [ 
                    'msg'=>'Paciente excluído com sucesso!',
                    'class'=>'alert-success'
                ]);
                return json_encode(['result'=>'ok','action'=>'delete']);
            }
            else
            {
                \Session::flash('flash_message',
                [ 
                    'msg'=>'Não foi possível excluir Paciente!',
                    'class'=>'alert-danger'
                ]);
                return json_encode(['result'=>'error','msg'=>'Não foi possível excluir Paciente!']);
            }
        }
        catch(\Exception $e)
        {
            return json_encode(['result'=>'error','msg'=>$e]);
        }
    }
}
