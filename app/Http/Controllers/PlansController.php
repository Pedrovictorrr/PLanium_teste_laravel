<?php

namespace App\Http\Controllers;

use App\Models\plans;
use Illuminate\Http\Request;


class PlansController extends Controller
{

    public function index()
    { 
        // Juntando preços e planos retornados do JSON para apresentar na view principal
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
        return view ('index',compact('dados_info'));
    }
    public function PlansFormsGet()
    {   
        // Decode plans para primeiro formulario de pre cadastro, ultilizando para consulta e values da view
        $json_plans = file_get_contents("json/plans.json");
        $dados_plans_decode = json_decode($json_plans);
        return view('forms.form_plans', compact('dados_plans_decode'));
    }

    // Pegando valores do formulario inicial e enviando para rota do formulario de beneficiarios
    public function PlansFormsPost(Request $request)
    {
        $pre_cadastro = [
            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'cod_plano' => $request->plano,
            'total_beneficiarios' => $request->total_beneficiarios
        ];
        return redirect()->route('Beneficiario.Forms.get', compact('pre_cadastro'));
    }


    // Salvando valores e setando array para carregar esses valores
    public function BeneficiarioFormsGet(Request $request)
    {
        //Pegando info do pre cadastro
        $pre_cadastro = $request->all();
        foreach ($pre_cadastro as $cad) {
            $cadastro['nome'] = $cad['nome'];
            $cadastro['sobrenome'] = $cad['sobrenome'];
            $cadastro['cod_plano'] = $cad['cod_plano'];
            $cadastro['total_beneficiarios'] = $cad['total_beneficiarios'];
        }

        $json_prices = file_get_contents("json/prices.json");
        $dados_prices_decode = json_decode($json_prices);

        //Juntando plano escolhido com preços organizando em um array para trabalhar o pre_cadastro
        $flag =0;
        foreach ($dados_prices_decode as $prices) {
            if ($cadastro['cod_plano'] == $prices->codigo && $flag == 0) {
                if ($cadastro['cod_plano'] == 1 && $cadastro['total_beneficiarios'] <= 4) {
                    $plano_escolhido = [
                        'nome' => $cadastro['nome'],
                        'faixa1' => $dados_prices_decode[0]->faixa1,
                        'faixa2' => $dados_prices_decode[0]->faixa2,
                        'faixa3' => $dados_prices_decode[0]->faixa3,
                        'codigo' => $dados_prices_decode[0]->codigo,
                    ];
                } elseif ($cadastro['cod_plano'] == 1 && $cadastro['total_beneficiarios'] > 4) {
                    $plano_escolhido = [
                        'nome' => $cadastro['nome'],
                        'faixa1' => $dados_prices_decode[1]->faixa1,
                        'faixa2' => $dados_prices_decode[1]->faixa2,
                        'faixa3' => $dados_prices_decode[1]->faixa3,
                        'codigo' => $dados_prices_decode[1]->codigo,
                    ];
                } elseif ($cadastro['cod_plano'] == 6 && $cadastro['total_beneficiarios'] <= 1) {
                    $plano_escolhido = [
                        'nome' => $cadastro['nome'],
                        'faixa1' => $dados_prices_decode[6]->faixa1,
                        'faixa2' => $dados_prices_decode[6]->faixa2,
                        'faixa3' => $dados_prices_decode[6]->faixa3,
                        'codigo' => $dados_prices_decode[6]->codigo,
                    ];
                } else {
                    $plano_escolhido = [
                        'nome' => $cadastro['nome'],
                        'faixa1' => $prices->faixa1,
                        'faixa2' => $prices->faixa2,
                        'faixa3' => $prices->faixa3,
                        'codigo' => $prices->codigo,
                    ];
                }
                $flag = 1;
            }
        }
        return view('forms.form_beneficiarios', compact('cadastro', 'plano_escolhido'));
    }


    public function BeneficiarioFormsPost(Request $request)
    {   
        $beneficiarios = NULL;
      
        for($i=0;$i<$request->total_beneficiarios;$i++){
           
            // Atribuindo variaveis aos requests
            $nome = $request['nome'.$i];
            $idade = $request['idade'.$i];
            $cod_plano = $request['cod_plano'];
            $total_beneficiarios = $request['total_beneficiarios'];
            
            // Tratando idade da cada beneficiario
            $idade = date_create($idade);
            $idade = $idade->format('Y');
            $idade = date('Y') - $idade;
           
            // Verificando a q faixa cada beneficiario pertence 
            if($idade <= 17){
                $faixa = $request->faixa1;
            }elseif($idade > 17 && $idade <= 40){
                $faixa = $request->faixa2;
            }else{
                $faixa = $request->faixa3;
            }

            
            //Separando array por pessoa.
            if($beneficiarios == NULL){
                $beneficiarios = array(
                    array('Nome' => $nome , 'idade' => $idade , 'Valor' => $faixa ,'cod_plano' => $cod_plano),
                );
                }else{
                   array_push($beneficiarios,
                        array('Nome' => $nome , 'idade' => $idade , 'Valor' => $faixa ,'cod_plano' => $cod_plano),
                    );
                }
                
        }

        // Salvando Beneficiarios em um arquivo JSON
         $arquivo = 'json/beneficiarios.json';
         file_put_contents($arquivo, json_encode($beneficiarios));

        return redirect()->route('Orcamento.Forms.get',compact('beneficiarios','total_beneficiarios'));
    }
    public function OrcamentoFormsGet(Request $request)
    { 
       
        $total_beneficiarios = $request->total_beneficiarios;
        $beneficiarios = $request->beneficiarios;
        $titular = null;
        $valor_total = 0;
        $json = null;

        // Separando em array todos beneficiarios e diferenciando do titular da conta.
        foreach($beneficiarios as $valor){
            $valor_total += $valor['Valor'];
            if($titular == null){
            $titular = $valor['Nome'];
            }
            if($json == null){
                $json = array(
                array('Nome' => $valor['Nome'] , 'idade' => $valor['idade'] , 'Valor' => $valor['Valor'] ,'cod_plano' => $valor['cod_plano']),
            );  
            } else{
                array_push($json, array('Nome' => $valor['Nome'] , 'idade' => $valor['idade'] , 'Valor' => $valor['Valor'] ,'cod_plano' => $valor['cod_plano']),
            );   
            }
          
        }
        array_push($json, array('Valor_total' => $valor_total));
        // Salvando proposta com dados finais do formulario
        $arquivo = 'json/proposta.json';
        file_put_contents($arquivo, json_encode($json));
        return view('forms.form_orçamento',compact('beneficiarios','valor_total','titular'));
    }
}
