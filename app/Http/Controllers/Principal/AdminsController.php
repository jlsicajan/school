<?php

namespace App\Http\Controllers\Principal;

use App\Administrator;
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
        $grades = new Administrator();
        $grades->name = strtoupper(Input::get('name'));
        $grades->status = strtoupper(Input::get('status'));
        $grades->email = strtoupper(Input::get('email'));
        $grades->save();

        $data = array('message' => 'Administrador ingresado correctamente.');
        return $data;
    }

    public function getAdministrators(){
        $administrators = Administrator::all();

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
