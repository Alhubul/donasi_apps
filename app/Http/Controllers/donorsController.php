<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class donorsController extends Controller
{
    protected $baseUrl = 'http://localhost:4040';

    // Get all donors
    public function index()
{
    $response = Http::get("{$this->baseUrl}/donors");
    
    // Memastikan status respons sukses dan mengambil data dari key 'data'
    if ($response->successful()) {
        $donors = $response->json()['data'];  // Akses data di dalam key 'data'
        return view('admin.donors.index', ['donors' => $donors]);
    } else {
        return back()->with('error', 'Failed to retrieve donors');
    }
}

    

    // Get donor by ID
    public function show($id)
    {
        $response = Http::get("{$this->baseUrl}/donors/{$id}");
        return view('admin.donors.show', ['donor' => $response->json()]);
    }

    // Create new donor
    public function create()
    {
        return view('admin.donors.create');
    }

    public function store(Request $request)
    {
        $response = Http::post("{$this->baseUrl}/donors", $request->all());
        return redirect()->route('admin.donors.index');
    }

    // Update donor
    public function edit($id)
    {
        $response = Http::get("{$this->baseUrl}/donors/{$id}");
        return view('admin.donors.edit', ['donor' => $response->json()]);
    }

    public function update(Request $request, $id)
    {
        $response = Http::put("{$this->baseUrl}/donors/{$id}", $request->all());
        return redirect()->route('admin.donors.index');
    }

    // Delete donor
    public function destroy($id)
    {
        $response = Http::delete("{$this->baseUrl}/donors/{$id}");
        return redirect()->route('admin.donors.index');
    }
}
