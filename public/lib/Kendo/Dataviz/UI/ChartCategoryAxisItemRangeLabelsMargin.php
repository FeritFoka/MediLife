<?php

namespace Kendo\Dataviz\UI;

class ChartCategoryAxisItemRangeLabelsMargin extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The bottom margin of the labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartCategoryAxisItemRangeLabelsMargin
    */
    public function bottom($value) {
        return $this->setProperty('bottom', $value);
    }

    /**
    * The left margin of the labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartCategoryAxisItemRangeLabelsMargin
    */
    public function left($value) {
        return $this->setProperty('left', $value);
    }

    /**
    * The right margin of the labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartCategoryAxisItemRangeLabelsMargin
    */
    public function right($value) {
        return $this->setProperty('right', $value);
    }

    /**
    * The top margin of the labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartCategoryAxisItemRangeLabelsMargin
    */
    public function top($value) {
        return $this->setProperty('top', $value);
    }

//<< Properties
}

?>
