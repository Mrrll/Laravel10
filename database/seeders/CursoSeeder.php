<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Curso;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $curso = new Curso();
        $curso->name = "Laravel";
        $curso->description = "El mejor Framework PHP";
        $curso->categoria = "Desarrollo Web";
        $curso->save();
    }
}
