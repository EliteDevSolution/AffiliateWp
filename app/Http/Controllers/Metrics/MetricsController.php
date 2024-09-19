<?php

namespace App\Http\Controllers\Metrics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MetricsController extends Controller
{
    public function index()
    {
        return view('metrics.metrics');
    }
}
