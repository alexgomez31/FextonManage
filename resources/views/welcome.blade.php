<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bienvenida</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/bienvenido.css">
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    <div class="relative flex justify-center items-center min-h-screen">
        <div class="max-w-3xl w-full p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
            <div class="text-center mb-6">
                <h1 class="text-3xl font-semibold text-gray-900 dark:text-gray-200">Bienvenido a</h1>
                <h1>Fexton Manage</h1>
            </div>

            <div class="text-gray-700 dark:text-gray-300 mb-6">
                <p>Sistema de Administración y Gestión de productos para la empresa FEXTON SAS, que actúe como un repositorio digital eficiente y versátil, proporcionando herramientas para el registro detallado de productos y la gestión de recursos humanos.</p>
            </div>

            <div class="flex justify-center mb-6">
                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-500 disabled:opacity-25 transition ease-in-out duration-150 mr-4">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 focus:outline-none focus:border-gray-400 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Registrarse
                </a>
            </div>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600 dark:text-gray-400">¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Inicia sesión aquí</a></p>
            </div>
        </div>
    </div>
</body>
</html>
