<?php
// Biblioteca centralizada de casos
return [
  1 => ['titulo'=>'Superficie del Cuadrado','categoria'=>'Áreas planas',
        'enunciado'=>'Calcular la superficie del cuadrado dado el valor de uno de sus lados de 10 metros.',
        'funcion'=>'calcularSuperficieCuadrado','unidad'=>'m²',
        'campos'=>[['lado','Lado (m)',10]]],
  2 => ['titulo'=>'Superficie del Rectángulo','categoria'=>'Áreas planas',
        'enunciado'=>'Calcular la superficie de un rectángulo de 12 metros de base y 5 metros de altura.',
        'funcion'=>'calcularSuperficieRectangulo','unidad'=>'m²',
        'campos'=>[['base','Base (m)',12],['altura','Altura (m)',5]]],
  3 => ['titulo'=>'Superficie del Triángulo','categoria'=>'Áreas planas',
        'enunciado'=>'Calcular la superficie de un triángulo de 8 metros de base y 6 metros de altura.',
        'funcion'=>'calcularSuperficieTriangulo','unidad'=>'m²',
        'campos'=>[['base','Base (m)',8],['altura','Altura (m)',6]]],
  4 => ['titulo'=>'Superficie del Círculo','categoria'=>'Figuras curvas',
        'enunciado'=>'Calcular la superficie de un círculo cuyo radio es de 7 metros.',
        'funcion'=>'calcularSuperficieCirculo','unidad'=>'m²',
        'campos'=>[['radio','Radio (m)',7]]],
];
