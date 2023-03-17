<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
         return 'Bienvenido a la pagina cursos';
    }
    public function create()
    {
        return 'Bienvenido a la pagina de crear cursos';
    }
    public function show($curso)
    {
        return "Bienvenido al curso: $curso";
    }
}
