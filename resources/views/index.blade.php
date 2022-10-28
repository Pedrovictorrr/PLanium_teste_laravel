<!DOCTYPE html>
<html lang="en-us">

<head>
	   

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Planium </title>


    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9c0c03c6b4.js" crossorigin="anonymous"></script>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    
    <link rel="icon" type="image/x-icon" href="/img/icon2.ico">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
</head>

<body>
  <div class="container">
    <div class="row mt-5 mb-5 shadow rounded border">      
                 <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                         <div class="row">
                            <div class="col-md-1 d-grid gap-2 p-3">
                                <button class="btn" type="button" data-bs-target="#carouselExampleIndicators" aria-selected="true" data-bs-slide="prev">
                                    <i class="fa-solid fa-circle-left"></i>
                                </button>
                            </div>
                                    <div class="col-md-10 p-3">
                                        <div class="carousel-inner">
                                             <div class="carousel-item active">
                                                <div class="row">
                                                    @foreach ($dados_info as $plano)
                                                        @if ($plano['Codigo'] < 4 && $plano['Minimo_vidas']<2)      
                                                    <div class="col-md-4 p-3">
                                                        <div class="shadow border rounded text-center">
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
      
                                        <div class="carousel-item">
                                            <div class="row">
                                                
                                                @foreach ($dados_info as $plano)
                                                @if ($plano['Codigo'] >= 4 && $plano['Minimo_vidas']<2)
                                                    <div class="col-md-4 p-3">
                                                        <div class="shadow border rounded text-center">
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
                                                                    <i class="fa-solid fa-arrow-down"></i>
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
                          
                                        
                                <div class="col-md-1 d-grid gap-2 p-3">
                                    <button class="btn" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>
                            </div>
                         </div>
                    </div>    
                    





</body>

</html>
