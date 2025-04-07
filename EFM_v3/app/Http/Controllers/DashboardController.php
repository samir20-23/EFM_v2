<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $livreCount = Livre::all()->count();
        $livres = Livre::orderBy("created_at", 'desc')->take(5)->get();
        return view('dashboard', compact('livres', 'livreCount'));
    }
}
