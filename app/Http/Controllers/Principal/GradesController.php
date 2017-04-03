<?php

namespace App\Http\Controllers\Principal;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}