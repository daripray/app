<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- <title>{{ $title ?? config('app.name') }}</title> --}}
        <title>{{ ucfirst(Request::route()->getName()) }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <style>
            /* Color Theme Swatches in Hex */
            .color-trend,-1 { color: #212226; }
            .color-trend,-2 { color: #7EA629; }
            .color-trend,-3 { color: #BFBA73; }
            .color-trend,-4 { color: #D9763D; }
            .color-trend,-5 { color: #A63921; }

            body{
                /* background: #DFCAA6; */
                /* background: linear-gradient(90deg,#e9ecc2 0%, rgba(129,129,90,0.41) 80%);
                background: -webkit-linear-gradient(90deg,#e9ecc2 0%, rgba(129,129,90,0.41) 80%);
                background: -moz-linear-gradient(90deg,#e9ecc2 0%, rgba(129,129,90,0.41) 80%); */
            }
            .card {
                /* background: #7F6D8B; */
            /* background: linear-gradient(135deg, rgba(255, 0, 150, 0.8), rgba(0, 204, 255, 0.8)); */
            /* color: white; */
            /* border: none; */
            border-radius: 15px;
        }

        .gradient-card .card-body {
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }

        .gradient-card:hover .card-body {
            opacity: 1;
        }
        </style>

    </head>
    <body>
        <x-navigation-menu/>

        <div class="container pt-4 mt-4">
            <div class="mt-4 row">
                {{ $slot }}
            </div>
        </div>

        {{-- <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam nobis quo nulla temporibus ducimus quis neque odio hic quasi doloremque quia aliquid, ut minima ipsum. Mollitia illum hic inventore eligendi!</p> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>
