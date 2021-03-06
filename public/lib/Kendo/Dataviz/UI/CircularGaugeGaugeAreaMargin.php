<?php

namespace Kendo\Dataviz\UI;

class CircularGaugeGaugeAreaMargin extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The top margin of the gauge area.
    * @param float $value
    * @return \Kendo\Dataviz\UI\CircularGaugeGaugeAreaMargin
    */
    public function top($value) {
        return $this->setProperty('top', $value);
    }

    /**
    * The bottom margin of the gauge area.
    * @param float $value
    * @return \Kendo\Dataviz\UI\CircularGaugeGaugeAreaMargin
    */
    public function bottom($value) {
        return $this->setProperty('bottom', $value);
    }

    /**
    * The left margin of the gauge area.
    * @param float $value
    * @return \Kendo\Dataviz\UI\CircularGaugeGaugeAreaMargin
    */
    public function left($value) {
        return $this->setProperty('left', $value);
    }

    /**
    * The right margin of the gauge area.
    * @param float $value
    * @return \Kendo\Dataviz\UI\CircularGaugeGaugeAreaMargin
    */
    public function right($value) {
        return $this->setProperty('right', $value);
    }

//<< Properties
}

?>
