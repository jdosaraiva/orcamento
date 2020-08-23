<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Conta;
use Illuminate\Http\Request;

class ContasController extends Controller
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
            $contas = Conta::where('conta', 'LIKE', "%$keyword%")
                ->orWhere('codigo', 'LIKE', "%$keyword%")
                ->orWhere('descricao', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contas = Conta::latest()->paginate($perPage);
        }

        return view('admin.contas.index', compact('contas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.contas.create');
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
			'conta' => 'required|max:15',
			'codigo' => 'required|max:2'
		]);
        $requestData = $request->all();
        
        Conta::create($requestData);

        return redirect('admin/contas')->with('flash_message', 'Conta added!');
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
        $conta = Conta::findOrFail($id);

        return view('admin.contas.show', compact('conta'));
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
        $conta = Conta::findOrFail($id);

        return view('admin.contas.edit', compact('conta'));
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
			'conta' => 'required|max:15',
			'codigo' => 'required|max:2'
		]);
        $requestData = $request->all();
        
        $conta = Conta::findOrFail($id);
        $conta->update($requestData);

        return redirect('admin/contas')->with('flash_message', 'Conta updated!');
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
        Conta::destroy($id);

        return redirect('admin/contas')->with('flash_message', 'Conta deleted!');
    }
}
