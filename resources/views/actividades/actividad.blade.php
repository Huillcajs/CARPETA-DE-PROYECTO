<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <link rel="stylesheet" href="{{ asset('css/actividad.css') }}">

</head>
<body>
    <h1>ACTIVIDADES</h1>
    <section class="sesion-cards">
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>ACTIVIDAD #1</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.actividad', ['nombre' => 'actividad1.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>ACTIVIDAD #2</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.actividad', ['nombre' => 'actividad2.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>ACTIVIDAD #3</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.actividad', ['nombre' => 'actividad3.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>ACTIVIDAD #4</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.actividad', ['nombre' => 'actividad4.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>ACTIVIDAD #5</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.actividad', ['nombre' => 'actividad5.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>ACTIVIDAD #6</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.actividad', ['nombre' => 'guia6.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
    </section>
</body>
</html>