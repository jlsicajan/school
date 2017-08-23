<?php

namespace App\Http\Controllers\Principal;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;

class ProfessorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('views_by_role.principal.professor.index');
    }

    public function save()
    {
       $professor = new User();
       $professor->name = Input::get('name');
       $professor->email = Input::get('email');
       $professor->password = bcrypt('clave');
       $professor->save();
       $professor->attachRole(Role::where('name', '=', 'Catedratico')->first());

        $data = array('message' => 'Dato ingresado correctamente.');
        return $data;
    }

    public function getProfessors(){
        $professors = User::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('roles.name', '=', 'Catedratico')
            ->select('users.id', 'users.name', 'users.email')
            ->get();

        $data = [];
        foreach ($professors as $professor){
            array_push($data, ['DT_RowClass' => 'tr-content', 'DT_RowId' => $professor->id, $professor->name, $professor->email]);
        }
        return ['data' => $data];
    }
}
