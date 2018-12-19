<?php
// Task №3
define("pi", 3.14);
$howManyGF = 10;

class Shape
{
	public $s;
	
	public function printInfo()
	{
	}
	
    public function getSquare()
    {
    }
}

class Rectangle extends Shape
{
	public $length;
	public $width ;
    
    public function getSquare()
    {
        $this->s = $this->length * $this->width;
        return $this->s;
    }
	
	public function printInfo()
	{
		echo "S Rectangle = $this->s <br/>";
	}
	
	function __construct($length, $width) 
	{
      $this->length = $length;
      $this->width = $width;
	  $this->getSquare();
	}

}

class Circle extends Shape
{
	public $radius;
    
    function getSquare()
    {
        $this->s = pow($this->radius, 2) * pi;
        return $this->s;
    }
	
	public function printInfo()
	{
		echo "S Circle = $this->s <br/>";
	}

	
	function __construct($radius) 
	{
      $this->radius = $radius;
	  $this->getSquare();
	}
}

class Pyramid extends Shape
{
	public $b;
	public $h;
    
    function getSquare()
    {
        $this->s = pow($this->b, 2) + 4 * (($this->b * $this->h) / 2);
        return $this->s;
    }
	
	public function printInfo()
	{
		echo "S Pyramid = $this->s <br/>";
	}
	
	function __construct($b, $h) 
	{
      $this->b = $b;
      $this->h = $h;
	  $this->getSquare();
	}
}

$fileName = 'shapes.json';

$shapesArray = array();

if (file_exists($fileName))
{
	echo "Read from file:<br/>";
	
	$shapesArray = unserialize(file_get_contents($fileName));
	
	for ($i = 0; $i < $howManyGF; $i++)
	{
		$shapesArray[$i]->printInfo();
	}
	
	echo "<br/>";
}

echo "New shapes:<br/>";

for ($i = 0; $i < $howManyGF; $i++)
{
	$whatGF = mt_rand(1, 3);	

	switch ($whatGF) 
	{
		case 1:
		$rLength = mt_rand(1, 20);
		$rWidth = mt_rand(1, 20);
		$shape = new Rectangle($rLength, $rWidth);
		break;
		
		case 2:
		$rRadius = mt_rand(1, 20);
		$shape = new Circle($rRadius);
		break;
		
		case 3:
		$rB = mt_rand(1, 20);
		$rH = mt_rand(1, 20);
		$shape = new Pyramid($rB, $rH);
		break;
	}
	
	$shapesArray[$i] = $shape;	
}	

usort($shapesArray, 'my_sort_function');

function my_sort_function($a, $b)
{
    return $a->s < $b->s;
}
 
for ($i = 0; $i < $howManyGF; $i++)
{
	$shapesArray[$i]->printInfo();
}

file_put_contents($fileName, serialize($shapesArray));

?>

