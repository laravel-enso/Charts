<?php

namespace LaravelEnso\Charts\app\Classes;

abstract class AbstractChart
{
    protected $datasets;
    protected $labels;
    protected $chartColors;
    protected $data = [];
    protected $opacity;
    protected $title;
    protected $options = [];

    public function __construct($labels, $datasets, $title = null, $options = [])
    {
        $this->opacity = 0.6;
        $this->labels = $labels;
        $this->datasets = $datasets;
        $this->options = $options;
        $this->title = $title;
        $this->chartColors = $this->getColors();
        $this->buildChartData();
    }

    abstract protected function buildChartData();

    abstract public function getResponse();

    protected function hex2rgba($color)
    {
        $color = substr($color, 1);
        $hex = [$color[0].$color[1], $color[2].$color[3], $color[4].$color[5]];
        $rgb = array_map('hexdec', $hex);
        $result = 'rgba('.implode(',', $rgb).','.$this->opacity.')';

        return $result;
    }

    private function getColors()
    {
        return array_values(config('charts.colors'));
    }
}
