<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $json_plans = file_get_contents("json/plans.json");
        $dados_plans_decode = json_decode($json_plans);
        $json_prices = file_get_contents("json/prices.json");
        $dados_prices_decode = json_decode($json_prices);
        $dados_info = null;
        foreach ($dados_prices_decode as $dados) {
            foreach ($dados_plans_decode as $planos) {
                if ($dados->codigo == $planos->codigo) {
                    $dados->nome = $planos->nome;
                    if ($dados_info == null) {
                        $dados_info = array(
                            ['Nome' => $dados->nome, 'Faixa1' => $dados->faixa1, 'Faixa2' => $dados->faixa2, 'Faixa3' => $dados->faixa3, 'Codigo' => $dados->codigo, 'Minimo_vidas' => $dados->minimo_vidas]
                        );
                    } else{
                        array_push(
                            $dados_info ,
                                ['Nome' => $dados->nome, 'Faixa1' => $dados->faixa1, 'Faixa2' => $dados->faixa2, 'Faixa3' => $dados->faixa3, 'Codigo' => $dados->codigo, 'Minimo_vidas' => $dados->minimo_vidas]
                            
                        );
                    }
                }
            }
        }
       
        return view('index',compact('dados_info'));
    }
}
