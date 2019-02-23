<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
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
        $reservations = Reservation::paginate(20);
        return view('reservation.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::where('status', 1)->get();
        $users = User::all();
        return view('reservation.create', compact('users', 'books'));
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
            'book' => 'required|integer',
            'user' => 'required|integer',
            'return_date' => 'required|date',
        ]);
        $save = Reservation::create([
            "book_id" => $request->input('book'), 
            "user_id" => $request->input('user'), 
            "return_date" => Carbon::parse($request->input('return_date'))->toDateTimeString(), 
            "issue_date" =>now()
        ]);

        $check = Reservation::where('book_id', $request->input('book'))->count();
        if($check >= $save->book->quantity){
            $save->book->status = 0;
            $save->book->save();
        }

        if($save){
            $message = ['success' => 'Book issued successfully!'];
        }else{
            $message = ['warning' => 'Failed to issue!'];
        }
        return back()->with($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        return view('reservation.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        $reservation->returned_at = now();
        $reservation->save();
        $reservation->book->status = 1;
        $reservation->book->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        if($reservation->delete()){
            $message = ['success' => 'Reservation deleted successfully!'];
        }else{
            $message = ['warning' => 'Failed to delete!'];
        }
        return back()->with($message);
    }
}
