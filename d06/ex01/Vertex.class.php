<?php
    require_once('Color.class.php');

    class Vertex {
        private $_x;
        private $_y;
        private $_z;
        private $_w = 1.0;
        private $_color;
        static $verbose = false;

        function __construct($arr)
        {
            if (isset($arr['x']) && isset($arr['y']) && isset($arr['z'])) {
                $this->_x = $arr['x'];
                $this->_y = $arr['y'];
                $this->_z = $arr['z'];
            }
            if (isset($arr['w'])) {
                $this->_w = $arr['w'];
            }
            if (isset($arr['color'])) {
                $this->_color = $arr['color'];
            } else {
                $this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
            }
            if (Self::$verbose) {
                printf($this . " constructed\n");
            }
        }

        function __destruct()
        {
            if (Self::$verbose)
                printf($this . " destructed\n");
        }

        function __toString()
        {
            if (Self::$verbose)
                $str = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, $this->_color )", $this->_x, $this->_y, $this->_z, $this->_w);
            else
                $str = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
            return $str;
        }

        static function doc() {
            return (file_get_contents('Vertex.doc.txt'));
        }

        function getX() {
            return $this->_x;
        }

        function setX($newX) {
            $this->_x = $newX;
        }

        function getY() {
            return $this->_y;
        }

        function setY($newY) {
            $this->_y = $newY;
        }

        function getZ() {
            return $this->_z;
        }

        function setZ($newZ) {
            $this->_z = $newZ;
        }

        function getW() {
            return $this->_w;
        }

        function setW($newW) {
            $this->_w = $newW;
        }

        function getColor() {
            return $this->_color;
        }

        function setColor($newColor) {
            $this->_color = $newColor;
        }
    }


?>