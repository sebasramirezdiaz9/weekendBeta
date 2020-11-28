<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\PasswordRequest;
use App\Notifications\AccountConfirm;
use Carbon\Carbon;


class UserController extends Controller
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
        $data = User::all();
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
     * @return user
     */
    public function show($id)
    {
        return User::find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserStoreRequest $request
     * @return user
     */
    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->save();

        return $user;
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
     * @param UserRequest $request
     * @param int $id
     * @return array
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrfail($id);
        $user->fill($request->all());
        $user->save();
 
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return user
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        $user->delete();

        return $user;
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