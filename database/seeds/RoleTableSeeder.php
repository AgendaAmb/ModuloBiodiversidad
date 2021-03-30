<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Rol();
        $role->nombre = 'administrador';
        $role->descripcion = 'Control de todas las características y funcionalidades del módulo ';
        $role->save();
        $role = new Rol();
        $role->nombre = 'Consultor técnico';
        $role->descripcion = 'Especialista en especímenes de la biodiversidad y requiere autenticar su ingreso al módulo.';
        $role->save();
        $role = new Rol();
        $role->nombre = 'Gestor';
        $role->descripcion = 'Responsable de ingresar la información pertinente de cada espécimen de la biodiversidad.';
        $role->save();
        $role = new Rol();
        $role->nombre = 'Coordinador';
        $role->descripcion = 'Responsable de validar la información recabada y otorgar la autenticidad de la información ingresada a la Base de Datos.';
        $role->save();
        $role = new Rol();
        $role->nombre = 'JefeJardinero';
        $role->descripcion = 'Responsable de asignar tareas para el personal de jardinería ';
        $role->save();
        $role = new Rol();
        $role->nombre = 'Supervisor';
        $role->descripcion = 'Especialista en especímenes de biodiversidad que consulta indicadores, información y seguimiento de tareas.';
        $role->save();
        $role = new Rol();
        $role->nombre = 'Ninguno';
        $role->descripcion = 'Rol para asignar a las personas que se acaban de registrar';
        $role->save();
      
    }
}
