<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomeController extends Controller
{
    public function index()
    {
        // Get the widget name from config
        $widgetName = config('pkgwidget.widget_name');

        // Return a view or pass data to the view
        return view('someview', compact('widgetName'));
    }
}
