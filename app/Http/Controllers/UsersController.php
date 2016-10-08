<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersPasswordRequest;
use App\Http\Requests\UsersRequest;
use App\Models\Cargo;
use App\Models\User;
use App\Util\Util;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    private $repository;
    private $cargoRepository;

    public function __construct(User $repository, Cargo $cargoRepository)
    {
        $this->repository = $repository;
        $this->cargoRepository = $cargoRepository;
    }

    public function index()
    {
        $dados = $this->repository->orderBy('nome','asc')->paginate();
        return view('users.index', compact('dados'));
    }

    public function create()
    {
        $cargos = $this->cargoRepository->lists('nome','id');
        return view('users.create', compact('cargos'));
    }

    public function store(UsersRequest $request)
    {
        $dados = [
            'nome'=>trim(Util::strUpper($request->input('nome'))),
            'email'=> trim(strtolower($request->input('email'))),
            'password'=> bcrypt($request->input('password')),
            'level'=> $request->input('level')
        ];
        $this->repository->create($dados);
        return redirect()->route('users.index')->with('success','Usuário criado com sucesso!');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $object = $this->repository->find($id);
        return view('users.update',compact('object'));
    }

    public function update(UsersRequest $request, $id)
    {
        $dados = [
            'nome'=>trim(Util::strUpper($request->input('nome'))),
            'email'=> trim(strtolower($request->input('email'))),
            'level'=> $request->input('level'),
        ];
        $this->repository->find($id)->update($dados);
        return redirect()->route('users.index')->with('success','Usuário atualizado com sucesso!');
    }

    public function delete($id)
    {
        $object=$this->repository->find($id);
        return view('users.delete',compact('object'));
    }

    public function destroy($id)
    {
        $this->repository->find($id)->delete();
        return redirect()->route('users.index')->with('success', 'Usuário excluído com sucesso!');
    }

    public function password($id)
    {
        $object = $this->repository->find($id);
        return view('users.password', compact('object'));
    }

    public function passwordUpdate(UsersPasswordRequest $request, $id)
    {
        $user = $this->repository->find($id);

        if(!Hash::check($request->input('password_atual'), $user->password)){
            return redirect()->route('users.password', $user->id)->with('error','Senha atual não confere');
        }

        $dados = [
          'password' => bcrypt($request->input('password'))
        ];
        $user->update($dados);
        return redirect('/')->with('success', 'Senha atualizada com sucesso!');
    }

}
