<div class="">

    <h2 class="font-bold text-xl mb-4">
        Menu
    </h2>
    <ul class="space-y-4">
        @foreach ($menus as $menu )
        <ul class="space-y-4">
            <li class=""><a href="{{ $menu['link'] }}" class="text-white hover:text-gray-300">{{ $menu['title'] }}</a></li>
        @endforeach

    </ul>
</div>