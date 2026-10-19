<?php
// Variables globales y zona horaria
date_default_timezone_set('America/Lima');
define('APP_NOMBRE', 'Resolución de Ejercicios - Geometría');
define('APP_ANIO', date('Y'));
if (session_status() === PHP_SESSION_NONE) session_start();
