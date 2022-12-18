<?php

/**
 * Singleton classes
 */
// De esta clase solo se podrá usar un ejemplar de ella,
// lo cual otra case se encargara de ello enviándole a
// esta case el ejemplar de sí misma para determinar si
// ya existe el ejemplar o no de existir se devolverá
// a sí misma.

class LibroSingular {
	private $nombre = 'Codigo Divertido';
	private $titulo = 'Comprendiendo los patrones de diseño';
	private static $libro = NULL;
	private static $esta_fuera = FALSE;

	private function __construct() {

	}

	static function libroPrestado() {

		// Si la variable con ámbito de clase
		// $esta_fuera es igual a "false"
		if (FALSE == self::$esta_fuera) {

			// Si la variable con ámbito de
			// clase $libro es igual a "false"
			if (NULL == self::$libro) {

				// La variable $libro será la instancia de
				// la misma clase y solo si es nula devuelve
				// la instancia
				self::$libro = new LibroSingular();

			}

			// La variable $esta_fuera indica que ya
			// está prestado por lo que en el condicional
			// anterior válida si es ta variable tiene el
			// valor de "false"
			self::$esta_fuera = TRUE;

			// Retornar el valor de la variable con ámbito
			// de clase con la instancia
			return self::$libro;

		} else {

			// Si la variable $esta_fuera
			// tiene el valor de en "true"
			// entonces devolvera el valor "NULL"

			return NULL;
		}
	}
	// Recibe como parametro una instancia d ela case
	// para que la varible esta fuera este en "false"
	function retornarLibro(LibroSingular $libroDevuelto) {

		self::$esta_fuera = FALSE;
	}

	function opteneNombre() {return $this->nombre;}

	function optenerTitulo() {return $this->titulo;}

	function optenerNombre_y_Titulo() {

		return $this->optenerTitulo() . ' con ' . $this->opteneNombre();
	}
}

class Prestatario {

	private $libroPrestado;
	private $tenerTibro = FALSE;

	function __construct() {

	}

	function optenerNombre_y_Titulo() {
		// Si la variable $tenerTibro es igual a "true"
		// entonces se llama la variable $this->libroPrestado()
		// lo cual es una instancia de la clase LibroSingular::libroPrestado()
		// lo cual se define en el método libroPrestado() de esta misma clase
		if (TRUE == $this->tenerTibro) {

			return $this->libroPrestado->optenerNombre_y_Titulo();

		} else {

			return "No tengo el libro";
		}
	}

	function libroPrestado() {
		// Este método captura la instancia de la clase
		// LibroSingular y al usar los:: se lama al método
		// libroPrestado() de la clase LibroSingular
		$this->libroPrestado = LibroSingular::libroPrestado();

		// Como ya sabemos la llamada al método
		// LibroSingular::libroPrestado() nos
		// devolverá NULL si ya es  instancia
		// por lo que aqui se detecta si fue
		// instanmciada desde esta clase

		if ($this->libroPrestado == NULL) {

			$this->tenerTibro = FALSE;

		} else {

			$this->tenerTibro = TRUE;
		}
	}

	function retornarLibro() {
		// El parámetro de esta función solo recibe una
		// instancia de esta misma clase para que la variable
		// $esta_fuera de la clase LibroSingular:: este en true
		// y poder volver a crear una  instancia de la case
		$this->libroPrestado->retornarLibro($this->libroPrestado);
	}
}
// /////////////////////////////////////////////////////
// Funcion para  imprimir en pntalla
function imprimir($texto) {

	echo $texto . '<br/>';

}