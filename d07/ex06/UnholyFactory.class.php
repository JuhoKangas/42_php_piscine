<?php
    class UnholyFactory {
        private $fighters = array();
        
        function absorb($fighter) {
            if ($fighter instanceof Fighter) {
                if (array_key_exists($fighter->name, $this->fighters)) {
                    print ("(Factory already absorbed a fighter of type $fighter->name)" . PHP_EOL);
                } else {
                    print ("(Factory absorbed a fighter of type $fighter->name)" . PHP_EOL);
                    $this->fighters[$fighter->name] = $fighter;
                }
            } else {
                print ("(Factory can't absorb this, it's not a fighter)" . PHP_EOL);
            }
        }

        function fabricate($name) {
            if (array_key_exists($name, $this->fighters)) {
                print ("(Factory fabricates a fighter of type $name)" . PHP_EOL);
                return (clone $this->fighters[$name]);
            } else {
                print ("(Factory hasn't absorbed any fighter of type $name)" . PHP_EOL);
                return NULL;
            }
        }
    }
?>