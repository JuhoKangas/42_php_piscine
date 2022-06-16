<?php
    abstract class Fighter {
        public $name;

        function __construct($fighter) {
            $this->name = $fighter;
        }

        abstract public function fight($type);
    }
?>