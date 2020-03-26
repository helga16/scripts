<?php

abstract class Animal{

	public $name,$weight;
	protected $className;
	private $area;

	function __construct($values){
list($this->name,$this->weight,$className,$area)=$values;
$this->set_className($className);
$this->set_area($area);
	}

	function set_area($val){
		$available_areas = ['вода','суша','воздух','почва'];
		if(in_array($val,$available_areas)){
$this->area = $val;
}else{
	echo "Некорректное название среды обитания";
}
	}


	function set_className($val){
		$available_classes = ['млекопитающие','рыбы','птицы','земноводные'];
		if(in_array($val,$available_classes)){
$this->className = $val;
}else{
	echo "Некорректное имя класса";
}
	}
	

	function get_info(){
		return $this->name.' - это животное, представляющее класс '.$this->className.'. Средний вес особи составляет '.$this->weight.' кг. Среда обитания - '.$this->area.'.';
		return $this;
	}


	abstract function add_dopInfo();
}

class Mammal extends Animal{
protected $unit;
protected $className = 'млекопитающие';


public function set_unit($val){
	$available_units = ['насекомые', 'грызуны','хищники','приматы'];
		if(in_array($val,$available_units)){
$this->unit = $val;
return $this;
}else{
	echo "Некорректное имя отряда";
}
	}


function add_dopInfo(){
		return ' Принадлежит отряду '.$this->unit.'.';
}
}

class Dog extends Mammal{
protected $unit = 'хищники';
private $country;

function set_country($val){
	$this->country = $val;
}

public function add_dopInfo(){
	return ' Принадлежит отряду '.$this->unit.'.Страна происхождения - '.$this->country.'. Название вида - собака.';
}
}
class Monkey  extends Mammal{
protected $unit = 'приматы';
}
class Mouse  extends Mammal{
protected $unit = 'грызуны';
}

//объекты классов с новыми дополнительными методами
$ferret = new Mammal(array('хорек',1,'млекопитающие','суша'));
$ferret->set_unit('хищники');

$dog = new Dog(array('такса',8,'млекопитающие','суша'));
$dog->set_country('Германия');

//объекты классов со стандартным набором методов, реализующих различие классов по признаку 'отряд млекопитающих'
$mouse = new Mouse(array('мышь',0.2,'млекопитающие','суша'));
$monkey = new Monkey(array('обезьяна',15,'млекопитающие','суша'));


$arrayOfanim = [$ferret, $monkey,$dog, $mouse];

foreach($arrayOfanim as $item){
echo $item->get_info();
if(method_exists($item, 'add_dopInfo')){
	echo $item->add_dopInfo();
}

}



?>