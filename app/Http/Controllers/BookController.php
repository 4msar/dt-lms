<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Branch;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
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
        $books = Book::paginate(20);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        $branches = Branch::all();
        return view('books.create', compact('users', 'categories', 'branches'));
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
            'book_name' => 'required|string|max:225',
            'author_name' => 'required|string|max:225',
            'category_id' => 'required|integer',
            'owner_id' => 'required|integer',
            'hub_id' => 'required|integer',
            'quantity' => 'required|integer',
            'image'=>'nullable|image'
        ]);
        $name = null;
        if($request->hasFile('image')){
            $file = $request->file('image');

            $name = str_random(5).time().'.'.$file->extension();
            $file->move(storage_path('app/public/'), $name);
        }

        $book = Book::create([
            'image' => $name,
            "book_name" => $request->input('book_name'),
            "author_name" => $request->input('author_name'),
            "category_id" => $request->input('category_id'),
            "owner_id" => $request->input('owner_id'),
            "hub_id" => $request->input('hub_id'),
            "quantity" => $request->input('quantity')
            
        ]);

        if($book){
            $message = ['success' => 'Book added successfully!'];
        }else{
            $message = ['warning' => 'Failed to Add!'];
            if(file_exists(storage_path('app/public/'.$name)) && $name != 'books.png' && !is_dir(storage_path('app/public/'.$name))){
                unlink(storage_path('app/public/'.$name));
            }
        }
        return back()->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $users = User::all();
        $categories = Category::all();
        $branches = Branch::all();
        return view('books.edit', compact('book', 'users', 'categories', 'branches'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'book_name' => 'required|string|max:225',
            'author_name' => 'required|string|max:225',
            'category_id' => 'required|integer',
            'owner_id' => 'required|integer',
            'hub_id' => 'required|integer',
            'quantity' => 'required|integer',
            'image'=>'nullable|image'
        ]);
        $name = $old = $book->image;
        
        if($request->hasFile('image')){
            $file = $request->file('image');

            $name = str_random(5).time().'.'.$file->extension();
            $file->move(storage_path('app/public/'), $name);
        }

        $book->image = $name;
        $book->book_name = $request->input('book_name');
        $book->author_name = $request->input('author_name');
        $book->category_id = $request->input('category_id');
        $book->owner_id = $request->input('owner_id');
        $book->hub_id = $request->input('hub_id');
        $book->quantity = $request->input('quantity');
        $book->status = $request->input('status');

        if($book->save()){
            $message = ['success' => 'Book updated successfully!'];
            if(file_exists(storage_path('app/public/'.$old)) && !is_dir(storage_path('app/public/'.$old))){
                unlink(storage_path('app/public/'.$old));
            }
        }else{
            $message = ['warning' => 'Failed to update!'];
            if(file_exists(storage_path('app/public/'.$name)) && !is_dir(storage_path('app/public/'.$name))){
                unlink(storage_path('app/public/'.$name));
            }
        }
        return redirect()->route('books.index')->with($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if($book->delete()){
            $message = ['success' => 'Book deleted successfully!'];
        }else{
            $message = ['warning' => 'Failed to delete!'];
        }
        return back()->with($message);
    }
}
