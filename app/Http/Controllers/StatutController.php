<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class StatutController extends Controller
{
    
    public function index()
    {
        try {
            $response = Http::get('/api/currencies');
    
            if ($response->successful()) {
                return response()->json(['message' => 'Service is functional'], 200);
            } else {
                return response()->json(['error' => 'Service is not available'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while accessing the service'], 500);
        }   
    }

}
