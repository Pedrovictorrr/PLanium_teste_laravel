<!DOCTYPE html>
<html lang="en">

<head>
 @include("sections/header_link_script")
</head>

<body>
    @include("sections/navbar")
    <div class="container mt-5">
        <br><br><br><br><br>
        <div class="row mt-5 d-flex justify-content-center">
            <div class="text-center">
                <h3>Cadastro de beneficiarios</h3>
            </div>

            <div class="col-md-5 p-3">
                <div class=" shadow rounded border p-3">
                    <div class="text-center">
                      
                        <h5> Valores do plano escolhido</h5>
                        <p>
                      
                        </p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Idade</th>
                                    <th scope="col">Valores por pessoa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">0 a 17 anos</th>
                                    <td>R${{$plano_escolhido['faixa1']}} ,00</td>
                                </tr>
                                <tr>
                                    <th scope="row"> 18 a 40 anos</th>
                                    <td>R${{$plano_escolhido['faixa2']}} ,00</td>
                                </tr>
                                <tr>
                                    <th scope="row">40 anos +</th>
                                    <td>R${{$plano_escolhido['faixa3']}},00</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <div class="col-md-7 p-3">
                <div class="p-3  shadow rounded border">
                    <form method="POST" action="{{route("Beneficiario.Forms.post")}}">
                        @csrf
                        <div class="mb-3 row">
                            <div class="col-md-9">
                                <label for="exampleInputEmail1" class="form-label">Nome do beneficiario 1</label>
                               
                                <input required type="text" name="nome0" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$cadastro['nome']}} {{$cadastro['sobrenome']}}">
                         
                            </div>
                            <div class="col-md-3">
                                <label for="exampleInputPassword1" class="form-label">Data Nascimento</label>
                                <input required type="date" name="idade0" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="mb-3">

                        </div>
                      
                        @for($i=1;$i<$cadastro['total_beneficiarios'];$i++)
                            <div class="mb-3 row">
                                <div class="col-md-9">
                                    <label for="exampleInputEmail1" class="form-label">Nome do beneficiario  {{$i + 1}} </label>
                                    <input required type="text" name="nome{{$i}}"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-3">
                                    <label for="exampleInputPassword1" class="form-label">Data Nascimento</label>
                                    <input required type="date" name="idade{{$i}}" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="mb-3">
                        @endfor 
                            </div>
     
                        <div class="mb-3 form-check">
                            <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <input type="hidden" name="faixa1" value="{{$plano_escolhido['faixa1']}}">
                        <input type="hidden" name="faixa2" value="{{$plano_escolhido['faixa2']}}">
                        <input type="hidden" name="faixa3" value="{{$plano_escolhido['faixa3']}}">
                        <input type="hidden" name="cod_plano" value="{{$plano_escolhido['codigo']}}">
                        <input type="hidden" name="total_beneficiarios" value="{{$cadastro['total_beneficiarios']}}">
                         <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
            </div>
        </div>
    </div>

                </div>
            </div>
        </div>
    </div>
    
</body>

</html>