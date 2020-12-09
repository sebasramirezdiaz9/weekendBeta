<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use App\Http\Requests\FileRequest;

class FileController extends Controller
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
        $data = File::with('patient')->get();
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
     * @return file
     */
    public function show($id)
    {
        return File::findOrfail($id)->append('patient_name');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FileRequest $request
     * @return 
     */
    public function store(FileRequest $request)
    {
        $file = new File();
        $file->fill($request->all());
        $file->save();

        return $file;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FileRequest $request
     * @param int $id
     * @return array
     */
    public function update(FileRequest $request, $id)
    {
        $file= File::findOrfail($id);
        $file->fill($request->all());
        $file->save();
    
        return $file;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return date
     */
    public function destroy($id)
    {
        $file = File::findOrfail($id);
        $file->delete();
        
        return $file;
    
    }
}
