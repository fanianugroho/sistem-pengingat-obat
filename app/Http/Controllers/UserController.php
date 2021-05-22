<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Validator;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $data = User::all();
        return $data; 
    }
    public function indexPassword()
    {
        return view('user.ubahPassword');
    }
    public function ubahPassword(Request $request){
        $request_data = $request->all();
        $current_password = Auth::user()->password;
        $validator = Validator::make($request->all(), [
            'kata_sandi_lama' => 'required',
            'password' => 'required|confirmed|min:8|different:kata_sandi_lama',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 422);
        }
        $kata_sandi_lama = $request->kata_sandi_lama;
        
        if(Hash::check($kata_sandi_lama, $current_password))
        {           
            $user_id = Auth::user()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request->password);
            $obj_user->save(); 
            return response()->json([
                'status' => 'Success',
                'message' => 'Password Berhasil diubah'
           ]);
        }else {
            return response()->json([
                'status' => 'Error',
                'message' => 'Password lama anda tidak sesuai'
            ]);

        }
    }
    public function index()
    {
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|min:5|unique:users,username,',
            'tipe_user' => 'required',
            'email' => 'required|email|unique:users,email,',
            'password' => 'required|nullable|min:5',
        ]);
        
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        return User::create($input);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'tipe_user' => 'required',
        ]);
        
        $input = $request->all();
        return $user->update($input);
    }

    public function destroy($id)
    {
        return User::find($id)->delete();
    }
}
