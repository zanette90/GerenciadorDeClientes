<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('clientes.cadastro');
    }

    public function create(Request $request) {
        $request->validate([
            'name'       => 'required|string',
            'documento'  => 'required|string',
            'telefone'   => 'required|string',
            'email'      => 'required|email',
            'cep'        => 'required|string',
            'rua'        => 'required|string',
            'bairro'     => 'required|string',
            'cidade'     => 'required|string',
            'estado'     => 'required|string|max:2',
            'numero'     => 'required|string',
        ]);

        Cliente::create([
            'name'       => $request->name,
            'documento'  => $request->documento,
            'telefone'   => $request->telefone,
            'email'      => $request->email,
            'cep'        => $request->cep,
            'rua'          => $request->rua,
            'bairro'     => $request->bairro,
            'cidade' => $request->cidade,
            'estado'         => $request->estado,
            'numero'    => $request->numero
        ]);


        return redirect()->route('cliente.salvar')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function list() {
        $clientes = Cliente::all();

        return view('clientes.listagem', compact('clientes'));
    }

}
