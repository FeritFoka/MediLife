<?php

namespace Kendo\Dataviz\UI;

class ChartCategoryAxisItemRangeLabelsPadding extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The bottom padding of the labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartCategoryAxisItemRangeLabelsPadding
    */
    public function bottom($value) {
        return $this->setProperty('bottom', $value);
    }

    /**
    * The left padding of the labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartCategoryAxisItemRangeLabelsPadding
    */
    public function left($value) {
        return $this->setProperty('left', $value);
    }

    /**
    * The right padding of the labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartCategoryAxisItemRangeLabelsPadding
    */
    public function right($value) {
        return $this->setProperty('right', $value);
    }

    /**
    * The top padding of the labels.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartCategoryAxisItemRangeLabelsPadding
    */
    public function top($value) {
        return $this->setProperty('top', $value);
    }

//<< Properties
}

?>
