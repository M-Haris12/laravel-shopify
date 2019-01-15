<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ShopifyApp;
use App\Share;
use App\Shshop;
use App\Product;
use DB;
use Config;

class CustomController extends Controller
{
    //

    public function index(){
        return 'render';
    }
    public function CreateAsset(){
        
    
        //Get shop details and check if shop exists in our db     
        $shop = ShopifyApp::shop();
        $request = $shop->api()->rest('GET', '/admin/shop.json');
        $shop_id=$request->body->shop->id;
        $shop_name=$request->body->shop->domain;
        $result=Shshop::where('shop_name',$shop_name)->get();
        if($result->count()){
            dd("Your shop is synced with our app");
        }
        else{
            //First step to get shop details and get all products of storefront and store them in db
                
                $shshop=new Shshop([
                'shop_id'   => $shop_id,
                'shop_name' => $shop_name
                ]);
                $shshop->save();
                $request = $shop->api()->rest('GET', '/admin/products.json');
                $products=$request->body->products;
                
                foreach($products as $pro){
                    unset($pro->body_html);
                    $product = new Product([    
                        'sh_id' => $shop_id,
                        'product_json'=> json_encode($pro)
                    ]);
                    $product->save();
            
                }
            //webhooks api data  and webhook creation  
                $data_hooks= Config::get('shopify-apI-data.data_hooks');
                foreach($data_hooks as $hook){
                    $request = $shop->api()->rest('POST', '/admin/webhooks.json',$hook);    
                }   
            //asset api data for post from config file
                $data_asset= Config::get('shopify-apI-data.data_asset');
             
            
            //Get Theme id of publish theme on storefront
                $request = $shop->api()->rest('GET', '/admin/themes.json');
                $themes=$request->body->themes;
                $theme_id='';
                foreach($themes as $theme){
                if($theme->role=='main'){
                    $theme_id=$theme->id;
                }
            }    
            //Asset api call for asset creation
                  foreach($data_asset as $data){
                    
                    $request = $shop->api()->rest('PUT', '/admin/themes/'.$theme_id.'/assets.json',$data);
                    //echo '<pre>'; print_r($request->body->asset); echo '</pre>';
                }     
        
        }
        
       
         
        
             
            //script api data for post requsest
                $data_script= Config::get('shopify-apI-data.data_script'); 
      
    //Add js file using script tag api
                /*   $request = $shop->api()->rest('POST', '/admin/script_tags.json',$data_script);
                    dd($request->body->script_tag); */
                
   
   
    }

    public function CreateHook(){
       
   
      
       $shop = ShopifyApp::shop();
        $data= ['webhook' => [
            'topic' => "products/update",
            'address' => "https://d232def9.ngrok.io/share/update",
            'format'=>"json"
           
        ]];
      /*   $data_asset_api= ['asset' => [
            'key' => "sections/asset_api_test_checck.liquid",
            'value' => "<img src='backsoon-postit.png'><p>We are busy updating the store for you and will be back within the hour.</p>"
           
        ]];
       
       $request = $shop->api()->rest('PUT', '/admin/themes/36130947136/assets.json',$data_asset_api);
       dd($request->body->asset); */
      // $users = DB::select("SELECT product_json FROM products where product_json->> '$.variants[0].price' Between ? And ? ",[(int)$_GET['price_from'],(int)$_GET['price_to']]);
      $users = DB::table('products')->select('product_json')->whereRaw('product_json->> "$.variants[0].price" Between ? And ?', [(int)$_GET['price_from'],(int)$_GET['price_to']])->paginate(15);
    // echo '<pre>'; print_r(json_encode($users)); echo '</pre>';
    return json_encode($users);  
    //dd($users);
        //$pro=Share::where('product_json->variants[0]->id','642667041472714000')->get();
      // $users=json_decode ($users[0]->product_json,true);
      // dd($users);
      $products_array = array();
      
        foreach ($users as $key => $object){
            $products_array[$key] = json_decode($object->product_json);      
         } 
       //  dd(json_encode($products_array)) ;    
      //  return json_encode($products_array);
        //  echo '<pre>'; print_r($products_array); echo '</pre>';

        } 



    
    public function showProducts(){
        $shop = ShopifyApp::shop();
        $data= ['webhook' => [
            'topic' => "products/create",
            "address" => " https://32c4d3b3.ngrok.io/share/update",
            'format'=>"json"
           
        ]];
        // $requ = $shop->api()->rest('POST', '/admin/webhooks.json',$data);
            
      
                if (array_key_exists('price', $_GET)) {
                    $check=true;
                }
                else{
                    $check=false;
                }
        $request = $shop->api()->rest('GET', '/admin/products.json');
        $products=$request->body->products;
        if($check){
        for($i = 0; $i < sizeof($products); $i++) {
            if($_GET['price'] <= round($products[$i]->variants[0]->price ) ) {
                
                array_splice($products, $i, 1);
                $i--;
            }
        }
    }
        /* foreach($products as $key => $product){
           if(round($product->variants[0]->price) < 500){
               echo round($product->variants[0]->price).", ";
              array_splice($products,$key,1); 
           }
        } */
         echo '<pre>'; print_r($products); echo '</pre>'; 
        return view('custom')->with('products',$products);
    }


    public function addProducts(Request $request){


        $shop = ShopifyApp::shop();

        $data= ['product' => [
            'title' => $request->input('title'),
            "body_html"=>$request->input('html'),
            "vendor"=> $request->input('vendor'),
            "product_type"=> $request->input('type'),
            "tags"=>$request->input('tags')
        ]];

   

        $request = $shop->api()->rest('POST', '/admin/products.json',
//           =================== BODY OF THE POST API ===========================
            $data
//            =====================
        );

        return redirect()->back();
    }


}
