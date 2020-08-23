<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Conta;

use App\ItemOrcamento;
use Illuminate\Http\Request;

class ItemOrcamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $itemorcamentos = ItemOrcamento::where('nome', 'LIKE', "%$keyword%")
                ->orWhere('conta_id', 'LIKE', "%$keyword%")
                ->orWhere('data_vencimento', 'LIKE', "%$keyword%")
                ->orWhere('valor', 'LIKE', "%$keyword%")
                ->orWhere('data_pagamento', 'LIKE', "%$keyword%")
                ->orWhere('descricao', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $itemorcamentos = ItemOrcamento::latest()->paginate($perPage);
        }

        return view('admin.item-orcamentos.index', compact('itemorcamentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $contas = Conta::all(['id','conta']);

        return view('admin.item-orcamentos.create', compact('contas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'nome' => 'required|max:30',
			'conta_id' => 'required',
			'data_vencimento' => 'required',
			'valor' => 'required'
		]);
        $requestData = $request->all();
        
        ItemOrcamento::create($requestData);

        return redirect('admin/item-orcamentos')->with('flash_message', 'ItemOrcamento added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $itemorcamento = ItemOrcamento::findOrFail($id);

        return view('admin.item-orcamentos.show', compact('itemorcamento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $contas = Conta::all(['id','conta']);

        $itemorcamento = ItemOrcamento::findOrFail($id);

        return view('admin.item-orcamentos.edit', compact('itemorcamento','contas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'nome' => 'required|max:30',
			'conta' => 'required',
			'data_vencimento' => 'required',
			'valor' => 'required'
		]);
        $requestData = $request->all();
        
        $itemorcamento = ItemOrcamento::findOrFail($id);
        $itemorcamento->update($requestData);

        return redirect('admin/item-orcamentos')->with('flash_message', 'ItemOrcamento updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        ItemOrcamento::destroy($id);

        return redirect('admin/item-orcamentos')->with('flash_message', 'ItemOrcamento deleted!');
    }
}
