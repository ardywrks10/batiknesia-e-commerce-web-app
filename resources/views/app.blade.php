<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Temukan keindahan dan keunikan batik Indonesia di BatikNesia. Kami menawarkan berbagai koleksi batik berkualitas tinggi untuk segala kesempatan.">
        <meta name="keywords" content="batik Indonesia, pakaian batik, batik modern, batik tradisional, kain batik">
        <meta name="author" content="BatikNesia">
        <meta name="robots" content="index, follow">
        <meta name="og:title" content="BatikNesia - Keindahan Batik Indonesia">
        <meta name="og:description" content="Temukan keindahan dan keunikan batik Indonesia di BatikNesia. Kami menawarkan berbagai koleksi batik berkualitas tinggi untuk segala kesempatan.">
        <meta name="og:image" content="http://127.0.0.1:8000/product_images/kemeja2.png">
        <meta name="og:url" content="http://127.0.0.1:8000/">
        <meta name="og:type" content="website">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="BatikNesia - Keindahan Batik Indonesia">
        <meta name="twitter:description" content="Temukan keindahan dan keunikan batik Indonesia di BatikNesia. Kami menawarkan berbagai koleksi batik berkualitas tinggi untuk segala kesempatan.">
        <meta name="twitter:image" content="URL_gambar_thumbnail">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
