@props(['redirect'=>""])

<li>
    <a href="{{$redirect}}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">{{$slot}}</a>
</li>
