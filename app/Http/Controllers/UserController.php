<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Orders;
use Auth;
use Carbon\Carbon;
use Validator;
use Hash;
use Illuminate\Support\Str;
use DB;
class UserController extends Controller
{
    public function info($id){
        return User::where('id',$id)->get();
    }

    public function index()
    {
        $users = DB::table('users')->get();

        foreach ($users as $key => $user) {
            $date = Carbon::create($user->created_at);
            $today = Carbon::now();
            $diffDay = $today->diffInDays($date);
            $user->lastPeriod = $diffDay == 0 ? 1 : ceil($diffDay/30);
        }

        return $users;
    }

    public function login(Request $request)
    {   
        $phonemask = '998';
        $credentials = $request->validate(['phone' => 'required',   'password' => 'required']);
        $addCodePhone = [];
        array_push($addCodePhone,array("phone"=>$phonemask.$credentials['phone'],"password"=>$credentials['password']));

        if (!$this->guard()->attempt($addCodePhone[0])) {
            return response()->json(['message' => 'Parol yoki login xato!'], 299);
        }

        $user = $this->guard()->user();
        $whoIs = $user->role == 1? 'admin' : 'user';

        $token = $user->createToken('user', [$whoIs])->plainTextToken;
        return response()->json(['token' => $token,'type' => 'Bearer'], 200);
    }


    public function register(Request $res)
    {
        $promo_code = bin2hex(random_bytes(2));

        $validate = Validator::make($res->all(),[
            'passport' => 'required|unique:users',
            'password' => 'required|min:6|max:255|confirmed',
        ],$messages = [
            'required' => ":attribute bo'sh bo'lmasligi kerak.",
            'unique' => ":attribute band.",
            'min' => ":attribute :min simboldan kam bo'lmasligi kerak.",
            'passport' => ":attribute to'gri emas",
            'confirmed' => ":attributelar mos kelmayabdi"
        ],[
            'passport' => "passport",
            'password' => 'Parol'
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(),299);
        }
        

        $parent = User::where('promo_code', $res['code'])->first();
        $phonemask = '998';
        $user = User::create([
            'parent_id' => $parent ? $parent->id : null,
            'fname' => $res['fname'],
            'lname' => $res['lname'],
            'passport' => $res['passport'],
            'phone' => $phonemask.$res['phone'],
            'promo_code' => $promo_code,
            'code' => $res['code'],
            'password' => Hash::make($res['password']),
        ]);

        return response()->json([
            'status' => 200,
            'message' => "User muvafaqiyatli qo'shildi",
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        $this->guard()->logout();
        
        return response()->json([
            'message' => 'logout',
        ], 200);
    }

    public function guard($guard = 'web')
    {
        return Auth::guard($guard);
    }


    public function getUser(Request $req){
        $user = $req->user();
        $date = Carbon::create($user->created_at);
        $today = Carbon::now();
        $diffDay = $today->diffInDays($date);
        $user->lastPeriod = $diffDay == 0 ? 1 : ceil($diffDay/30);
        return $user;
    }
    public function getParent($id){
        
        return User::where('promo_code',$id)->get();
    }
    // public function passwordReset(Request $req){
    //     $user = Auth::user();
    
    //     $validate = Validator::make($req->all(),[
    //         'old' => 'required',
    //         'new' => 'required|min:6|max:255|confirmed',
    //     ],$messages = [
    //         'required' => ":attribute bo'sh bo'lmasligi kerak.",
    //         'min' => ":attribute :min simboldan kam bo'lmasligi kerak.",
    //         'confirmed' => ":attributelar mos kelmayabdi"
    //     ],['new' => 'Parol']);
        
    //     if (Hash::check($req->old, $user->password) == false) {
    //         return response()->json(['message' => "hozirgi parol to'gri emas"], 200);
    //     }

    //     if($validate->fails()){
    //         return response()->json($validate->messages(),299);
    //     }

    //     $user->password = Hash::make($req->new);
        
    //     return $user->save();
    // }


    public function logoutUser(Request $req){
        $user = $req->user();

        return $user->tokens()->where([
            ['tokenable_id', $user->id],
            ['id', $req->id],
        ])->delete();
    }


    
}

