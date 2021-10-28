<ul id="nav-mobile" class="right hide-on-med-and-down">
    @foreach($items as $i => $menu_item)
        @if(count($menu_item->children))
            <li><a class="dropdown-trigger" href="javascript:void(0)" data-target="dropdown{{ $menu_item->id }}">{{ Str::upper($menu_item->title) }}<i class="material-icons right">arrow_drop_down</i></a></li>

            <ul style="margin-top: 60px" id="dropdown{{ $menu_item->id }}" class="dropdown-content">
            @foreach($menu_item->children as $child)
                    <li><a href="{{ $child->link() }}">{{ Str::upper($child->title) }}</a></li>
            @endforeach
            </ul>

        @else
            <li><a href="{{ $menu_item->link() }}">{{ Str::upper($menu_item->title) }}</a></li>
        @endif
    @endforeach
</ul>
