<?php
    class Color {
        public $red;
        public $green;
        public $blue;
        static $verbose = false;

        function __construct($arr)
        {
            if (isset($arr['red']) && isset($arr['green']) && isset($arr['blue'])) {
                $this->red = intval($arr['red']);
                $this->green = intval($arr['green']);
                $this->blue = intval($arr['blue']);
            } else if (isset($arr['rgb'])) {
                $rgb = intval($arr['rgb']);
                $this->red = $rgb >> 16 & 255;
                $this->green = $rgb >> 8 & 255;
                $this->blue = $rgb & 255;
            }
            if (Self::$verbose)
                printf($this . " constructed.\n");
        }

        function __destruct()
        {
            if (Self::$verbose)
                printf($this . " destructed.\n");
        }

        function __toString()
        {
            $str = sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
            return ($str);
        }

        static function doc() {
            return (file_get_contents('Color.doc.txt'));
        }

        function add(Color $add) {
            $addedRed = $this->red + $add->red;
            $addedGreen = $this->green + $add->green;
            $addedBlue = $this->blue + $add->blue;
            $addedColor = array('red' => $addedRed, 'green' => $addedGreen, 'blue' => $addedBlue);
            return (new Color($addedColor));
        }

        function sub(Color $sub) {
            $subbedRed = $this->red - $sub->red;
            $subbedGreen = $this->green - $sub->green;
            $subbedBlue = $this->blue - $sub->blue;
            $subbedColor = array('red' => $subbedRed, 'green' => $subbedGreen, 'blue' => $subbedBlue);
            return (new Color($subbedColor));
        }

        function mult($mult) {
            $multRed = $this->red * $mult;
            $multGreen = $this->green * $mult;
            $multBlue = $this->blue * $mult;
            $multColor = array('red' => $multRed, 'green' => $multGreen, 'blue' => $multBlue);
            return (new Color($multColor));
        }
    }
?>