<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mainbody 2</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
</head>
<body>
<div id="sidebar-left" class="sidebar">
    <nav class="col">
        <div id="servicii">
            <section>
                <header>Servicii</header>
                <ul class="dropdown-menu m-0">
                    <li><a href="{{ url('/aplicare-covor-epoxidic-stb') }}" title="Pardoseli Cuartz">Pardoseli Cuartz Epoxi</a></li>
                    <li><a href="{{ url('/aplicare-pardoseala-epoxidica-autonivelanta') }}" title="Autonivelanta Epoxi">Autonivelanta Epoxi</a></li>
                    <li><a href="{{ url('/vopsire-epoxidica-pardoseli') }}" title="Vopsiri Epoxidice">Vopsiri Epoxidice</a></li>
                    <li><a href="{{ url('/servicii') }}" title="Servicii Generale">Servicii Generale</a></li>
                </ul>
            </section>
        </div>
        <section>
            <header>
                <a href="{{ url('/blog') }}" title="blog">Blog</a>
            </header>
        </section>
        <section>
            <header>
                <a href="{{ url('/contact') }}" title="contact">Contact</a>
            </header>
        </section>
    </nav>
</div>
</body>
</html>
