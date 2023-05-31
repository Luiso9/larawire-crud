<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD3</title>
    @vite('resources/css/app.css')
    @livewireStyles()
</head>

<body>
    {{-- Navbar --}}
    <div class="navbar bg-base-100">
        <div class="flex-1">
            <a class="btn btn-ghost normal-case text-xl" href="#">XTJ</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a href="www.youtube.com" class="text-red-500">Youtube</a></li>
        </div>
        <div class="flex-none gap-2">
            <div class="dropdown dropdown-end">
                <label tabindex="0" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img loading="lazy" src="https://www.whats-on-netflix.com/wp-content/uploads/2022/09/when-will-jojos-bizzare-adventure-stone-ocen-episodes-25-38-be-on-netflix-jpeg.webp" />
                    </div>
                </label>
            </div>
        </div>
    </div>

    <div>
        <livewire:app-controller />
        {{-- Render blade.view Livewire --}}
    </div>

    @livewireScripts()
</body>

</html>
