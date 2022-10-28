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
        <div class="row">
            <div class="col-md-12 p-3">
                <div class="shadow rounded border p-4">
                    <div class="text-center">
                        <h3>Orçamento</h3>

                    </div>
                    <div class="content">
                        Ola, <strong>{{$titular}}</strong>,<br>
                        Aqui esta seu orçamento para pagamento no valor de <strong>R${{$valor_total}},00</strong>

                        <div>
                            <div>
                                <div class="text-center">
                            <h3>Beneficiarios</h3>
                            </div>
                            </div>
                            <table class="table">
                                <thead>
                                  <tr>
                                   
                                    <th scope="col">Nome</th>
                                    <th scope="col">Idade</th>
                                    <th scope="col">Valor</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($beneficiarios as $pessoa)
                                        
                                    
                                  <tr>
                                    
                                    <td>{{$pessoa['Nome']}}</td>
                                    <td>{{$pessoa['idade']}}</td>
                                    <td>R${{$pessoa['Valor']}},00</td>
                                  </tr>
                                  @endforeach
                                  <tr>
                                    
                                    <td><strong>VALOR TOTAL:</strong></td>
                                    <td>
                                        <strong>R${{$valor_total}},00</strong>
                                    </td>
                                    <td> <a href="" class="btn btn-success">Ir para o Pagamento</a></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <hr>
                </div>

            </div>

        </div>

    </div>
</body>
</html>