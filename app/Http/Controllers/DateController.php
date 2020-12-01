<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DateRequest;
use Carbon\Carbon;

class DateController extends Controller
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
        $data = Date::with('doctor', 'patient')->get();
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
     * @return date
     */
    public function show($id)
    {
        return Date::findOrfail($id)->append('doctor_name', 'patient_name');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DateRequest $request
     * @return 
     */
    public function store(DateRequest $request)
    {
        $date = new Date();
        $date->fill($request->all());
        $date->save();

        return $date;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DateRequest $request
     * @param int $id
     * @return array
     */
    public function update(DateRequest $request, $id)
    {
        $date = Date::findOrfail($id);
        $date->fill($request->all());
        $date->save();
    
        return $date;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return date
     */
    public function destroy($id)
    {
        $date = Date::findOrfail($id);
        $date->delete();

        return $date;
    
    }

}
