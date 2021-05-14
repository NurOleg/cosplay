@if ($paginator->hasPages())
    <div class="blog__number-pages number-pages">
        <ul class="number-pages__list">
            @for($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="number-pages__item">
                    <a class="
                    @if($i == $paginator->currentPage())
                    active
                    @endif
                    number-pages__link" href="{{ $paginator->url($i) }}">
                        {{ $i }}
                    </a>
                </li>
            @endfor
        </ul>
    </div>
@endif
