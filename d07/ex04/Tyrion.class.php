<?php
    class Tyrion {
        function sleepWith ($person) {
            if ($person instanceof Cersei || $person instanceof Jaime)
                print("Not even if I'm drunk !" . PHP_EOL);
            else if ($person instanceof Sansa)
                print("Let's do this." . PHP_EOL);
        }
    }
?>