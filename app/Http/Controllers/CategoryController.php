<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
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
        $categories = Category::get();
        return view('category.category',
        [
            'categories' => $categories, 
        ]);
    }

    public function store(Request $request)
    {
        //dd($request->get('complaint_date'));
        $this->validate($request, [
            'category' => 'required', 
        ]);

        $data = new Category([
            'category' => $request->get('category'),  
        ]);

        $data->save(); 
        return redirect()->route('category')->with('success', 'Data saved successfully.');
    }

    public function delete(Request $request)
    {
        //dd($request->get('product_id'));
        Category::findOrFail($request->get('category_id'))->delete();
        return redirect()->route('category')
            ->with('success', 'Add Cart deleted successfully.');
    }

    public function update(Request $request)
    {
        //dd($request->get('complaint_date'));
        $this->validate($request, [
            'category' => 'required', 
        ]);         

        Category::where('id',$request->get('id'))->update(['category'=>$request->get('category')]);

        return redirect()->route('category')->with('success', 'Data saved successfully.');
    }

}
