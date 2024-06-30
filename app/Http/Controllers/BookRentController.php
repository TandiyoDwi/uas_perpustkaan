<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', 5)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();
        
        $book = Book::findOrFail($request->book_id)->only('status');

        if($book['status'] != 'in stock'){
            Session::flash('message', 'Tidak bisa disewa, buku masih dipinjam');
            Session::flash('alert-class', 'alert-danger');
            return redirect('book-rent');
        }
        else {
            DB::beginTransaction();
            try {
                // Proses insert ke rent_log tabel
                RentLogs::create($request->all());
                
                // Proses update buku tabel
                $book = Book::findOrFail($request->book_id);
                $book->status = 'not available';
                $book->save();

                DB::commit();
                
                Session::flash('message', 'Sukses Sewa Buku');
                Session::flash('alert-class', 'alert-success');
                return redirect('book-rent');
            } catch (\Throwable $th) {
                DB::rollBack();
            }
        }
    }
}

