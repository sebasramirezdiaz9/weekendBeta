<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DoctorRequest;
use App\Http\Requests\DoctorUpdateRequest;
use App\Http\Requests\PasswordRequest;
use App\Notifications\AccountConfirm;
use Carbon\Carbon;

class DoctorController extends Controller
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
        $data = Doctor::with('user')->get();
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
        return Doctor::find($id)->load('user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DoctorRequest $request
     * @return user
     */
    public function store(DoctorRequest $request)
    {
        $user = new User();
       
        $user->name = $request->user['name'];
        $user->email = $request->user['email'];
        $user->save();

        $doctor = new Doctor();
        
        $doctor->fill($request->doctor);
        $doctor->user_id = $user->id;
        $doctor->save();

        return $doctor;
    }

    /**
     * Search user after this compares if token receives by email matchs 
     * token from db user can update his password
     * @return user
     */
    public function confirm(Request $request)
    {
        $id = request()->get('id');
        $user= User::find($id);
        if($user->email_verified_at==null)
        {
            return view('email.confirmaccount',compact(
                'user'
            ));
        }
        else{
            Auth::loginUsingId($user->id);
            return redirect()->route('home'); 
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param DoctorUpdateRequest $request
     * @param int $id
     * @return array
     */
    public function update(DoctorUpdateRequest $request, $id)
    {
        $doctor = Doctor::findOrfail($id);
        $doctor->fill($request->doctor);
        $doctor->save();
    
        $user = User::findOrfail($doctor->user_id);
        $user->name = $request->user['name'];
        $user->save();
 
        return $doctor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return user
     */
    public function destroy($id)
    {
      
        $doctor = Doctor::findOrfail($id);
        $user = User::findOrfail($doctor->user_id);
        $user->delete();
        $doctor->delete();

        return $doctor;
    }
    public function resend($id)
    {
        $user = User::findOrfail($id);
        $user->notify(new AccountConfirm());
        return $user;
    }  
    public function validation(PasswordRequest $request)
    {
        $user = User::findOrfail($request->id);
        $user->password=bcrypt($request->password);
        $user->email_verified_at=Carbon::now();
        $user->save();
        Auth::loginUsingId($request->id);
        return redirect()->route('home');
        
    }
}
