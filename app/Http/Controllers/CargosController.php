<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargosRequest;
use App\Models\Cargo;
use App\Models\Servidor;
use App\Util\Util;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CargosController extends Controller
{
    private $repository;
    private $servidorRepository;

    public function __construct(Cargo $repository, Servidor $servidorRepository)
    {
        $this->repository = $repository;
        $this->servidorRepository = $servidorRepository;
    }

    public function index()
    {
        $dados = $this->repository->orderBy('nome','asc')->paginate();
        return view('cargos.index', compact('dados'));
    }

    public function create()
    {
        return view('cargos.create');
    }

    public function store(CargosRequest $request)
    {
        $dados = [
            'nome'=>trim(Util::strUpper($request->input('nome')))
        ];
        $this->repository->create($dados);
        return redirect()->route('cargos.index')->with('success','Cargo criado com sucesso!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $object = $this->repository->find($id);
        return view('cargos.update',compact('object'));
    }

    public function update(Request $request, $id)
    {
        $dados = [
            'nome'=>trim(Util::strUpper($request->input('nome')))
        ];
        $this->repository->find($id)->update($dados);
        return redirect()->route('cargos.index')->with('success','Cargo atualizado com sucesso!');
    }

    public function delete($id)
    {
        $object=$this->repository->find($id);
        return view('cargos.delete',compact('object'));
    }

    public function destroy($id)
    {
        $servidor = $this->servidorRepository->where('cargo_id', $id)->count();
        if($servidor == 0){
            $this->repository->find($id)->delete();
            return redirect()->route('cargos.index')->with('success', 'Cargo excluído com sucesso!');
        }else{
            return redirect()->route('cargos.delete', [$id])->with('error', 'Você não pode excluir cargos já associados a servidores.');
        }
    }
}
