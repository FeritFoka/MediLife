<?php

namespace Kendo\Dataviz\UI;

class StockChartLegendTitle extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The alignment of the title. "center" - the text is aligned to the middle.; "left" - the text is aligned to the left. or "right" - the text is aligned to the right..
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function align($value) {
        return $this->setProperty('align', $value);
    }

    /**
    * The background color of the title. Accepts a valid CSS color string, including hex and rgb.
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function background($value) {
        return $this->setProperty('background', $value);
    }

    /**
    * The border of the title.
    * @param \Kendo\Dataviz\UI\StockChartLegendTitleBorder|array $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function border($value) {
        return $this->setProperty('border', $value);
    }

    /**
    * The text color of the title. Accepts a valid CSS color string, including hex and rgb.
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function color($value) {
        return $this->setProperty('color', $value);
    }

    /**
    * The font of the title.
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function font($value) {
        return $this->setProperty('font', $value);
    }

    /**
    * The margin of the title. A numeric value will set all margins.
    * @param float|\Kendo\Dataviz\UI\StockChartLegendTitleMargin|array $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function margin($value) {
        return $this->setProperty('margin', $value);
    }

    /**
    * The padding of the title. A numeric value will set all margins.
    * @param float|\Kendo\Dataviz\UI\StockChartLegendTitlePadding|array $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function padding($value) {
        return $this->setProperty('padding', $value);
    }

    /**
    * The position of the title. "bottom" - the title is positioned on the bottom. or "top" - the title is positioned on the top..
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function position($value) {
        return $this->setProperty('position', $value);
    }

    /**
    * The text of the legend title. You can also set the text directly for a title with default options.
    * @param string $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function text($value) {
        return $this->setProperty('text', $value);
    }

    /**
    * If set to true the chart will display the title. By default the title will be displayed.
    * @param boolean $value
    * @return \Kendo\Dataviz\UI\StockChartLegendTitle
    */
    public function visible($value) {
        return $this->setProperty('visible', $value);
    }

//<< Properties
}

?>
