<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCursoRequest;
use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\Support\Str;
class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::orderBy('id', 'desc')->paginate(10);
        return view('cursos.index', compact('cursos'));
    }
    public function create()
    {
        return view('cursos.create');
    }
    public function store(StoreCursoRequest $request)
    {
        $curso = Curso::create($request->all() + ['slug' => Str::slug($request['name'], '-')]);
        return redirect()->route('cursos.show', $curso);
    }
    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }
    public function update(StoreCursoRequest $request, Curso $curso)
    {
        $curso->update($request->all() + ['slug' => Str::slug($request['name'], '-')]);
        return redirect()->route('cursos.show', $curso);
    }
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route('cursos.index');
    }
    public function showmycursos()
    {
        $headName = ['#', 'Name', 'Slug', 'Description', 'Category', 'Date', 'Options'];
        $cursos = Curso::orderBy('id', 'desc')->paginate(5);
        return view('cursos.mycursos', compact('cursos', 'headName'));
    }
}
