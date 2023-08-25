<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class CrudController extends Controller
{
    public function index(){
        $datos = DB::select("select * from customer");
        return view("welcome")->with("datos", $datos);
    }

    public function create(Request $request){
        $sql=DB::insert(" insert into customer(customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update) values(?,?,?,?,?,?,?,?,?)" , [
            $request->txtCode,
            $request->txtStore,
            $request->txtFName,
            $request->txtLName,
            $request->txtEmail,
            $request->txtAddress,
            $request->txtActive,
            $request->txtCDate,
            $request->txtLUpdate
        ]);
        if($sql == true){
            return back()->with("correcto", "Cliente correctamente registrado");
        }else{
            return back()->with("incorrecto", "No se pudo registrar");
        }
    }

    public function update(Request $request){
        try {
            $sql=DB::update(" update customer set store_id=?, first_name=?, last_name=?, email=?, address_id=?, active=?, create_date=?, last_update=? where customer_id=?)",
            [
                $request->txtStore,
                $request->txtFName,
                $request->txtLName,
                $request->txtEmail,
                $request->txtAddress,
                $request->txtActive,
                $request->txtCDate,
                $request->txtLUpdate
            ]);
            if($sql == 0){
                $sql = 1;
            }
        } catch (\Throwable $th) {
            $sql = 0;
        }
        if($sql == true){
            return back()->with("correcto", "Cliente correctamente modificado");
        }else{
            return back()->with("incorrecto", "No se pudo modificar");
        }

    }

    public function delete($id){
        try {
            $sql = DB::delete("delete * from customer where customer_id=$id");
        } catch (\Throwable $th) {
            $sql=0;
        }
        if($sql == true){
            return back()->with("correcto", "Cliente correctamente eliminado");
        }else{
            return back()->with("incorrecto", "No se pudo eliminar");
        }
    }
}
