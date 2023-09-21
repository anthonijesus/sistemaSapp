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
        $curso = new Curso;

        $curso->nombre = "Laravel";
        $curso->descripcion = "Cursos de Laravel";
        $curso->profesor= "Juan";

        $curso->save();

        $curso2 = new Curso;

        $curso2->nombre = "Laravel";
        $curso2->descripcion = "Cursos de Laravel";
        $curso2->profesor= "Juan";

        $curso2->save();

        $curso3 = new Curso;

        $curso3->nombre = "Laravel";
        $curso3->descripcion = "Cursos de Laravel";
        $curso3->profesor= "Juan";

        $curso3->save();
    }
}
