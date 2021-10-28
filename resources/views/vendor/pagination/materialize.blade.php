@if ($paginator->hasPages())
    <div class="row">
        <div class="col s12 m12">

            <div class="center">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                            <span style="padding: 0; width: 20px" aria-hidden="true"><i class="material-icons">chevron_left</i></span>
                        </li>
                    @else
                        <li>
                            <a class="waves-effect" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                               aria-label="@lang('pagination.previous')"><i class="material-icons">chevron_left</i></a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li class="disabled" aria-disabled="true">{{ $element }}</li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="active waves-effect" aria-current="page"><a
                                            href="javascript:void(0)">{{ $page }}</a></li>
                                @else
                                    <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li>
                            <a class="waves-effect" href="{{ $paginator->nextPageUrl() }}" rel="next"
                               aria-label="@lang('pagination.next')"><i class="material-icons">chevron_right</i></a>
                        </li>
                    @else
                        <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span aria-hidden="true"><i class="material-icons">chevron_right</i></span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
