<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Placeholder index method for careers page.
     */
    public function index()
    {
        return redirect()->route('home');
    }
}
