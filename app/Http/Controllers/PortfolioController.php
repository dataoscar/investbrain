<?php

namespace App\Http\Controllers;

use App\Models\Holding;
use App\Models\Portfolio;
use App\Models\DailyChange;

class PortfolioController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {

        // get portfolio metrics
        $metrics = cache()->remember(
            'portfolio-metrics-' . $portfolio->id, 
            60, 
            function () use ($portfolio) {
                return
                 Holding::query()
                    ->portfolio($portfolio->id)
                    ->getPortfolioMetrics()
                    ->first();
            }
        );
        
        return view('portfolio.show', compact(['portfolio', 'metrics']));
    }
}
