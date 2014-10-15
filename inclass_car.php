<?php

/*	model data control view
	design pattern = controller
*/

	$car_orders[0]['model'] = 'taurus';
	$car_orders[0]['engine'] = 'V6';
	$car_orders[0]['color'] = 'blue';
	
	$car_orders[1]['model'] = 'mustang';
	$car_orders[1]['engine'] = 'V6';
	$car_orders[1]['color'] = 'blue';
	
	$car_orders[2]['model'] = 'focus';
	$car_orders[2]['engine'] = 'V6';
	$car_orders[2]['color'] = 'blue';

	if(empty($_GET)){
		foreach($car_orders as $car_order){
			$i++;
			$car_order_num = $i - 1;
			foreach($car_order as key => $value){
				echo $key . ': ' . $value . "<br>\n";
			}
			echo '<a href=' . '"http://web.njit.edu/~mer4/IS218/car.php?car_order=' . $car_order_num . '"' . '>Car Order ' . $i . ' </a>';
			
			echo '<br>';
	//		print_r($car_order);
		} 
	}

	$car_order = $car_orders[$_GET['car_order']];
	
	$car = new $car_order['model'];
	
	$car->setColor('blue');
//	$car->model = 'ford';
	print_r($car);
	
	echo $car->make;
	
	abstract class car{
//		public $make = 'ford';
		
		protected $engine;
		protected $wheels = '4';
		protected $doors;
		protected $length;
		protected $weight;
		protected $color;
		
		public function setColor($color){
			$this->color = $color;
		}
		
		public function setEngine(engine $engine){
			$this->engine = $engine;
		}
	}
	
	abstract class ford extends car{}

	class taurus extends ford{
		
		public function __construct(){
			
			$this->doors = '4';
			$this->length = '2000cm';
			$this->weight = '1700kg';
			
			$engine = new engine;
			$this->setEngine($engine);
	}
	class engine{}
?>
