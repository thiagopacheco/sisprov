<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Routing\Controller as BaseController;

class HomeController extends BaseController
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data_atual = date('Y-m-d');
		$data_final = date('Y-m-d', strtotime('+10 days', strtotime($data_atual)));
		$dados = Agendamento::where('data_saida', '>=', $data_atual)
			->where('data_saida','<=',$data_final)
			->where('status','=','Aprovado')
			->paginate();
		return view('home', compact('dados'));
	}
}