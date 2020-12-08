<?php

namespace App\Http\Controllers;
use App\Models\Medicine;
use App\Http\Requests\MedicineRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    //
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
        $data = Medicine::all();
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
     * @return medicine
     */
    public function show($id)
    {
        return Medicine::findOrfail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MedicineRequest $request
     * @return 
     */
    public function store(MedicineRequest $request)
    {
        $medicine = new Medicine();
        $medicine->fill($request->all());
        $medicine->save();

        return $medicine;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MedicineRequest $request
     * @param int $id
     * @return array
     */
    public function update(MedicineRequest $request, $id)
    {
        $medicine = Medicine::findOrfail($id);
        $medicine->fill($request->all());
        $medicine->save();
    
       
 
        return $medicine;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return user
     */
    public function destroy($id)
    {
        $medicine = Medicine::findOrfail($id);
        $medicine->delete();

        return $medicine;
    
    }

    public function getAllMedicines()
    {
       $medicines = DB::select('select * from medicamento');
        return  collect($medicines);
    }   

}
