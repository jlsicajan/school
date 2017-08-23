<?php

namespace App\Http\Controllers\Principal;

use App\Administrator;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('views_by_role.principal.admins.index');

    }

    public function save(){
        $professor = new User();
        $professor->name = Input::get('name');
        $professor->email = Input::get('email');
        $professor->status = strtoupper(Input::get('status'));
        $professor->password = bcrypt('clave');
        $professor->save();
        $professor->attachRole(Role::where('name', '=', 'Administradora')->first());

        $data = array('message' => 'Administrador ingresado correctamente.');
        return $data;
    }

    public function getAdministrators(){
        $administrators = User::join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->where('roles.name', '=', 'Administradora')
            ->select('users.id', 'users.name', 'users.email', 'users.status')
            ->get();

        $data = [];
        foreach ($administrators as $administrator){
            if($administrator->status == 1){
                $status = '<span class="label label-success">Activo</span>';
            }else{
                $status = '<span class="label label-danger">Inactivo</span>';
            }
            array_push($data, ['DT_RowClass' => 'tr-content', 'DT_RowId' => $administrator->id, $administrator->name, $administrator->email, $status]);
        }
        return ['data' => $data];
    }
}
