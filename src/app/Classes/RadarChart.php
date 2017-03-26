<?php

namespace LaravelEnso\Charts\App\Classes;

class RadarChart extends AbstractChart
{
    public $fill = false;

    protected function buildChartData()
    {
        $colorIndex = 0;

        foreach ($this->datasets as $label => $dataset) {
            $borderColor = $this->chartColors->getValueByKey($colorIndex);

            $this->data[] = [
                'label'            => $label,
                'borderColor'      => $borderColor,
                'backgroundColor'  => $this->hex2rgba($borderColor),
                'pointBorderColor' => '#fff',
                'data'             => $dataset,
            ];

            $colorIndex++;
        }
    }

    public function getResponse()
    {
        return [
            'labels'   => $this->labels,
            'datasets' => $this->data,
        ];
    }
}
