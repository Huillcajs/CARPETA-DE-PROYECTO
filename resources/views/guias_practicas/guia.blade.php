<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <link rel="stylesheet" href="{{ asset('css/actividad.css') }}">

</head>
<body>
    <h1>GUÍAS PRÁCTICAS</h1>
    <section class="sesion-cards">
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>GUÍA PRÁCTICA #1</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.guia', ['nombre' => 'guia1.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>GUÍA PRÁCTICA #2</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.guia', ['nombre' => 'guia2.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>GUÍA PRÁCTICA #3</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.guia', ['nombre' => 'guia3.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>GUÍA PRÁCTICA #4</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.guia', ['nombre' => 'guia4.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>GUÍA PRÁCTICA #5</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.guia', ['nombre' => 'guia5.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
        <section class="cards">
            <img src="{{ asset('img/imagen1.png') }}" alt="">
            <div class="contenido">
            <h2>GUÍA PRÁCTICA #6</h2>
            <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</P>
            <div class="botones">
                <a class="github" href="https://github.com/Huillcajs/CARPETA-DE-PROYECTO">→ VER GIT HUB</a>
                <a class="descargar" href="{{ route('descargar.guia', ['nombre' => 'guia6.pdf']) }}" download>DESCARGAR</a>
            </div>
            </div>
        </section>
    </section>
</body>
</html>