<?php

use Illuminate\Database\Seeder;

class AuxiliarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('deficiencias')->insert([
            ['codigo' => '01', 'deficiencia' => 'TGD', 'descricao' => 'teste'],
            ['codigo' => '02', 'deficiencia' => 'AUTAS HABILIDADES', 'descricao' => 'teste'],
            ['codigo' => '03', 'deficiencia' => 'DEFICIÊNCIA AUDITIVA', 'descricao' => 'teste'],
            ['codigo' => '04', 'deficiencia' => 'DEFICIÊNCIA AUDITIVA MISTA', 'descricao' => 'teste'],
            ['codigo' => '05', 'deficiencia' => 'DEFICIÊNCIA AUDITIVA NEURAL', 'descricao' => 'teste'],
            ['codigo' => '06', 'deficiencia' => 'DIFICIÊNCIA AUDITIVA SENSORIONEURAL', 'descricao' => 'teste'],
            ['codigo' => '07', 'deficiencia' => 'DEFICIÊNCIA FÍSICA','descricao' => 'teste'],
            ['codigo' => '08', 'deficiencia' => 'DEFICIÊNCIA FÍSICA E PSÍQUICA', 'descricao' => 'teste'],
            ['codigo' => '09', 'deficiencia' => 'DEFICIÊNCIA INTELECTUAL','descricao' => 'teste'],
            ['codigo' => '10', 'deficiencia' => 'DEFICIÊNCIA MENTAL', 'descricao' => 'teste'],
            ['codigo' => '11', 'deficiencia' => 'DEFICIÊNCIA MÚLTIPLA', 'descricao' => 'teste'],
            ['codigo' => '12', 'deficiencia' => 'DEFICIÊNCIA SENSORIAL E PSÍQUICA', 'descricao' => 'teste'],
            ['codigo' => '13', 'deficiencia' => 'RETARDO MENTAL LEVE', 'descricao' => 'teste'],
            ['codigo' => '14', 'deficiencia' => 'RETARDO MENTAL MODERADO', 'descricao' => 'teste'],
            ['codigo' => '15', 'deficiencia' => 'RETARDO MENTAL PROFUNDO', 'descricao' => 'teste']
             
        ]);

       DB::table('turmas')->insert([
            ['codigo' => '01', 'turma' => 'DEFICIENTES', 'descricao' => 'teste'],
            ['codigo' => '02', 'turma' => 'EAD', 'descricao' => 'teste'],
            ['codigo' => '03', 'turma' => 'INFANTIL', 'descricao' => 'teste']
            
        ]);

    }
}
