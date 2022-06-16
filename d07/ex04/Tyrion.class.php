<?php
    class Tyrion extends Lannister {
        function sleepWith ($person) {
            if ($person instanceof Lannister)
                print("Not even if I'm drunk !" . PHP_EOL);
            else if ($person instanceof Sansa)
                print("Let's do this." . PHP_EOL);
        }
    }
?>