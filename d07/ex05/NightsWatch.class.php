<?php
    class NightsWatch {
        protected $recruited = array();

        function recruit($obj) {
                $this->recruited[] = $obj;
        }

        function fight() {
            foreach($this->recruited as $fighter) {
                if ($fighter instanceof IFighter)
                    print ($fighter->fight());
            }
        }
    }
?>