<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $proveedores = Proveedor::where('id', '>=', 1)->paginate(50);
        return view('home', [
            'proveedores' => $proveedores
        ]);
    }

}
