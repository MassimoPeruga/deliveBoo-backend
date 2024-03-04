@extends('layouts.app')
@section('content')

    <!--Jumbotron-->
    <div class="jumbotron container p-5 my-4 bg-light rounded-3">

        <!--title-->
        <div class="my-5">
            <h1 class="display-5 fw-bold align-self-center ps-4">
                QuackDelivery
            </h1>
        </div>
        <!--/title-->

        <!--description jumbo-->
        <p class="col-md-8 fs-4">
            Esplora un mondo di sapori e convenienza con QuackDelivery. Dalle deliziose pizzerie ai ristoranti esotici, siamo qui per portare il meglio della cucina direttamente a casa tua. 
        </p>
        <!--/description jumbo -->

    </div>
    <!--/Jumbotron-->

    <div class="content">
        <div class="container">

            <!--card container-->
            <div class="d-flex gap-5 mb-4">
                <!--card-->
                <div class="home-card p-3 rounded">
                    <h4>Ordina in modo semplice e veloce</h4>
                    <p>
                        Con la nostra applicazione intuitiva e facile da usare, puoi ordinare il tuo pasto preferito in pochi semplici passaggi. Aggiungi articoli al carrello, personalizza il tuo ordine e rilassati mentre noi ci occupiamo del resto.
                    </p>
                </div>
                <!--/card-->

                <!--card-->
                <div class="home-card p-3 rounded">
                <h4>Consegna veloce e affidabile</h4>
                <p>
                    Non importa dove ti trovi, il tuo pasto arriverà caldo e fresco in breve tempo. Grazie alla nostra affidabile rete di consegna, puoi gustare il tuo cibo preferito senza uscire di casa.
                </p>  
                </div>
                <!--/card-->
            </div>
            <!--/card container-->

            <!--center button container-->
            <div class="d-flex justify-content-center">
                <button class="btn btn-org btn-lg mb-4" type="button">Ordina ora!</button> 
            </div>
            <!--/center button container-->
        </div>

        <!--footer-->
        <footer>
            <div class="container py-3">
                <div>By Boolean #110</div>
            </div>
        </footer> 
        <!--footer-->
    </div>
@endsection

