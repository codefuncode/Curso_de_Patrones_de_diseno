<?php

include "./LibroSingular.php";

// imprimir('OK');
/**
 * Initialization
 */

imprimir('Comenzar al patrón de singleton');
imprimir('');

$Prestatario_1 = new Prestatario();
$Prestatario_2 = new Prestatario();

$Prestatario_1->libroPrestado();

imprimir('Prestatario_1 pidió pedir prestado el libro');
imprimir('Prestatario_1 autor y título:');
imprimir($Prestatario_1->optenerNombre_y_Titulo());
imprimir('');

$Prestatario_2->libroPrestado();
imprimir('Prestatario2 pidió pedir prestado el libro');
imprimir('Prestatario2 autor y título:');
imprimir($Prestatario_2->optenerNombre_y_Titulo());
imprimir('');

$Prestatario_1->retornarLibro();
imprimir('Prestatario_1 devolvió el libro');
imprimir('');

$Prestatario_2->libroPrestado();
imprimir('Prestatario2 autor y título:');
imprimir($Prestatario_2->optenerNombre_y_Titulo());
imprimir('');

imprimir('Patrón de prueba de prueba final ');
imprimir('');
imprimir("Gracias a los tutoriales de MitoCode en YouTube, sourcemaking.com y a tutorialspoint.com");
// http://localhost/Proyectos/codefuncode/Curso_de_Patrones_de_diseno/00001/php.php