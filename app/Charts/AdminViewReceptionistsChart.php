<?php

declare(strict_types = 1);
namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;
use Chartisan\PHP\Chartisan;

class AdminViewReceptionistsChart extends Chart
{

    public function __construct()
    {
        parent::__construct();
    }
}
