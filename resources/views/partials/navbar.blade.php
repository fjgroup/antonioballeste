    <div class="nav-bar fondo-negro fixed-top">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="{{ url('/') }}" class="navbar-brand">
                <img src="{{ asset('img/assents/logo_negro.jpg') }}" alt="Logo de la empresa" style="height: 50px;">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4 bg-secondary">
                    <a href="{{ url('/') }}" class="nav-item nav-link">Saludos</a>
                    <a href="{{ url('/about') }}" class="nav-item nav-link">Nosotros</a>
                    <a href="{{ url('/feature') }}" class="nav-item nav-link">Beneficios</a>
                    <a href="{{ url('/class') }}" class="nav-item nav-link">Academia</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link">Contacto</a>
                </div>
            </div>
        </nav>
    </div>
