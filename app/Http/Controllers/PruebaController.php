<?php

namespace LaraDex\Http\Controllers;

use LaraDex\Http\Controllers\Controller;

class PruebaController extends Controller {
    public function prueba($param){
        return 'estoy dentro de pruebaController :D'. $param;
    }
}