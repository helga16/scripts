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
		$available_classes = ['mammal','fishes','birds','amphibious'];
		if(in_array($val,$available_classes)){
$this->className = $val;
}else{
	echo "Incorrect name of animals' class";
}
	}
	public function get_name(){
	return $this->name;	
	}
	public function get_weight(){
		return '. It\'s weight is '.$this->weight.' kg.';
	}

	public function get_className(){
return $this->className;
	}

	public function get_info(){
		return 'The animal '.$this->get_name().' represents class '.$this->get_className().$this->get_weight();
	}
}

class Mammal extends Animal{
protected $unit;
protected $className = 'mammal';

public function set_className($val){
if($val == 'mammal'){
	$this->className = $val;
	}else {
		echo 'incorrect name of class';
	}
}

public function set_unit($val){
	$available_units = ['predatory','marsupials','primate'];
		if(in_array($val,$available_units)){
$this->unit = $val;
}else{
	echo "Incorrect name of mammal' unit";
}
	}

	public function get_unit(){
return $this->unit;
	}

public function get_info(){
		return 'The '.$this->get_className()."\n".$this->get_name().' represents unit '.$this->get_unit().$this->get_weight();
}
}

class Dog extends Mammal{
protected $className = 'млекопитающие';
private $country;
protected $unit = 'хищники';

public function get_name(){
return 'Собака породы '.$this->name.' представляет класс животных ';
}

public function set_country($val){
$this->country = $val;

}
public function get_country(){
return 'Страна происхождения породы - '.$this->country.'. ';

}

public function get_weight(){
	return 'Средний вес особи составляет '.$this->weight.' кг.';
}
public function get_unit(){
return 'отряд "'.$this->unit.'".';

}
public function get_info(){
		return $this->get_name().'"'.$this->get_className().'" '.$this->get_unit()."\n".$this->get_country().$this->get_weight();
}
}

$animal1 = new Animal;
$animal1->name ='ferret';
$animal1->set_className('mammal');
$animal1->set_weight(1);
echo $animal1->get_info();

$animal2 = new Mammal;
$animal2->set_unit('marsupials');
$animal2->set_name('cat');
$animal2->weight=2;
echo $animal2->get_info();

$animal3 = new Dog();
$animal3->set_country('Германия');
$animal3->name='такса';
$animal3->set_weight(7);
echo $animal3->get_info();

?>