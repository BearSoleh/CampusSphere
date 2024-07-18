<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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
        return view('home');
    }

    public function profile()
    {
        return view('profile');
    }

    public function profile_update(Request $request)
    {
        //dd($request->get('complaint_date'));
        $request->validate(
            [
                'name' => 'required',  
            ]
        );    
         
            User::where('id',Auth::user()->id)->update([
                'name'=>$request->get('name'), 
            ]);
       

        return redirect()->route('profile')->with('success', 'Data updated successfully.');
    }

    public function seller()
    {
        $total_order = Order::where('seller_id', Auth::user()->id)->count();
        $total_order_completed = Order::where('seller_id', Auth::user()->id)
        ->where('order_status_id', 3)
        ->count();

        $total_order_inprogress = Order::where('seller_id', Auth::user()->id)
        ->where('order_status_id', 2)
        ->count();

        $total_sale = Order::where('seller_id', Auth::user()->id)
        ->where('order_status_id', 3)
        ->sum('total_price');

        return view('home_seller',
        [
            'total_order' => $total_order, 
            'total_order_completed' => $total_order_completed, 
            'total_order_inprogress' => $total_order_inprogress,
            'total_sale' => $total_sale
        ]);
    }
}
