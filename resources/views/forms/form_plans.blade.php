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
            <div class="text-center">
                    <h3>Pré Cadastro</h3>
                </div>
            <div class="col-md-12 mt-2 p-3  shadow border rounded">
                
                <form method="POST" action="{{route('Plans.Forms.post')}}">
                    @csrf 
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="exampleInputPassword1" class="form-label">Nome:</label>
                            <input required type="text" name="nome" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="col-md-12">
                            <label for="exampleInputPassword1" class="form-label">Sobrenome:</label>
                            <input required type="text" name="sobrenome" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="exampleInputEmail1" class=" col-sm-4 mt-1 form-label">Qual a quantidade de beneficiarios para ser cadastrados?</label>
                        <div class="col-sm-2">
                            <input required type="number" name="total_beneficiarios" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="selectbox" class="form-label">Informe seu plano</label>
                        <div class="col-sm-12">
                            <select class="form-select" name="plano" aria-label="Default select example">
                                <option selected>Selecione seu plano</option>
                              @foreach ($dados_plans_decode as $planos)
                                  <option value="{{$planos->codigo}}">{{$planos->nome}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Confirmar</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Proxima</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>