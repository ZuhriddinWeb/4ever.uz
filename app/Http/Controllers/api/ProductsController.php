<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use App\Models\Products;
use Ixudra\Curl\Facades\Curl;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {


        $data=DB::table('products')    
        // ->join('categories','products.category_id','=','categories.id')
        ->join('trees','products.tree_id','=','trees.id')
        ->where('products.tree_id','=',$id)
        ->get();
        return $data;
    }
    public function index_tree_cat(Request $request,$cat_id,$tree_id)
    {
        return Products::all();
    }

    
    public function index_id($id)
    {
        return Products::where('id',$id)->get();
    }
    public function index_UZS()
    {
        $response = Curl::to('https://cbu.uz/uz/arkhiv-kursov-valyut/json/USD/')
        ->get();
        $usd = json_decode($response, true);
        return $usd;
    }

    public function limit(Request $request)
    {
        // $response = Curl::to('https://cbu.uz/uz/arkhiv-kursov-valyut/json/USD/')
        // ->get();
        // $usd = json_decode($response, true);
        // dd($usd[0]['Rate']*10);
        // $data= DB::table('products')
        // ->join('categories','products.category_id','=','categories.id')
        // ->orderByRaw('products.updated_at - products.created_at DESC')
        // ->take(10)
        // ->select('categories.id as cid','categories.category_name','categories.category_image','products.*')    
        // ->get();
        // return $data;
        return Products::orderByRaw('products.updated_at - products.created_at DESC')->take(5)->get();

    }
    public function limit_category($id)
    {
        
        // $data=DB::table('products')
        // // ->join('categories','products.category_id','=','categories.id')
        // // ->orderByRaw('products.updated_at - products.created_at DESC')
        // ->where('products.category_id','=',$id)
        // ->take(5)
        // // ->select('categories.id as cid','categories.category_name','products.*')    
        // ->get();
        // return $data;
        return Products::where('category_id',$id)->take(5)->get();
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
        // dd($request);
        $data = new Products();   
        $images = $request->images;
        $array_image=[];
        // $array_image;           


        for($i=0;$i<count($images);$i++){
            $imageName = time().$i.'.'.$images[$i]->extension(); 
            $images[$i]->move(public_path('images'), $imageName);
            $array_image=$imageName;
            // array_push($array_image,$imageName);
        }

        $unique = (string) Str::uuid();
        $data->product_id = $unique;
        $data->category_id = $request->input('category_id');
        $data->tree_id = $request->input('tree_id');
        $data->product_name = $request->input('product_name');
        $data->flavor = $request->input('flavor');
        $data->description_product = $request->input('product_descr');       
        $data->instruction_product = $request->input('product_instr');       
        $data->price = $request->input('product_price');
        $data->volume = $request->input('volume');       
        $data->count_products = $request->input('product_count'); 
        $data->images_product = $array_image; 

        $data->save();
        return response()->json([
            'status' => 200,
            'message' => "Mahsulot muvafaqiyatli qo'shildi",
        ]);
    }
    public function delete(Request $request)
    {
        $data = DB::table('products')->where('product_id',$request['id'])->delete();
        return response()->json([
            'status' => 200,
            'message' => "Mahsulot muvafaqiyatli o'chirildi",
        ]);
    }
    public function update(Request $request)
    {
        $data = new Products();    
       
        $data = DB::table('products')
            ->where('product_id', $request['product_id'])
            ->update(['product_name' => $request['product_name'],'description_product'=>$request['product_descr'],'instruction_product'=>$request['product_instr'],
            'price'=>$request['product_price'],'volume'=>$request['volume'],'count_products'=>$request['product_count']]);
        return response()->json([
            'status' => 200,
            'message' => "Protocol muvafaqiyatli Yangilandi",
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
