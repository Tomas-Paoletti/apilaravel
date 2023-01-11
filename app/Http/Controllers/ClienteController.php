<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Dotenv\Exception\ValidationException;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Cliente::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




try
{
    $request->validate( [
        'nombres' => 'required',
        'apellido' => 'required',
    ]);
        $cliente = new Cliente;
        $cliente->nombres =$request->nombres;
        $cliente->apellido =$request->apellido;
        $cliente->save();//guarda los datos elegidos

        return $cliente;
     } catch (ValidationValidationException $e) {
            return response()->json($e->errors(), 422);
        };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {

        return $cliente;//$cliente es el id del cliente
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {

try
{
    $request->validate( [
        'nombres' => 'required',
        'apellido' => 'required',
    ]);

        $cliente->nombres =$request->nombres;
        $cliente->apellido =$request->apellido;
        $cliente->update();//guarda los datos elegidos

        return $cliente;
     } catch (ValidationValidationException $e) {
            return response()->json($e->errors(), 422);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);//buscar cliente por id
        if(is_null($cliente)){
            response()->json('No se pudo realizar la operacion',404);
        }
        $cliente->delete();
        return response()->noContent();//devuelve un 204 al elimianr el archivo
    }
}
