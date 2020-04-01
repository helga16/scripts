<?php

//принцип S реализован в том,что каждый класс описывает функционал той сущности, для которой он создан(класс грызунов не описывает свойств и методов, присущих исключительно классу Dog(страна происхождения породы), хотя оба класса наследуют от одного родителя Mammal)
//принцип О реализован в описании доп.св-в и методов в наследниках,при этом родитель не меняется и доп.функционал в нем отсутствует(отряды,страна происхождения)
//принцип L реализован в том, что методы класса родителя(get_info, add_dopInfo) могут быть реализованы любым потомком.Так, класс Mammal реализует эти методы, наследуя от Animal, а класс Dog реализует их, наследуя от Mammal
//принцип I -интерфейс Pets содержит методы,необходимые для тех классов, экземпляры которых могут выступать домашними питомцами,поэтому он реализован у собаки, хорька, и отсутствует у других классов, интерфейс Nature содержит метод, характекрный для всех животных, поэтому он отделен от специфичного Pets
// D -класс Rodents наследует от Mammal, a не от Dog, т.к.Mammal -максимально абстрактный класс для Rodents, не содержащий методов и св-в Dog, которые не нужны в классе Rodents(св-во страна происхождения породы). В тоже время Dog наследует Mammal, а не Animal(более абстрактный), так как Mammal содержит доп.св-ва,актуальные для Dog, но не описанные в Animal(unit), поэтому для Dog максимально абстрактный будет Mammal 

//магические методы реализованы в классах Animal,Mammal

interface Nature{
	function get_info();

}
interface Pets{
	function get_parametersForchoice();

}
abstract class Animal implements Nature{

	public $name,$weight;
	protected $className;
	private $area;
	public $sound = null;

	function __construct($values){
	
		list($this->name,$this->weight,$className,$area,$this->sound)=$values;
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
		return $this->name.' - это животное, представляющее класс '.$this->className.'. Средний вес особи составляет '.$this->weight.' кг. Среда обитания - '.$this->area.'. ';
	}
	function __toString(){
		return $this->name." ".$this->sound;
	}
	function __invoke(){
		return print($this);
	}


	abstract function add_dopInfo();


}


class Mammal extends Animal{
	protected $unit;
	protected $className = 'млекопитающие';

	public function __get($prop){
		return $this->$prop;
	}
	public function __set($unit,$val){
		$available_units = ['насекомые', 'грызуны','хищники','приматы'];
		if(in_array($val,$available_units)){
			$this->$unit = $val;
		}else{
			echo "Некорректное имя отряда";
		}
	}

	function add_dopInfo(){
		return 'Принадлежит отряду '.$this->unit.".\n";
	}
}

class Dog extends Mammal implements Pets{

	protected $unit = 'хищники';
	private $country;
	private $parametersForchoice;
	public function __construct($params,$val,$val2){
		parent::__construct($params);
		$this->country=$val;
		$this->parametersForchoice=$val2;

	}

	function get_parametersForchoice(){
		return 'Характер собаки и повадки: '.$this->parametersForchoice;
	}

	function add_dopInfo(){
		return 'Отряд - '.$this->unit.'. Страна происхождения - '.$this->country.'. Название вида - собака. '.$this->get_parametersForchoice().".\n";
	}
	
}

class Ferret extends Mammal implements Pets{
	protected $unit = 'хищники';
	private $parametersForchoice;
	public function __construct($params,$val){
		parent::__construct($params);
		$this->parametersForchoice=$val;

	}

	function get_parametersForchoice(){
		return 'Oсобенности животного: '.$this->parametersForchoice;
	}

	function add_dopInfo(){
		return 'Отряд - '.$this->unit.'. '.$this->get_parametersForchoice().".\n";
	}

}

class Rodents  extends Mammal{
	protected $unit = 'грызуны';
	private $family;
	public function __construct($params,$val){
		parent::__construct($params);
		$this->family=$val;

	}

	function add_dopInfo(){
		return 'Отряд - '.$this->unit.', семейство - '.$this->family.".\n";
	}
}

$monkey = new Mammal(array('Обезьяна',8,'млекопитающие','суша','издает глухие звуки'));
$monkey->unit='приматы';
$dog = new Dog(array('Такса',8,'млекопитающие','суша','умеет лаять'),'Германия','доброжелательная, активная, подходит в качестве семейного питомца, для охоты');
$rodent = new Rodents(array('Бобр',6,'млекопитающие','суша', 'издает писк'),'бобровые');
$ferret = new Ferret(array('Хорек',2,'млекопитающие','суша','не издает звуки'),'имеет сильный запах, большую часть времени спит, может быть агрессивным');
$arrayOfanim = [$monkey, $ferret, $rodent, $dog];

foreach($arrayOfanim as $item){
	echo $item->get_info();
	if(method_exists($item, 'add_dopInfo')){
	echo $item->add_dopInfo();
	}

}

//вывод некоторых магических методов
$monkey();
echo "\n".$monkey->className."\n";
echo $dog;
?>