<?php

namespace App\Http\Controllers\Principal;

use App\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Yajra\Datatables\Facades\Datatables;

class GradesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('views_by_role.principal.grades.index');
    }

    public function save()
    {
        $grades = new Grade();
        $grades->name = strtoupper(Input::get('name'));
        $grades->save();

        $data = array('message' => 'Dato ingresado correctamente.');
        return $data;
    }

    public function getGrades(){
        $grades = Grade::all();

        $data = [];
        foreach ($grades as $grade){
            array_push($data, ['DT_RowClass' => 'tr-content', 'DT_RowId' => $grade->id, $grade->name]);
        }
        return ['data' => $data];
    }


}
