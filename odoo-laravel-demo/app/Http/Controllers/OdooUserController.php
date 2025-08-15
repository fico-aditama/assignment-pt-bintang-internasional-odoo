<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OdooUserController extends Controller
{
    public function index()
    {
        try {
            // Make sure to replace this with your Odoo instance URL
            $response = Http::get('http://localhost:8069/api/public/users');
            
            if ($response->successful()) {
                $data = $response->json();
                $users = $data['data'] ?? [];
                return view('odoo.users', compact('users'));
            }
            
            return back()->with('error', 'Failed to fetch users from Odoo');
            
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}