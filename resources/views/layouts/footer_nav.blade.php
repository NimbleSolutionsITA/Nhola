<ul>
    @foreach($items as $menu_item)
        @php
            $submenu = $menu_item->children;
        @endphp
        <li>
            <a style="@if(url($menu_item->link()) == url()->current())border-bottom: 1px solid white; @endif" href="{{ $menu_item->url }}">{{ $menu_item->title }} </a>
        </li>
    @endforeach
</ul>
