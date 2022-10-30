<!DOCTYPE html>
<html lang="en">

<head>
 @include("sections/header_link_script")
</head>

<body>
    @include("sections/navbar")
    <div class="container mt-5">
      <br><br><br>
      <div class="row mt-5 d-flex align-items-center">
          <div class="col-md-12 mt-5 p-3">
 
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
                                    <td>{{$pessoa['idade']}} anos</td>
                                    <td>R${{$pessoa['Valor']}},00</td>
                                  </tr>
                                  @endforeach
                                  <tr>
                                    
                                    <td><strong>VALOR TOTAL:</strong></td>
                                    <td>
                                        <strong>R${{$valor_total}},00</strong>
                                    </td>
                                    <td></td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <hr>
                        <a href="" class="btn btn-success">Ir para o Pagamento</a>
                </div>

            </div>

        </div>

    </div>
</body>
</html>