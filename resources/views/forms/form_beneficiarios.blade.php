
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Teste Planium</title>
    <title>Cadastro de beneficiarios</title>
</head>

<body>
    <div class="container">
        <div class="row mt-3 d-flex justify-content-center">
            <div class="text-center">
                <h3>Cadastro de beneficiarios</h3>
            </div>

            <div class="col-md-5 p-3">
                <div class=" shadow rounded border p-3">
                    <div class="text-center">
                      
                        <h5>Plano escolhido</h5>
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
                            <div class="col-md-10">
                                <label for="exampleInputEmail1" class="form-label">Nome do beneficiario 1</label>
                               
                                <input type="text" name="nome0" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$cadastro['nome']}} {{$cadastro['sobrenome']}}">
                         
                            </div>
                            <div class="col-md-2">
                                <label for="exampleInputPassword1" class="form-label">Idade</label>
                                <input type="number" name="idade0" class="form-control" id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="mb-3">

                        </div>
                      
                        @for($i=1;$i<$cadastro['total_beneficiarios'];$i++)
                            <div class="mb-3 row">
                                <div class="col-md-10">
                                    <label for="exampleInputEmail1" class="form-label">Nome do beneficiario  $i + 1 </label>
                                    <input type="text" name="nome{{$i}}"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-2">
                                    <label for="exampleInputPassword1" class="form-label">Idade</label>
                                    <input type="number" name="idade{{$i}}" class="form-control" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="mb-3">
                        @endfor 
                            </div>
     
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
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
</body>

</html>