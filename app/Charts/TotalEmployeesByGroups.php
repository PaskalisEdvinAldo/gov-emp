<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

use App\Models\Occupation;

class TotalEmployeesByGroups extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function buildChart()
    {
        $data = Occupation::selectRaw('`group`, COUNT(*) as total')
            ->groupBy('group')
            ->orderBy('group')
            ->pluck('total', 'group');

        // Set labels (sumbu X)
        $this->labels($data->keys());

        // Tambahkan dataset
        $this->dataset('Total Employees per Group', 'line', $data->values())
            ->color("rgba(54, 162, 235, 1)")
            ->backgroundColor("rgba(54, 162, 235, 0.2)")
            ->fill(true);
    }
}
