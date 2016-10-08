<?php

namespace App\Http\Controllers;


use App\Http\Requests\VeiculosRequest;
use App\Models\Agendamento;
use App\Models\Veiculo;
use App\Util\Util;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VeiculosController extends Controller
{
    private $repository;
    private $agendamentoRepository;

    public function __construct(Veiculo $repository, Agendamento $agendamentoRepository)
    {
        $this->repository = $repository;
        $this->agendamentoRepository = $agendamentoRepository;
    }

    public function index()
    {
        $dados = $this->repository->paginate();
        return view('veiculos.index', compact('dados'));
    }

    public function create()
    {
        return view('veiculos.create');
    }

    public function store(VeiculosRequest $request)
    {
        $dados = [
            'placa' => Util::strUpper($request->input('placa')),
            'modelo' => trim(Util::strUpper($request->input('modelo'))),
            'ano' => $request->input('ano'),
            'marca' => trim(Util::strUpper($request->input('marca')))
        ];
        /*$validator = Validator::make($dados, [
            'placa' => 'required|min:8|max:8'
        ]);
        if ($validator->fails()) {
            return redirect()->route('veiculos.create')->withInput()->withErrors($validator);
        }*/
        try {
            $this->repository->create($dados);
            DB::commit();
            return redirect()->route('veiculos.index')->with('success', 'Veículo adicionado com sucesso!');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $object = $this->repository->find($id);
        return view('veiculos.update', compact('object'));
    }

    public function update(VeiculosRequest $request, $id)
    {
        $dados = [
            'placa' => Util::strUpper($request->input('placa')),
            'modelo' => trim(Util::strUpper($request->input('modelo'))),
            'ano' => $request->input('ano'),
            'marca' => trim(Util::strUpper($request->input('marca')))
        ];

        try {
            $this->repository->find($id)->update($dados);
            return redirect()->route('veiculos.index')->with('success', 'Veículo atualizado com sucesso!');
        } catch (\Exception $e) {
            throw $e;
        }

    }

    public function delete($id)
    {
        $object = $this->repository->find($id);
        return view('veiculos.delete', compact('object'));
    }

    public function destroy($id)
    {
        $agendamentos = $this->agendamentoRepository->where('veiculo_id', $id)->count();
        if($agendamentos == 0) {
            try {
                $this->repository->find($id)->delete();
                return redirect()->route('veiculos.index')->with('success', 'Veículo removido com sucesso');
            } catch (\Exception $e) {
                throw $e;
            }
        }else{
            return redirect()->route('veiculos.delete', [$id])->with('error', 'Você não pode excluir um veículo associado a um agendamento.');
        }
    }
}
