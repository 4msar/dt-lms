<?php

namespace App\Http\Controllers;

use File;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_profile()
    {
        return view('users.view_profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_profile()
    {
        return view('users.edit_profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the image of.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function image(Request $request, $type, $id)
    {
        $image = null;
        if($type == 'user'){
            $image = User::find($id)->avatar;
        }
        if($type == 'books'){
            $image = Book::find($id)->image;
        }
        if($type == 'category'){
            $image = Category::find($id)->image;
        }
        
        if($image !== NULL){
            $path = storage_path('app/public/' . $image);
            
            if (! file_exists($path)) {
                $path = storage_path('app/public/'.$type.'.png');
                if(! file_exists($path)){
                    abort(404, 'File not found!');
                }
            }
        }else{
            $path = storage_path('app/public/'.$type.'.png');
            if(! file_exists($path)){
                abort(404, 'File not found!');
            }
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = response($file, 200)->header("Content-Type", $type);
        if(isset($_GET['base64'])){
            $image = base64_encode(file_get_contents($path));
            return 'data:image/png;base64, '.$image;
        }
        return $response;
    }
}
