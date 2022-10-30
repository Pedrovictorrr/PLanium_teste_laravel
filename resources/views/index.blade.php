<!DOCTYPE html>
<html lang="en">

<head>
@include("sections/header_link_script")
</head>

<body id="page-top">
    <!-- Navigation-->
@include('sections/navbar')
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
        
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Planium</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading font-weight-light mb-0">Plano de Saúde</p>
        </div>
    </header>
    <!-- Portfolio Section-->
    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Planos</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                @foreach ($dados_info as $plano)
                @if ($plano['Minimo_vidas']<2) 
                <a class="col-md-6 col-lg-4 mb-5" href="{{route('Plans.Forms.get')}}">
                    <div class="portfolio-item mx-auto border shadow p-3" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                        <div
                            class="portfolio-item-caption  d-flex align-items-center justify-content-center h-100 w-100">
                            <div class="portfolio-item-caption-content border text-center text-white"><i
                                    class="fas fa-plus fa-3x"></i></div>
                        </div>      
                        <h3>{{$plano['Nome']}}</h3>
                        <p><strong>Até 17 anos| R${{$plano['Faixa1']}},00 p/Beneficiario</strong></p>
                        <p><strong>17 aos 40 anos| R${{$plano['Faixa2']}},00 p/Beneficiario</strong></p>
                        <p><strong>40 anos +| R${{$plano['Faixa3']}},00 p/Beneficiario</strong></p>

                    </div>
                    </a>
                    @endif
                    @endforeach
            </div>
        </div>
    </section>

    <!-- Footer-->
 @include('sections/footer')
    <!-- Copyright Section-->
    

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>