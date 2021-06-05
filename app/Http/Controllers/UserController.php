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
            'old_password' => 'required',
            'password' => 'required|confirmed|min:8|different:old_password',
            'password_confirmation' => 'required',
        ]);
        if ($validator->fails()) {    
            return response()->json($validator->messages(), 422);
        }
        $old_password = $request->old_password;
        
        if(Hash::check($old_password, $current_password))
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
            'username' => 'required',
            'email'=> 'required'
        ]);
        
        $input = $request->all();
        return $user->update($input);
    }

    public function destroy($id)
    {
        return User::find($id)->delete();
    }
}
