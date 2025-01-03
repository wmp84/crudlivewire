<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <x-nav>
        <x-link redirect="{{route('cursos')}}">Cursos</x-link>
        <x-link redirect="{{route('curso.papelera')}}">Papelera</x-link>
    </x-nav>
    {{$slot}}
</body>
</html>
