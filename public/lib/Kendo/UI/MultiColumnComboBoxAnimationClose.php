<?php

namespace Kendo\UI;

class MultiColumnComboBoxAnimationClose extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The effect(s) to use when playing the close animation. Multiple effects should be separated with a space.Complete list of available animations
    * @param string $value
    * @return \Kendo\UI\MultiColumnComboBoxAnimationClose
    */
    public function effects($value) {
        return $this->setProperty('effects', $value);
    }

    /**
    * The duration of the close animation in milliseconds.
    * @param float $value
    * @return \Kendo\UI\MultiColumnComboBoxAnimationClose
    */
    public function duration($value) {
        return $this->setProperty('duration', $value);
    }

//<< Properties
}

?>
