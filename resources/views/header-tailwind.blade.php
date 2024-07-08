<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Tailwind</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<header class="bg-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
        <div class="flex items-center">
            <a href="{{ url('/') }}" class="mr-6">
                <img src="{{ url('resources/new_design/general/logo-footer.png') }}" alt="Emex - un brand de incredere" class="h-16">
            </a>
            <div class="hidden md:flex space-x-4 items-center">
                <a href="mailto:vanzari@emex.ro" class="text-blue-800 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12.713l11.985-7.009c-.286-.339-2.402-2.704-4.573-2.704h-14.828c-2.171 0-4.287 2.365-4.573 2.704l11.985 7.009zm0 1.474l-12-7.013v10.827c0 1.104.896 2 2 2h20c1.104 0 2-.896 2-2v-10.827l-12 7.013z"/></svg>
                    vanzari@emex.ro
                </a>
                <a href="tel:+40724509552" class="text-blue-800 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M22.5 16.5v3a3 3 0 0 1-3 3c-7.18 0-13-5.82-13-13a3 3 0 0 1 3-3h3a1 1 0 0 1 1 1 8.007 8.007 0 0 0 .457 2.406 1 1 0 0 1-.211.976l-1.5 1.5a10.004 10.004 0 0 0 4.586 4.586l1.5-1.5a1 1 0 0 1 .976-.211 8.007 8.007 0 0 0 2.406.457 1 1 0 0 1 1 1z"/></svg>
                    +40724-509-552
                </a>
                <a href="tel:+40214571646" class="text-blue-800 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M22.5 16.5v3a3 3 0 0 1-3 3c-7.18 0-13-5.82-13-13a3 3 0 0 1 3-3h3a1 1 0 0 1 1 1 8.007 8.007 0 0 0 .457 2.406 1 1 0 0 1-.211.976l-1.5 1.5a10.004 10.004 0 0 0 4.586 4.586l1.5-1.5a1 1 0 0 1 .976-.211 8.007 8.007 0 0 0 2.406.457 1 1 0 0 1 1 1z"/></svg>
                    +4021-457-1646
                </a>
            </div>
        </div>
        <div class="flex items-center space-x-4">
            <input type="text" placeholder="Cauta dupa nume produs sau cod SKU" class="px-4 py-2 border rounded-md">
            <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Produse</button>
            <div class="relative">
                <button class="bg-white border border-blue-500 text-blue-500 px-4 py-2 rounded-md flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2a5 5 0 0 0-5 5v2h10V7a5 5 0 0 0-5-5zm5 7H7v7.292a2.998 2.998 0 0 0-.116.152L5.05 19H19l-1.834-2.556a2.998 2.998 0 0 0-.116-.152V9z"/></svg>
                    Contul meu
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden">
                    <a href="{{ url('/contul-meu') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Setari cont</a>
                    <a href="{{ url('/wishlist') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Favorite</a>
                    <a href="{{ url('/logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Iesire</a>
                </div>
            </div>
            <a href="{{ url('/favorite') }}" class="relative flex items-center text-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                <span class="absolute top-0 right-0 inline-block w-5 h-5 bg-red-500 text-white text-xs text-center rounded-full">0</span>
            </a>
            <a href="{{ url('/cos') }}" class="relative flex items-center text-blue-500">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M7 4h10l1 2H6l1-2zM3 6h18l-1.47 8.59a3.002 3.002 0 0 1-2.96 2.41H7.43a3.002 3.002 0 0 1-2.96-2.41L3 6z"/></svg>
                <span class="absolute top-0 right-0 inline-block w-5 h-5 bg-red-500 text-white text-xs text-center rounded-full">0</span>
            </a>
        </div>
    </div>
    <nav class="bg-white shadow-md py-2">
        <div class="container mx-auto flex justify-between px-4">
            <a href="{{ url('/') }}" class="text-blue-800">Acasa</a>
            <div class="flex space-x-4">
                <a href="{{ url('/produse') }}" class="text-blue-800">Produse</a>
                <a href="{{ url('/aplicare') }}" class="text-blue-800">Aplicare</a>
                <a href="{{ url('/servicii') }}" class="text-blue-800">Servicii</a>
                <a href="{{ url('/consum') }}" class="text-blue-800">Consum</a>
                <a href="{{ url('/culori') }}" class="text-blue-800">Culori</a>
                <a href="{{ url('/blog') }}" class="text-blue-800">Blog</a>
                <a href="{{ url('/contact') }}" class="text-blue-800">Contact</a>
            </div>
        </div>
    </nav>
</header>
</body>
</html>
