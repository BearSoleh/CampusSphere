<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderPayment;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('seller_id',Auth::user()->id)->get();
        $categories = Category::get();
        return view('product.product',
        [
            'products' => $products, 
            'categories' => $categories, 
        ]);
    }

    public function store(Request $request)
    {
         
        $request->validate(
            [
                'name' => 'required', 
                'description' => 'required',
                'price' => 'required', 
                'photo' => 'required|mimes:gif,jpg,png|max:2048',
                'category_id' => 'required',
            ]
        );
        
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('uploads', 'public');
            $request->photo->move(public_path('/uploads'), $fileName);

            $data = new Product([ 
                'name' => $request->get('name'),  
                'description' => $request->get('description'),
                'price' => $request->get('price'), 
                'photo' => $fileName,
                'seller_id' => Auth::user()->id,
                'category_id' => $request->get('category_id'),
            ]);
    
            $data->save();

            return redirect()->route('product')
            ->with('success', 'Data saved successfully.');
    }

    public function delete(Request $request)
    {
        //dd($request->get('product_id'));
        Product::findOrFail($request->get('product_id'))->delete();
        return redirect()->route('product')
            ->with('success', 'Add Cart deleted successfully.');
    }

    public function update(Request $request)
    {
        //dd($request->get('complaint_date'));
        $request->validate(
            [
                'name' => 'required', 
                'description' => 'required',
                'price' => 'required', 
                'photo' => 'mimes:gif,jpg,png|max:2048',
                'category_id' => 'required',
            ]
        );    
        if($request->file('photo')){
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('uploads', 'public');
            $request->photo->move(public_path('/uploads'), $fileName);

            Product::where('id',$request->get('id'))->update([
                'name'=>$request->get('name'),
                'description'=>$request->get('description'),
                'price'=>$request->get('price'),
                'category_id'=>$request->get('category_id'),
                'photo'=>$fileName,
            ]);
        }else{
            Product::where('id',$request->get('id'))->update([
                'name'=>$request->get('name'),
                'description'=>$request->get('description'),
                'price'=>$request->get('price'),
                'category_id'=>$request->get('category_id'), 
            ]);
        }
            

        return redirect()->route('product')->with('success', 'Data saved successfully.');
    }

    public function addcart($product_id)
    {
            if(empty(Auth::user()->id)){
                return redirect()->route('welcome')
                ->with('error', 'Please log in your account.');
            }

            $product = Product::where('id',$product_id)->first();
            $orderNumber = Str::random(12);
            

            if(Session::get('sess_order_id')){
                $data2 = new OrderProduct([ 
                    'order_id' => Session::get('sess_order_id'), 
                    'product_id' => $product_id, 
                    'quantity' =>1
                ]);

            }else{
                $data = new Order([ 
                    'order_number' => $orderNumber, 
                    'user_id' => Auth::user()->id, 
                    'total_price' => $product->price,
                    'seller_id' => $product->seller_id,
                ]);
        
                $data->save();
                Session::put('sess_order_id', $data->id);
                $data2 = new OrderProduct([ 
                    'order_id' => $data->id, 
                    'product_id' => $product_id, 
                    'quantity' =>1
                ]);
            }
            

            
    
            $data2->save();



            return redirect()->route('welcome')
            ->with('success', 'Add Cart saved successfully.');
    }

    public function order(Request $request)
    {
        if($request->get('order_type') =='Seller'){
            $orders = Order::where('seller_id',Auth::user()->id)->get();
        }else{
            $orders = Order::where('user_id',Auth::user()->id)->get();
        }
         
        return view('product.order',
        [
            'orders' => $orders,  
        ]);
    }

    public function order_view(Request $request)
    {
        $order_products = OrderProduct::where('order_id',$request->get('id'))->get();  
        $order = Order::where('id',$request->get('id'))->first(); 
        $order_payments = OrderPayment::where('order_id',$request->get('id'))->get();
        return view('product.order_view',
        [
            'order_products' => $order_products,  
            'order' => $order, 
            'order_payments' => $order_payments 
        ]);
    }

    public function addcart_view()
    {
        //dd(Session::get('sess_order_id'));
         
        $order_products = OrderProduct::where('order_id',Session::get('sess_order_id'))->get(); 
        //dd($order_products);
        if ($order_products->isEmpty()) {
            return redirect()->route('welcome')
            ->with('error', 'please choose at least one of the product.');
        }

        return view('product.addcart_view',
        [
            'order_products' => $order_products, 
        ]);
    }

    public function addcart_update(Request $request)
    {
        $data=$request->all();
        foreach($data['id'] as $key=>$attr){
            if(!empty($attr)){
                OrderProduct::where(['id'=>$data['id'][$key]])
                ->update([
                    'quantity'=>$data['qty'][$key] 
                ]);
            }
        }

        return redirect()->route('addcart.view')
            ->with('success', 'Add Cart updated successfully.');
    }

    public function addcart_delete(Request $request)
    {
        //dd($request->get('product_id'));
        OrderProduct::findOrFail($request->get('product_id'))->delete();
        return redirect()->route('addcart.view')
            ->with('success', 'Add Cart deleted successfully.');
    }

    public function addcart_checkout(Request $request)
    {
        Session::forget('sess_order_id');
        return redirect()->route('order')
            ->with('success', 'Checkout order successfully.');
    }

    public function payment_store(Request $request)
    {
         
        $request->validate(
            [
                'amount' => 'required',  
                'file' => 'required|mimes:gif,jpg,png|max:2048', 
            ]
        );
        
            $file = $request->file('file');
            //dd($file);
            $fileName = $file->getClientOriginalName();
            $filePath = $file->store('payments', 'public');
            $request->file->move(public_path('/payments'), $fileName);

            $data = new OrderPayment([ 
                'amount' => $request->get('amount'),  
                'file' => $fileName,
                'order_id' => $request->get('order_id'), 
            ]);
    
            $data->save();
            $order_id = $request->get('order_id');
            Order::where(['id'=>$order_id])
                ->update([
                    'order_status_id'=>2
                ]);

            return redirect()->route('order.view',['id'=>$request->get('order_id')])
            ->with('success', 'Data saved successfully.');
    }

    public function payment_update(Request $request)
    {
        $order_id = $request->get('order_id');
        //dd($order_id);
        $payment_status_id = $request->get('payment_status_id');

        

        if($payment_status_id==2){
            OrderPayment::where(['id'=>$order_id])
            ->update([
                'payment_status_id'=> 2
            ]);

            Order::where(['id'=>$order_id])
            ->update([
                'order_status_id'=>3
            ]);
        }else{
            OrderPayment::where(['id'=>$order_id])
            ->update([
                'payment_status_id'=> 3
            ]);

            Order::where(['id'=>$order_id])
            ->update([
                'order_status_id'=>2
            ]);
        }
        

        return redirect()->route('order.view',['id'=>$order_id])
            ->with('success', 'Add Cart updated successfully.');
    }

    public function invoice(Request $request)
    {
        $order_products = OrderProduct::where('order_id',$request->get('id'))->get();  
        $order = Order::where('id',$request->get('id'))->first(); 
        $order_payments = OrderPayment::where('order_id',$request->get('id'))->get(); 
        return view('invoice',
        [
            'order_products' => $order_products,  
            'order' => $order, 
            'order_payments' => $order_payments 
        ]);
    }

     
}
