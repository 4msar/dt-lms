<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'permission', 'verified']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(20);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Show the books of this resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.books', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'image'=>'nullable|image'
        ]);
        $name = null;
        if($request->hasFile('image')){
            $file = $request->file('image');

            $name = str_random(5).time().'.'.$file->extension();
            $file->move(storage_path('app/public/'), $name);
        }

        $category = Category::create([
            'name' => $request->input('name'),
            'image' => $name
        ]);

        if($category){
            $message = ['success' => 'Category added successfully!'];
        }else{
            $message = ['warning' => 'Failed to Add!'];
            if(file_exists(storage_path('app/public/'.$name)) && $name != 'category.png' && !is_dir(storage_path('app/public/'.$name))){
                unlink(storage_path('app/public/'.$name));
            }
        }
        return back()->with($message);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'image'=>'nullable|image'
        ]);
        $old = $category->image;
        if($request->hasFile('image')){
            $file = $request->file('image');

            $name = str_random(5).time().'.'.$file->extension();
            $file->move(storage_path('app/public/'), $name);

            if(file_exists(storage_path('app/public/'.$name)) && file_exists(storage_path('app/public/'.$old)) && !is_dir(storage_path('app/public/'.$old))){
                unlink(storage_path('app/public/'.$old));
            }
        }

        $category->name = $request->input('name');
        $category->image = isset($name) ? $name : $old;
        $category->save();

        if($category){
            $message = ['success' => 'Category update successfully!'];
        }else{
            $message = ['warning' => 'Failed to update!'];
        }
        return redirect()->route('categories.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            $message = ['success' => 'Category deleted successfully!'];
        }else{
            $message = ['warning' => 'Failed to delete!'];
        }
        return back()->with($message);
    }
}
