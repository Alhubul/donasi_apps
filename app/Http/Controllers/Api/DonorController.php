<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DonorController extends Controller
{
    private $apiUrl = 'http://localhost:4040/donors';  // Ganti dengan URL API Anda

    // Menampilkan semua Donor
    public function index()
    {
        $response = Http::get($this->apiUrl);
        return response()->json($response->json());
    }

    // Menampilkan Donor berdasarkan ID
    public function show($id)
    {
        $response = Http::get("{$this->apiUrl}/{$id}");
        return response()->json($response->json());
    }

    // Menambah Donor baru
    public function store(Request $request)
    {
        $response = Http::post($this->apiUrl, $request->all());
        return response()->json($response->json(), 201);
    }

    // Memperbarui Donor berdasarkan ID
    public function update(Request $request, $id)
    {
        $response = Http::put("{$this->apiUrl}/{$id}", $request->all());
        return response()->json($response->json());
    }

    // Menghapus Donor berdasarkan ID
    public function destroy($id)
    {
        $response = Http::delete("{$this->apiUrl}/{$id}");
        return response()->json(['message' => 'Donor deleted successfully']);
    }
}
