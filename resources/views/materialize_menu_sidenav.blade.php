@foreach($items as $i => $menu_item)
    @if(count($menu_item->children))
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion no-padding">
                <li>
                    <a style="padding: 0 32px" class="collapsible-header waves-effect waves-light">{{ Str::upper($menu_item->title) }}<i class="material-icons right">arrow_drop_down</i></a>
                    <div class="collapsible-body">
                        <ul>
                            @foreach($menu_item->children as $child)
                                <li><a style="padding: 0 48px" class="waves-effect waves-light" href="{{ $child->link() }}">{{ Str::upper($child->title) }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    @else
        <li><a href="{{ $menu_item->link() }}">{{ Str::upper($menu_item->title) }}</a></li>
    @endif
@endforeach
