<?php

namespace Kendo\Dataviz\UI;

class CircularGaugeScaleLabelsBorder extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The color of the border. Any valid CSS color string will work here, including hex and rgb.
    * @param string $value
    * @return \Kendo\Dataviz\UI\CircularGaugeScaleLabelsBorder
    */
    public function color($value) {
        return $this->setProperty('color', $value);
    }

    /**
    * The dash type of the border.
    * @param string $value
    * @return \Kendo\Dataviz\UI\CircularGaugeScaleLabelsBorder
    */
    public function dashType($value) {
        return $this->setProperty('dashType', $value);
    }

    /**
    * The opacity of the border. By default the border is opaque.
    * @param float $value
    * @return \Kendo\Dataviz\UI\CircularGaugeScaleLabelsBorder
    */
    public function opacity($value) {
        return $this->setProperty('opacity', $value);
    }

    /**
    * The width of the border.
    * @param float $value
    * @return \Kendo\Dataviz\UI\CircularGaugeScaleLabelsBorder
    */
    public function width($value) {
        return $this->setProperty('width', $value);
    }

//<< Properties
}

?>
