@extends('layouts.main')

@section('content')
    @include('partials.page-header', ['title' => 'CONTACTO', 'subtitle' => 'ANTONIOBALLESTE.COM'])
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-12">
            <h2 class="display-4 font-weight-bold mb-4">Contacto</h2>
            <p>Contáctanos para más información.</p>
             <!-- Formulario de contacto simplificado por ahora, ya que falta JS -->
            <div class="row">
                 <div class="col-md-6">
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Valencia Venezuela</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>+58 414-4707545</p>
                    <p><i class="fa fa-envelope mr-2"></i>informacion@antonioballeste.com</p>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
