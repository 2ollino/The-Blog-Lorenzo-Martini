<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="ticker-wrapper py-2" data-theme-invert>
        <div class="ticker-track d-flex">
                @foreach($prices as $item)
                    <div class="ticker-item " style="color: {{ $item['color'] }}">
                        {{ $item['name'] }}: ${{ $item['price'] }} {{ $item['symbol'] }}
                    </div>
                @endforeach
        </div>
    </div>
</div>
