<div id="th-navigation" class="collapse navbar-collapse th-navigation">
    <ul>
        @foreach($items as $menu_item)
            @php
                $submenu = $menu_item->children;
            @endphp
            <li class="@if(count($submenu) != 0)th-hasdropdown @endif @if(url($menu_item->link()) == url()->current())th-active @endif">
                <a class="text-center" href="{{ $menu_item->url }}">{{ $menu_item->title }} </a>

                @if(count($submenu) != 0)
                    <ul class="th-menudropdown">
                        @foreach($submenu as $item)
                            <li @if(url($item->link()) == url()->current()) class="th-active" @endif >
                                <a href="{{$item->url}}">{{$item->title}} </a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
</div>
