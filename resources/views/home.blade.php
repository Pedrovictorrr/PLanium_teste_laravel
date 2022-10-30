@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="row mt-5 mb-5 rounded border shadow bg-white">
                                                    
                        <div class=" d-flex p-1 justify-content-end rounded-top border shadow" style="background-color: #a0a0a0">
                            <button class="btn-danger border btn btn-sm rounded-pill">x</button>
                        </div>
                        @foreach ($dados_info as $plano)
                            @if ($plano['Minimo_vidas']<2)      
                        <div class="col-md-4  p-3">
                            <div class="shadow border bg-light rounded text-center">
                                <div class="panel panel-default text-center p-3">
                                    <div class="panel-heading">
                                      <h3>{{$plano['Nome']}}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p><strong>Até 17 anos| R${{$plano['Faixa1']}},00 p/Beneficiario</strong></p>
                                        <p><strong>17 aos 40 anos|  R${{$plano['Faixa2']}},00 p/Beneficiario</strong></p>
                                        <p><strong>40 anos +|  R${{$plano['Faixa3']}},00 p/Beneficiario</strong></p>
                                    </div>
                                    <div class="panel-footer">
                                         <a class="btn btn-dark" href="{{route('Plans.Forms.get')}}">Orçamento online</a>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
