<?php

namespace App\Http\Controllers;
use App\Models\Provider;
use App\Http\Requests\ProviderRequest;

use Illuminate\Http\Request;

class ProviderController extends Controller
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
        $data = Provider::all();
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
     * @return provider
     */
    public function show($id)
    {
        return Provider::findOrfail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProviderRequest $request
     * @return 
     */
    public function store(ProviderRequest $request)
    {
        $provider = new Provider();
        $provider->fill($request->all());
        $provider->save();

        return $provider;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProviderRequest $request
     * @param int $id
     * @return array
     */
    public function update(ProviderRequest $request, $id)
    {
        $provider = Provider::findOrfail($id);
        $provider->fill($request->all());
        $provider->save();
    
       
 
        return $provider;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return provider
     */
    public function destroy($id)
    {
        $provider = Provider::findOrfail($id);
        $provider->delete();
     

        return $provider;
      
    }

    public function getAllPatients()
    {
        return Provider::all();
    }
}
