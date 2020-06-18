<?php

namespace App\Http\Controllers;

use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
{
    public function index()
    {
        $visitas = Analytics::fetchTotalVisitorsAndPageViews(Period::create(
            Carbon::createFromFormat('Y-m-d H:i:s', '2019-08-13 00:00:00'),
            Carbon::now()
        ));
        $total = 0 ;
        $visitas->each(function(array $visita) use (&$total) {
            $total += $visita['pageViews'];

        });
        return $total;
    }
}