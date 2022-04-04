<?php
namespace App\Http\Controllers\API;
//use App\Message;
use App\Http\Controllers\API\BaseController as Controller;
use Illuminate\Http\Request;


use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{

    public function indexall()
    {
        //$projets = User::all();
        //var_dump($projets);
       return User::all();
    }
    /////////////////////////////////////////////
    public function hesAfterUpdate($id)
 {
     $Customer = User::find($id);
    return response()->json($Customer->toArray());
 }
    ////////////////////////////////////////////////////
    public function index()
 {
   return ["name"=>"amine"];
 }
 ////////////////////////////////////////////////////////////////////
 public function register(Request $request)
    {
        //$input = $request->all();
        $validator =
        Validator::make($request->all(),
    [   
        
        'username'=>'required|max:10',
        'password'=>'required|confirmed',
        'email'=>'required|email|max:255',
    ]
    );

    User::create([
        
        'username' =>$request->username,
        'email' =>$request->email,
        'password' =>Hash::make($request->password),
    ]);
    auth()->attempt($request->only('email','password'));
    return redirect()->route('dashbord');
    
    if($validator->fails()){
    return response()->json($validator->errors());
        }
       
    
    }
    public function login($email,$password){
        
        return User::where([
            'email' =>$email,
            'password' => $password
        ])->get();
       
            
    }/*
        $User = new User();
        $User->username=$input['username'];
        $User->password=Hash::make($input['password']);
        $User->email=$input['email'];
        $User->isConnected=0;
        $User->isAdmin=0;
        $User->save();
        return  response()->json($User->toArray());
    */
    //////////////////////////////////////////////////////////////
   /* public function updatePasswClient(Request $request,$id)
    {

        $input = $request->all();
        $validator =
        Validator::make($input,
    [
        'password'=>'required',
    ]
    );

    if($validator->fails()){
        return response()->json($validator->errors());
        }
        $customer=Customer::find($id);
        $customer->password=bcrypt($input['password']);
        $customer->paschange=1;
        $customer->save();
        return response()->json($client->toArray());
    }*/

}