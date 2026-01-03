<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $training->city }} - Detalles del Evento</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background-color: #000; color: #fff; font-family: sans-serif; }
        .prose { color: #ccc; max-width: 100%; }
        .prose h1, .prose h2, .prose h3 { color: #fff; }
        .prose img { border-radius: 0.5rem; }
    </style>
</head>
<body class="bg-black text-white antialiased">

    <div class="max-w-4xl mx-auto px-4 py-12">
        <header class="mb-8 border-b border-gray-800 pb-8">
            <h1 class="text-4xl font-bold text-center bg-clip-text text-transparent bg-gradient-to-r from-gray-100 to-gray-400">
                {{ $training->city }}
            </h1>
            <div class="text-center text-gray-500 mt-2 text-xl">
                {{ $training->start_date->translatedFormat('d F Y') }}
                @if($training->end_date)
                    - {{ $training->end_date->translatedFormat('d F Y') }}
                @endif
            </div>
            <div class="text-center mt-6">
                <a href="/" class="text-blue-400 hover:text-blue-300 underline">← Volver al inicio</a>
            </div>
        </header>

        <main class="prose prose-invert lg:prose-xl mx-auto">
            @if($training->content)
                {!! $training->content !!}
            @else
                <p class="text-gray-500 italic text-center">No hay detalles adicionales disponibles para este evento.</p>
            @endif
        </main>

        <footer class="mt-16 pt-8 border-t border-gray-800 text-center text-gray-600 text-sm">
            &copy; {{ date('Y') }} Antonio Balleste. Todos los derechos reservados.
        </footer>
    </div>

</body>
</html>
