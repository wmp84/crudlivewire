<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
    <x-nav>
        <x-link redirect="{{route('cursos')}}" wire:navigate.hover>Cursos</x-link>
        <x-link redirect="{{route('curso.papelera')}}">Papelera</x-link>
    </x-nav>
    {{$slot}}
</body>
</html>
