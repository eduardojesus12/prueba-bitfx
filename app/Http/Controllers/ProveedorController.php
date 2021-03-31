<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Proveedor;
use App\Imports\ProveedoresImport;

class ProveedorController extends Controller
{
    public function load(Request $request) {
        $request->validate([
            'proveedores' => 'required|mimes:csv,txt'
        ]);

        $proveedores = $request->file('proveedores');
        try {
            $prov= \Excel::import(new ProveedoresImport, $proveedores);
            return redirect()->route('home')->with(['message' => 'Se cargaron los proveedores correctamente']);
        } catch(Exception $e) {
            return redirect()->route('home')->with(['error' => 'Error al cargar proveedores']);
        }

    
        // return redirect()->route('home')->with(['message' => 'Se cargaron los proveedores correctamente']);
    }

    public function accept($id) {
        $proveedor = Proveedor::find($id);

        if($proveedor) {
            $proveedor->aceptado = 1;
            $proveedor->rechazado = 0;
            $proveedor->save();

            return redirect()->route('home')->with(['message' => 'Proveedor aceptado']);
        }

        return redirect()->route('home')->with(['error' => 'Error al aceptar proveedor']);


    }

    public function reject($id) {
        $proveedor = Proveedor::find($id);

        if($proveedor) {
            $proveedor->rechazado = 1;
            $proveedor->aceptado = 0;
            $proveedor->save();

            return redirect()->route('home')->with(['error' => 'Proveedor Rechazado']);
        }

        return redirect()->route('home')->with(['error' => 'Error al aceptar proveedor']);


    }
}
