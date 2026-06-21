<div class="locale-switcher d-inline-flex align-items-center gap-1">
    @foreach (config('locales.supported') as $locale)
        <a href="{{ route('locale.switch', $locale) }}"
           class="locale-link {{ app()->getLocale() === $locale ? 'active' : '' }}"
           title="{{ config('locales.names')[$locale] }}">
            {{ strtoupper($locale) }}
        </a>
        @if (! $loop->last)
            <span class="locale-separator">|</span>
        @endif
    @endforeach
</div>
