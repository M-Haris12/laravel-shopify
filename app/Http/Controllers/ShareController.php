<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Share;
use App\Shshop;
use App\Product;
use ShopifyApp;
use DB;
class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::paginate(3);
       
        return view('shares.index', compact('shares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
     
        return view('shares.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /*  $request->validate([
            'share_name'=>'required',
            'share_price'=> 'required|integer',
            'share_qty' => 'required|integer'
          ]); */
          $share = new Share([
            'share_name' => 'haris',
            'share_price'=> '2000',
            'share_qty'=> '50'
          ]);
          $share->save();
          return redirect('/shares')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shares = Share::all();

        return view('shares.index', compact('shares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $share = Share::find($id)->paginate(3);

        return view('shares.edit', compact('share'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'share_name'=>'required',
            'share_price'=> 'required|integer',
            'share_qty' => 'required|integer'
          ]);
    
          $share = Share::find($id);
          $share->share_name = $request->get('share_name');
          $share->share_price = $request->get('share_price');
          $share->share_qty = $request->get('share_qty');
          $share->save();
    
          return redirect('/shares')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share = Share::find($id);
        $share->delete();
   
        return redirect('/shares')->with('success', 'Stock has been deleted Successfully');
    }


   /*
     create webhook and verify it from shopify
   public function createProduct(Request $request)
    {
      $dat = file_get_contents('php://input');
      $calculated_hmac = base64_encode(hash_hmac('sha256', $dat, '46d14f99bb8d72dcaddb9ee8c5d25dc591c4a65574d0d3c36f9f17a412aac6e6', true));
       
              
      $data=  (object) $request->json()->all();
      if ( $calculated_hmac == $request->header( 'X-Shopify-Hmac-Sha256') ) {
        $share = new Share([
        'share_name' =>$request->header('X-Shopify-Shop-Domain'),
        'share_price'=> '2000',
        'share_qty'=> '50'
      ]);
      $share->save();
        }
      return   response('helow world',200);
      
    } */
    public function createProduct(Request $request)
    {
     // $dat = file_get_contents('php://input');
      // $calculated_hmac = base64_encode(hash_hmac('sha256', $dat, '46d14f99bb8d72dcaddb9ee8c5d25dc591c4a65574d0d3c36f9f17a412aac6e6', true));
       
     /*  $shop = ShopifyApp::shop();    
      $request = $shop->api()->rest('GET', '/admin/shop.json');
      $shop_id= $request->body->shop->id;     */
      $shop = DB::table('shshops')->where('shop_name', $request->header('X-Shopify-Shop-Domain'))->first();

      $shop_id=$shop->shop_id;
      $data=  (object) $request->json()->all();

     
       $product = new Product([    
        'sh_id' => $shop_id,
        'product_json'=> json_encode($data)
    ]);
      $product->save();
        
      return   response('helow world',200);
      
    }

    public function deleteProduct(Request $request)
    {
         
      $shop = DB::table('shshops')->where('shop_name', $request->header('X-Shopify-Shop-Domain'))->first();

      $shop_id=$shop->shop_id;
      
      $data=  (object) $request->json()->all();
      $product_id=$data->id;
     
      $users = DB::delete("DELETE from products  where product_json->> '$.id'= ?  And  sh_id= ? ",[$product_id,$shop_id]);
      return   response('helow world',200);
      
    } 
    public function updateProduct(Request $request)
    {
      $shop = DB::table('shshops')->where('shop_name', $request->header('X-Shopify-Shop-Domain'))->first();

      $shop_id=$shop->shop_id;
      
      $data=  (object) $request->json()->all();
      $product_id=$data->id;
      $data=json_encode($data);
      $users = DB::update("UPDATE products set product_json= ? where product_json->> '$.id'= ?  And  sh_id= ? ",[$data,$product_id,$shop_id]);
       

      return   response('helow world',200);
      
    }


  

}
