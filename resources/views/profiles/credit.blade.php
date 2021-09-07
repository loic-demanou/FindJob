@extends('layouts.app')
@section('content')

    <div class="container">
        <div>
            <h3><strong>Achetez des crédits</strong> </h3>
                <p>
                Facile, Rapide, Pratique ! Grâce à l'achat de crédits, vous pré-chargez votre 
                Compte Personnel du montant de votre choix.</p>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-header" style="background: rgb(212, 241, 212)">
                        Pack
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">5000 FCFA  </h2>
                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                    <div class="card-footer text-muted">
                        <a href="#" class="btn btn-primary">Buy</a>      
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-header" style="background: rgb(137, 252, 137)">
                        Pack
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">15000 FCFA  </h2>
                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        {{-- <a href="#" class="btn btn-primary">Buy</a> --}}
                    </div>
                    <div class="card-footer text-muted">
                        <a href="#" class="btn btn-primary">Buy</a>      
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-header" style="background: rgb(72, 207, 72)">
                        Pack
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">30000 FCFA  </h2>
                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        {{-- <a href="#" class="btn btn-primary">Buy</a> --}}
                    </div>
                    <div class="card-footer text-muted">
                        <a href="#" class="btn btn-primary">Buy</a>      
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-header text-white" style="background: green">
                        Pack
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">50000 FCFA  </h2>
                        {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
                        {{-- <a href="#" class="btn btn-primary">Buy</a> --}}
                    </div>
                    <div class="card-footer text-muted"> 
                        <a href="#" class="btn btn-primary">Buy</a>      
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
