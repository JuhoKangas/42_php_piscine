<?php
    class Targaryen {
        
        function getBurned() {
            if (static::resistsFire()) {
                return "emerges naked but unharmed";
            } else {
                return "burns alive";
            }
        }

        function resistsFire() {
            return False;
        }
    }
?>