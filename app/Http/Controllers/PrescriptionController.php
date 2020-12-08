<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PrescriptionRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Prescription;
use Carbon\Carbon;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class PrescriptionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = request()->get('query', false);
        $ascending =request()->get('ascending',1);
        $limit = request()->get('limit', false);
        $page = request()->get('page', false);
        $data = DB::select('select a.id as id, b.name as doctor, c.name as paciente, d.nombre as estado from recetas_medicas a, doctores b, pacientes c, estado_receta d where d.id = a.estado_receta_id and c.id = a.paciente_id and b.id = a.doctor_id and a.doctor_id = ?', [Auth::user()->doctor->id]);     
        $data = collect($data);

        if ($limit&&$query)
            foreach (json_decode($query, true) as $column => $value)
                if ($value !== "") {

                    $data = $data->filter(function ($news) use ($column, $value) {
                        return strpos(strtolower($news->$column), strtolower($value)) !== false;
                    });

                }
       
        $count = $data->count();
        $data = $data->slice(($page - 1) * $limit)->take($limit)->values();
        return compact('data', 'count');
       
    }


      /**
     * 
     * @return dcotor
     */
    public function show($id)
    {
        return Patients::findOrfail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PrescriptionRequest $request
     * @return 
     */
    public function store(PrescriptionRequest $request)
    {
        DB::insert('insert into recetas_medicas (doctor_id, paciente_id, estado_receta_id, created_at, updated_at) 
        values (?, ?, ?, ?, ?)', [Auth::user()->doctor->id, $request->paciente_id, 1, Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')  ]);

        $precription = DB::table('recetas_medicas')->orderBy('created_at', 'desc')->first();
        foreach($request->medicines as $medicine)
        {
            DB::insert('insert into medicamento_receta_medica (receta_medica_id, medicamento_id, instrucciones, created_at, updated_at) 
            values (?, ?, ?, ?, ?)', [$precription->id, $medicine['medicine_id'], $medicine['instructions'], Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')  ]);
    
        }
        return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return user
     */
    public function destroy($id)
    {
        $deleted = DB::delete('delete from recetas_medicas where id = ?', [$id]);
      
    }

    public function getAllPatients()
    {
        return Patients::all();
    }

    public function downloadPdf($id)
    {
        $prescription = DB::select('select b.name as doctor, c.name as paciente, d.nombre as estado from recetas_medicas a, doctores b, pacientes c, estado_receta d where d.id = a.estado_receta_id and c.id = a.paciente_id and b.id = a.doctor_id and a.id = ?', [$id]);     
        //$medicines = DB::select('select a.name as doctor, c.name as paciente, d.nombre as estado from recetas_medicas a, doctores b, pacientes c, estado_receta d where d.id = a.estado_receta_id and c.id = a.paciente_id and b.id = a.doctor_id and a.id = ?', [$id]);     
        $pdf = PDF::loadView('system.prescriptions.prescription-pdf',  ['prescription' => $prescription, 'medicines' => $medicines]);
        return $pdf->download('receta_medica.pdf');
       
    }

}
