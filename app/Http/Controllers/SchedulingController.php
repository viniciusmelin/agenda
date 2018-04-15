<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Scheduling;
use App\Patient;
use App\Doctor;
use Carbon\Carbon;

class SchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedulings = Scheduling::with('doctor','patient')->get();
       return view('scheduling.index',compact('schedulings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = Patient::where('active',1)->get();
        $doctors = Doctor::where('active',1)->get();
        $date = Carbon::now()->format('Y-m-d');
        return view('scheduling.create',compact('patients','doctors','date'));
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
           
            $scheduling = new Scheduling($request->all());
            
            DB::beginTransaction();
            if($scheduling->save())
            {
                \Session::flash('success',"Consulta cadastrada com sucesso");
                DB::commit();
                return redirect()->route('scheduling.index');
            }
            DB::rollBack();
            \Session::flash('warning','Não foi possível cadastrar Consulta');
            return back()->withInput();  
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            \Session::flash('danger','Não foi possível cadastrar Consulta');
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
        $scheduling = Scheduling::with('doctor','patient')->where('id',$id)->first();
        return view('scheduling.edit',compact('scheduling'));
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
            if(Scheduling::where('id',$id)->update($request->except('_token','_method')))
            {
                \Session::flash('success',"Consulta atualizado com sucesso!");
                DB::commit();
                return redirect()->route('scheduling.index');
            }
            DB::rollBack();
            \Session::flash('warning','Não foi possível atualizar Consulta!');
            return back()->withInput();  
        }
        catch(\Exception $ex)
        {
            DB::rollBack();
            \Session::flash('danger','Não foi possível atualizar Consulta!');
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
            $scheduling = Scheduling::find($request->id);
            if(empty($scheduling))
            {
                return json_encode(['result'=>'error','msg'=>'Não foi encontrado nenhum registro!']);
            }
            if($scheduling->delete())
            {
                \Session::flash('flash_message',
                [ 
                    'msg'=>'Consulta excluído com sucesso!',
                    'class'=>'alert-success'
                ]);
                return json_encode(['result'=>'ok','action'=>'delete']);
            }
            else
            {
                \Session::flash('flash_message',
                [ 
                    'msg'=>'Não foi possível excluir Consulta!',
                    'class'=>'alert-danger'
                ]);
                return json_encode(['result'=>'error','msg'=>'Não foi possível excluir Consulta!']);
            }
        }
        catch(\Exception $e)
        {
            return json_encode(['result'=>'error','msg'=>$e]);
        }
    }

    public function getJsonPatient(Request $request)
    {
         return json_encode(DB::table('patients')->where('name','like','%'.$request->search.'%')->where('active','=',1)->select('id','name')->get());
    }
    public function getJsonDoctor(Request $request)
    {
         return json_encode(DB::table('doctor')->where('name','like','%'.$request->search.'%')->where('active','=',1)->select('id','name')->get());
    }
}
