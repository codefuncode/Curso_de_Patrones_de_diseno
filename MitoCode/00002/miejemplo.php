<?php

Class Ejemplo {
	private static $instanciada = false;
	private static $insttancia = null;
	function __construct() {
		echo "</br></br>Iniciado </br>";
	}
	static function ejemplo() {

		if (self::$instanciada == true) {
			self::$instanciada = false;
			echo "Instancia ocupada  </br>";
			return null;

		} else {

			echo "Instancia  </br>";
			self::$instanciada = true;
			return new Ejemplo();
		}

	}
}

$ejemmplo = new Ejemplo();
$ejemmplo->ejemplo();
$ejemmplo->ejemplo();
$ejemmplo->ejemplo();
$ejemmplo->ejemplo();
echo "</br>===========</br>";
$ejemmplo2 = new Ejemplo();
$ejemmplo2->ejemplo();
$ejemmplo2->ejemplo();
$ejemmplo2->ejemplo();
$ejemmplo2->ejemplo();