<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\rent;
use App\Models\table_customers;
use Illuminate\Http\Request;

class SimpleController extends Controller
{
    //
    public function index()
    {
        // Mengambil semua data dari tabel customers
        $rents = DB::table('table_customers as c')
            ->join('rent as r', 'c.customer_id', '=', 'r.customer_id')
            ->join('address as a', 'r.address_id', '=', 'a.address_id')
            ->join('table_movies as m', 'r.movie_id', '=', 'm.movie_id')
            ->select('c.full_name', 'a.address', 'm.movie_name', 'c.salutation')
            ->get();

        // Mengirim data ke view home
        return view('home', compact('rents'));
    }

    public function insert()
    {
        $customers = DB::table('table_customers')->get();
        $movies = DB::table('table_movies')->get();
        $addresses = DB::table('address')->get();

        return view('insert', compact('customers', 'movies', 'addresses'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'customer_id' => 'required|integer',
            'movie_id' => 'required|integer',
            'address_id' => 'required|integer',
        ]);

        // Simpan data ke tabel rent
        DB::table('rent')->insert([
            'customer_id' => $request->customer_id,
            'movie_id' => $request->movie_id,
            'address_id' => $request->address_id,
        ]);

        // Redirect ke halaman home atau halaman lain
        return redirect('/')->with('success', 'Rent added successfully!');
    }
    public function getAddresses($customerId)
    {
        $addresses = DB::table('address')->where('customer_id', $customerId)->get();
        return response()->json($addresses);
    }
}
