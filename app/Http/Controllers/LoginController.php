<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('login');
    }

    public function welcome(Request $request)
    {
        $query = DB::table('products');

        if($request->get('category_id')){
            $query->where('category_id',$request->get('category_id'));
        }

        if($request->get('name')){
            $query->where('name','LIKE','%'.$request->get('name').'%');
        }

        $products = $query->get();

        return view('welcome',
        [
            'products' => $products, 
        ]);
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        //dd('hai');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate(); 
        return redirect()->route('home')
            ->with('success', 'Data saved successfully.');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        //Auth::login($user);
        $request->session()->regenerate();
        if (Auth::attempt($credentials)) {
            return redirect("/home")->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("/login-form")->withError('Oppes! You have entered invalid credentials');
    }

    public function logout() { 
		Session::flush();
		Auth::logout(); 
		return redirect('/')->with('success', 'Logged Out Successfully.');
    }
}
