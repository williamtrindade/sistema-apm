<?php

namespace App\Http\Controllers;

use Analytics;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
{
    public function index()
    {
        $visitas = Analytics::fetchMostVisitedPages(Period::days(5000))['0']['pageViews'];
        return $visitas;
    }
}