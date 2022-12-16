<?php

/**
 * Singleton classes
 */
//  Esta es la case que  solo debera ser instanciada por otra case
class LibroSingular {
	private $autor = 'Codigo Divertido';
	private $titulo = 'Comprendiendo los patrones de diseño';
	private static $libro = NULL;
	private static $esta_fuera = FALSE;

	private function __construct() {
	}

	static function libroPrestado() {

		//  Si la variable con ambito de case $esta_fuera es iugual a false
		if (FALSE == self::$esta_fuera) {

			// Si la variable con ambito de case $libro es iugual a false
			if (NULL == self::$libro) {
				//  la varable libro sera la instancia de lamisma clase  y solo si es nula devuleve la instancia
				self::$libro = new LibroSingular();
			}
			// La variable esta fuera iuundica que ya
			// esta prestado  por loqwu en el condicional
			// anterior valida si es ta vatriable esta en false
			self::$esta_fuera = TRUE;

			//  retornar el valor de la cvariable con ambito de clase  con la instancia
			return self::$libro;

		} else {
			//  Si libro_fuera estaria en true pues solo devuelve null
			return NULL;
		}
	}
	//  Recibe como parametro una instancia d ela case para que la varible esta fuera este en false
	function retornarLibro(LibroSingular $libroDevuelto) {

		self::$esta_fuera = FALSE;
	}

	function optenerAutor() {return $this->autor;}

	function optenerTitulo() {return $this->titulo;}

	function optenerAutor_y_Titulo() {

		return $this->optenerTitulo() . ' con ' . $this->optenerAutor();
	}
}

class Prestatario {

	private $libroPrestado;
	private $tenerTibro = FALSE;

	function __construct() {
	}

	function optenerAutor_y_Titulo() {
		// Si la variable tener libro es igual a true
		// entonces se llama la variable $this->libroPrestado lo
		// cual es una instancia de la case LibroSingular::libroPrestado()
		// lo cual se define en el metodo libroPrestado() de esta mmisma clase
		if (TRUE == $this->tenerTibro) {

			return $this->libroPrestado->optenerAutor_y_Titulo();

		} else {

			return "No tengo el libro";
		}
	}

	function libroPrestado() {
		// Este metodo captura lka instancia de la case LibroSingular y al
		// usar los :: se lama al metodo libroPrestado de la case LibroSingular
		$this->libroPrestado = LibroSingular::libroPrestado();

		// Como ya sabemos la llamada al metodo LibroSingular::libroPrestado()
		//  nos devolvera null si ya fue instanciada por lo que aqui se
		// detecta si fue instanmciada desde esta clase

		if ($this->libroPrestado == NULL) {

			$this->tenerTibro = FALSE;

		} else {

			$this->tenerTibro = TRUE;
		}
	}

	function retornarLibro() {
		//  El parametro de esta funcion solo resibe una instancia de esta misma clase para que la variable
		//  esta_fuera de la case LibroSingular este en true  y poder  volver a instamnciar la case
		$this->libroPrestado->retornarLibro($this->libroPrestado);
	}
}

/**
 * Initialization
 */

escribirLinea('Comenzar al patrón de singleton');
escribirLinea('');

$libroBorrower1 = new Prestatario();
$libroBorrower2 = new Prestatario();

$libroBorrower1->libroPrestado();
escribirLinea('Prestatario1 pidió pedir prestado el libro');
escribirLinea('Prestatario1 autor y título:');
escribirLinea($libroBorrower1->optenerAutor_y_Titulo());
escribirLinea('');

$libroBorrower2->libroPrestado();
escribirLinea('Prestatario2 pidió pedir prestado el libro');
escribirLinea('Prestatario2 autor y título:');
escribirLinea($libroBorrower2->optenerAutor_y_Titulo());
escribirLinea('');

$libroBorrower1->retornarLibro();
escribirLinea('Prestatario1 devolvió el libro');
escribirLinea('');

$libroBorrower2->libroPrestado();
escribirLinea('Prestatario2 autor y título:');
escribirLinea($libroBorrower1->optenerAutor_y_Titulo());
escribirLinea('');

escribirLinea('Patrón de prueba de prueba final ');
escribirLinea('');
escribirLinea("Gracias a los tutoriales de MitoCode en YouTube, sourcemaking.com y a tutorialspoint.com");

function escribirLinea($texto) {
	echo $texto . '<br/>';
}

// loacalhost\Proyectos\codefuncode\Curso_de_Patrones_de_diseno\00001\php.php