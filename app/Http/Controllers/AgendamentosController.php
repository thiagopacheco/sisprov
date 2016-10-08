<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendamentosRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Agendamento;
use App\Models\Municipio;
use App\Models\Servidor;
use App\Models\Veiculo;
use App\Util\Util;
use App\Http\Requests;
use Illuminate\Http\Request;


class AgendamentosController extends Controller
{

    private $repository;
    /**
     * @var Municipio
     */
    private $municipioRepository;
    /**
     * @var Servidor
     */
    private $servidorRepository;
    /**
     * @var Veiculo
     */
    private $veiculoRepository;

    public function __construct(Agendamento $repository, Municipio $municipioRepository, Servidor $servidorRepository, Veiculo $veiculoRepository)
    {

        $this->repository = $repository;
        $this->municipioRepository = $municipioRepository;
        $this->servidorRepository = $servidorRepository;
        $this->veiculoRepository = $veiculoRepository;
    }

    public function getIndex()
    {
        $dados = $this->repository->paginate();
        return view('agendamentos.index', compact('dados'));
    }

    public function getPendentes()
    {
        $dados = $this->repository->where('status', 'Pendente')->paginate();
        return view('agendamentos.index', compact('dados'));
    }

    public function getAprovados()
    {
        $dados = $this->repository->where('status', 'Aprovado')->paginate();
        return view('agendamentos.index', compact('dados'));
    }

    public function getRecusados()
    {
        $dados = $this->repository->where('status', 'Recusado')->paginate();
        return view('agendamentos.index', compact('dados'));
    }

    public function getCreate()
    {
        $servidores = $this->servidorRepository->lists('nome', 'nome');
        $municipios = $this->municipioRepository->lists('nome', 'nome');
        return view('agendamentos.create', compact('municipios', 'servidores'));
    }

    public function postStore(AgendamentosRequest $request)
    {
        $s = null;
        $m = null;
        $t = null;
        $r = null;

        $servidores = $request->get('servidores');
        $municipios = $request->get('municipios');

        for ($i = 0; $i < count($servidores); $i++) {
            $t = $s;
            $r = $servidores[$i];
            $s = $t . "; " . $r;
        }
        for ($i = 0; $i < count($municipios); $i++) {
            $t = $m;
            $r = $municipios[$i];
            $m = $t . "; " . $r;
        }
        $s = substr($s, 2);
        $m = substr($m, 2);

        $dados = [
            'servidores' => $s,
            'municipios' => $m,
            'data_saida' => Util::formDataToDatabase($request->get('data_saida')),
            'data_retorno' => Util::formDataToDatabase($request->get('data_retorno')),
            'hora_saida' => $request->get('hora_saida'),
            'cod_siad' => trim(Util::formNull($request->get('cod_siad'))),
            'descricao' => trim(Util::formNull($request->get('descricao')))
        ];
        $this->repository->create($dados);
        return redirect('agendamentos')->with('success', 'Agendamento criado com sucesso!');
    }

    public function getShow($id)
    {
        $object = $this->repository->find($id);
        return view('agendamentos.show', compact('object'));
    }

    public function getEdit($id)
    {
        $servidores = $this->servidorRepository->lists('nome', 'nome');
        $municipios = $this->municipioRepository->lists('nome', 'nome');
        $veiculo = $this->veiculoRepository->lists('placa', 'id');
        $motorista = $this->servidorRepository->where('cargo_id', 1)->lists('nome', 'nome');
        $object = $this->repository->find($id);
        $m = explode('; ', $object->municipios);
        $s = explode('; ', $object->servidores);
        return view('agendamentos.update', compact('municipios', 'servidores', 'object', 'm', 's', 'veiculo', 'motorista'));
    }


    public function putUpdate(AgendamentosRequest $request, $id)
    {
        $s = null;
        $m = null;
        $t = null;
        $r = null;

        $servidores = $request->get('servidores');
        $municipios = $request->get('municipios');

        for ($i = 0; $i < count($servidores); $i++) {
            $t = $s;
            $r = $servidores[$i];
            $s = $t . "; " . $r;
        }
        for ($i = 0; $i < count($municipios); $i++) {
            $t = $m;
            $r = $municipios[$i];
            $m = $t . "; " . $r;
        }
        $s = substr($s, 2);
        $m = substr($m, 2);

        $dados = [
            'veiculo_id' => $request->get('veiculo_id'),
            'servidores' => $s,
            'municipios' => $m,
            'data_saida' => Util::formDataToDatabase($request->get('data_saida')),
            'data_retorno' => Util::formDataToDatabase($request->get('data_retorno')),
            'hora_saida' => $request->get('hora_saida'),
            'cod_siad' => trim(Util::formNull($request->get('cod_siad'))),
            'descricao' => trim(Util::formNull($request->get('descricao'))),
            'motorista' => $request->get('motorista'),
            'status' => $request->get('status')
        ];
        $this->repository->find($id)->update($dados);
        return redirect('agendamentos')->with('success', 'Agendamento atualizado com sucesso!');

    }

    public function getDelete($id)
    {
        $object = $this->repository->find($id);
        return view('agendamentos.delete', compact('object'));
    }

    public function deleteDestroy($id)
    {
        $object = $this->repository->find($id);
        if ($object->status != 'Pendente') {
            return redirect("agendamentos/delete/{$id}")->with('error', 'Apenas agendamentos Pendentes podem ser excluídos!');
        }
        $object->delete();
        return redirect("agendamentos")->with('success', 'Agendamento excluído com sucesso!');
    }

    public function postSearch(SearchRequest $request)
    {
        $input = [
            'data_inicial' => Util::formDataToDatabase($request->get('data_inicial')),
            'data_final' => Util::formDataToDatabase($request->get('data_final'))

        ];
        if($request->get('tipo') == 'saida'){
            $dados = $this->repository
                    ->where('data_saida', '>=', $input['data_inicial'])
                    ->where('data_saida', '<=', $input['data_final'])
                    ->paginate();
            return view('agendamentos.index', compact('dados'));
        }
        $dados = $this->repository
            ->where('data_retorno', '>=', $input['data_inicial'])
            ->where('data_retorno', '<=', $input['data_final'])
            ->paginate();
        return view('agendamentos.index', compact('dados'));
    }

    public function putAprovar(Request $request, $id)
    {
        if(auth()->user()->level < 3){
            return redirect("agendamentos/show/{$id}")->with('error','Você não tem permissão suficiente!');
        }
        $dados = [
            'status' => $request->get('status')
        ];
        $this->repository->find($id)->update($dados);
        return redirect('agendamentos')->with('success','Viagem Aprovada');
    }

    public function putRecusar(Request $request, $id)
    {
        if(auth()->user()->level < 3){
            return redirect("agendamentos/show/{$id}")->with('error','Você não tem permissão suficiente!');
        }
        $dados = [
            'status' => $request->get('status')
        ];
        $this->repository->find($id)->update($dados);
        return redirect('agendamentos')->with('success','Viagem Reprovada');
    }
}
