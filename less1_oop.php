<?php

class Animal{
	public $name;
	protected $className;
	public $weight;

	public function set_name($val){
	$this->name = $val;	
	}
	public function set_weight($val){
		$this->weight = $val;
	}

	public function set_className($val){
		$available_classes = ['млекопитающие','рыбы','птицы','земноводные'];
		if(in_array($val,$available_classes)){
			$this->className = $val;
		}else{
			echo "Некорректное имя класса";
		}
	}
	public function get_name(){
	return 'Животное '.$this->name;	
	}
	public function get_weight(){
		return ' Средний вес особи составляет '.$this->weight.' кг.';
	}

	public function get_className(){
		return ' представляет класс '.$this->className.'.';
	}

	public function get_info(){
		return $this->get_name().$this->get_className().$this->get_weight();
	}
}

class Mammal extends Animal{
	
	protected $unit;
	protected $className = 'млекопитающие';

	public function set_className($val){
		if($val == 'млекопитающие'){
			$this->className = $val;
		}else {
			echo 'Некорректное название класса';
		}
	}

	public function set_unit($val){
		$available_units = ['насекомые','грызуны','хищники','приматы'];
		if(in_array(strtolower($val),$available_units)){
			$this->unit = $val;
		}else{
			echo "Некорректное название отряда млекопитающих";
		}
	}

	public function get_unit(){
		return ' Принадлежит к отряду '.$this->unit.'.';
		 
	}

}

class Dog extends Mammal{
	
	protected $className = 'млекопитающие';
	private $country;
	protected $unit = 'хищники';

	public function get_name(){
		return 'Собака породы '.$this->name;
	}

	public function set_country($val){
		$this->country = $val;

	}

	public function get_country(){
		return ' Страна происхождения породы - '.$this->country.'.';
	}

}

$animal1 = new Animal;
$animal1->name ='хорек';
$animal1->set_className('млекопитающие');
$animal1->set_weight(1);
echo $animal1->get_info();

$animal2 = new Mammal;
$animal2->set_unit('хищники');
$animal2->set_name('кошка');
$animal2->weight=2;
echo $animal2->get_info();
echo $animal2->get_unit();

$animal3 = new Dog();
$animal3->set_country('Германия');
$animal3->name='такса';
$animal3->set_weight(7);
echo $animal3->get_info();
echo $animal3->get_unit();
echo $animal3->get_country();


?>