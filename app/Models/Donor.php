<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Sushi\Sushi;

class Donor extends Model
{
    use HasFactory, Sushi;

    // Indicate that this model does not have a database connection
    protected $connection = null; // This makes sure no database connection is attempted

    public function getRows()
    {
        // Call API to get donor data
        $response = Http::get('http://localhost:4040/donors');
        
        if ($response->successful()) {
            $donors = $response->json();
        } else {
            return []; // Return empty array in case of error
        }

        // Filter required attributes
        return Arr::map($donors['data'], function ($item) {
            return Arr::only($item, [
                'id',
                'name',
                'email',
                'phone_number',
                'address'
            ]);
        });
    }
}
