<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServidoresRequest;
use App\Models\Cargo;
use App\Util\Util;
use Illuminate\Http\Request;
use App\Models\Servidor;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class ServidoresController extends Controller
{
    private $repository;
    private $cargoRepository;

    public function __construct(Servidor $repository, Cargo $cargoRepository)
    {
        $this->repository = $repository;
        $this->cargoRepository = $cargoRepository;
    }

    public function index()
    {
        $dados = $this->repository->orderBy('nome','asc')->paginate();
        return view('servidores.index', compact('dados'));
    }

    public function create()
    {
        $cargos = $this->cargoRepository->orderBy('nome','asc')->lists('nome', 'id');
        return view('servidores.create', compact('cargos'));
    }

    public function store(ServidoresRequest $request)
    {
        $dados = [
            'nome' => trim(Util::strUpper($request->input('nome'))),
            'cpf' => Util::formNull(trim(Util::formCpfToDatabase($request->get('cpf')))),
            'cargo_id' => $request->get('cargo_id'),
            'nucleo' => $request->get('nucleo'),
            'telefone' => trim($request->get('telefone'))
        ];
        $this->repository->create($dados);
        return redirect()->route('servidores.index')->with('success','Servidor cadastrado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $cargos = $this->cargoRepository->orderBy('nome','asc')->lists('nome', 'id');
        $object = $this->repository->find($id);
        return view('servidores.update', compact('object','cargos'));
    }

    public function update(ServidoresRequest $request, $id)
    {
        $dados = [
            'nome' => trim(Util::strUpper($request->input('nome'))),
            'cpf' => Util::formNull(trim(Util::formCpfToDatabase($request->get('cpf')))),
            'cargo_id' => $request->get('cargo_id'),
            'nucleo' => $request->get('nucleo'),
            'telefone' => trim($request->get('telefone'))
        ];
        $this->repository->find($id)->update($dados);
        return redirect()->route('servidores.index')->with('success','Servidor atualizado com sucesso!');
    }

    public function delete($id)
    {
        $object = $this->repository->find($id);
        return view('servidores.delete', compact('object'));
    }

    public function destroy($id)
    {
        $this->repository->find($id)->delete();
        return redirect()->route('servidores.index')->with('success', 'Servidor excluído com sucesso');
    }
}
