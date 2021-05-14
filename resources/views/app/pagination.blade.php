@if ($paginator->hasPages())
    <div class="blog__number-pages number-pages">
        <ul class="number-pages__list">
            @for($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="number-pages__item">
                    @if($i == $paginator->currentPage())
                        <span class="active number-pages__link">{{ $i }}</span>
                    @else
                        <a class="number-pages__link" href="{{ $i == 1 ? '/news' : $paginator->url($i) }}">
                            {{ $i }}
                        </a>
                    @endif
                </li>
            @endfor
        </ul>
    </div>
@endif
