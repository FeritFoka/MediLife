<?php

namespace Kendo\UI;

class GridFilterableOperatorsString extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The text of the "equal" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function eq($value) {
        return $this->setProperty('eq', $value);
    }

    /**
    * The text of the "not equal" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function neq($value) {
        return $this->setProperty('neq', $value);
    }

    /**
    * The text of the "isnull" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function isnull($value) {
        return $this->setProperty('isnull', $value);
    }

    /**
    * The text of the "isnotnull" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function isnotnull($value) {
        return $this->setProperty('isnotnull', $value);
    }

    /**
    * The text of the "isempty" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function isempty($value) {
        return $this->setProperty('isempty', $value);
    }

    /**
    * The text of the "isnotempty" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function isnotempty($value) {
        return $this->setProperty('isnotempty', $value);
    }

    /**
    * The text of the "starts with" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function startswith($value) {
        return $this->setProperty('startswith', $value);
    }

    /**
    * The text of the "does not start with" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function doesnotstartwith($value) {
        return $this->setProperty('doesnotstartwith', $value);
    }

    /**
    * The text of the "contains" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function contains($value) {
        return $this->setProperty('contains', $value);
    }

    /**
    * The text of the "does not contain" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function doesnotcontain($value) {
        return $this->setProperty('doesnotcontain', $value);
    }

    /**
    * The text of the "ends with" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function endswith($value) {
        return $this->setProperty('endswith', $value);
    }

    /**
    * The text of the "does not end with" filter operator.
    * @param string $value
    * @return \Kendo\UI\GridFilterableOperatorsString
    */
    public function doesnotendwith($value) {
        return $this->setProperty('doesnotendwith', $value);
    }

//<< Properties
}

?>
