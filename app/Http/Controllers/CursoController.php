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
        try {
            Curso::create($request->all() + ['slug' => Str::slug($request['name'], '-')]);
            return redirect()->route('cursos.mycursos')->with('message', [
                    'type' => 'success',
                    'title' => 'Éxito !',
                    'message' => 'El Curso a sido creado correctamente.',
                ]);
        } catch (\Throwable $th) {
             return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
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
        try {
            $curso->update($request->all() + ['slug' => Str::slug($request['name'], '-')]);
            return redirect()->route('cursos.mycursos')->with('message', [
                    'type' => 'info',
                    'title' => 'Éxito !',
                    'message' => 'El Curso a sido actualizado correctamente.',
                ]);
        } catch (\Throwable $th) {
             return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
    public function destroy(Curso $curso)
    {
        try {
            $curso->delete();
            return redirect()->route('cursos.mycursos')->with('message', [
                    'type' => 'warning',
                    'title' => 'Éxito !',
                    'message' => 'El Curso a sido eliminado correctamente.',
                ]);
        } catch (\Throwable $th) {
            return back()->with('message', [
                'type' => 'danger',
                'title' => 'Error !',
                'message' => $th,
            ]);
        }
    }
    public function showmycursos()
    {
        $headName = ['#', 'Name', 'Slug', 'Description', 'Category', 'Date', 'Options'];
        $cursos = Curso::orderBy('id', 'desc')->paginate(5);
        return view('cursos.mycursos', compact('cursos', 'headName'));
    }
}
