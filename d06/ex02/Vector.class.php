<?php
    require_once('Vertex.class.php');

    class Vector {
        private $_x;
        private $_y;
        private $_z;
        private $_w = 0.0;
        static $verbose = false;

        function __construct($arr)
        {
            if (isset($vect['orig']))
                $orig = new Vertex( array ( 'x' => $arr['orig']->getX(), 'y' => $arr['orig']->getY(), 'z' => $arr['orig']->getZ()));
            else
                $orig = new Vertex( array ( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0));
            
            if (isset($vect['dest'])) {
                $this->_x = $vect['dest']->getX() - $orig->getX();
                $this->_y = $vect['dest']->getY() - $orig->getY();
                $this->_z = $vect['dest']->getZ() - $orig->getZ();
                $this->w = 0.0;
            }

            if (Self::$verbose)
                printf($this . " constructed\n");
        }

        function __destruct()
        {
            if (Self::$verbose)
                printf($this . " destructed\n");
        }

        static function doc() {
            return (file_get_contents('Vector.doc.txt'));
        }

        function __toString()
        {
            return ($str = sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )", $this->_x, $this->_y, $this->_z, $this->_w ));
        }

        function magnitude() {
            $magn = (float)sqrt($this->_x ** 2 + $this->_y ** 2 + $this->_z ** 2);
            return $magn;
        }

        function normalize() {
            $norm = $this->magnitude();

            if ($norm == 1)
                return (clone $this);
            else
                return (new Vector( array ('dest' => new Vertex( array ('x' => $this->_x / $norm, 'y' => $this->_y / $norm, 'z' => $this->_z / $norm) ))));
        }

        function add(Vector $rhs) {
            return (new Vector( array ('dest' => new Vertex(array ('x' => $this->_x + $rhs->_x, 'y' => $this->_y + $rhs->_y, 'z' => $this->_z + $rhs->_z)))));
        }

        function sub(Vector $rhs) {
            return (new Vector( array ('dest' => new Vertex(array ('x' => $this->_x - $rhs->_x, 'y' => $this->_y - $rhs->_y, 'z' => $this->_z - $rhs->_z)))));
        }
        
        function opposite() {
            return (new Vector( array ('dest' => new Vertex(array ('x' => $this->_x * -1, 'y' => $this->_y * -1, 'z' => $this->_z * -1)))));
        }
        
        function scalarProduct($k) {
            return (new Vector( array ('dest' => new Vertex(array ('x' => $this->_x * $k, 'y' => $this->_y * $k, 'z' => $this->_z * $k)))));
        }
        
        function dotProduct(Vector $rhs) {
            return (float)(($this->_x * $rhs->_x) + ($this->_y * $rhs->_y) + ($this->_z * $rhs->_z));
        }

        public function crossProduct(Vector $rhs)
		{
			return new Vector(array('dest' => new Vertex(array('x' => $this->_y * $rhs->read_z() - $this->_z * $rhs->read_y(), 'y' => $this->_z * $rhs->read_x() - $this->_x * $rhs->read_z(), 'z' => $this->_x * $rhs->read_y() - $this->_y * $rhs->read_x()))));
		}

		function cos(Vector $rhs) {
			if ($this->magnitude() == 'norm' || $rhs->magnitude() == 'norm') {
				return (0);
            }
			else
			{
				$len_prod = ($this->magnitude() * $rhs->magnitude());
				return ((float)($this->dotProduct($rhs) / $len_prod));
			}
		}

        function read_x() {
            return $this->_x;
        }

        function read_y() {
            return $this->_y;
        }
        
        function read_z() {
            return $this->_z;
        }
        
        function read_w() {
            return $this->_w;
        }
    }

?>