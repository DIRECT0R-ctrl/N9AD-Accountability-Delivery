@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-3 px-4 py-3 bg-zinc-900 text-white rounded-xl border border-zinc-800 transition-all shadow-lg shadow-blue-500/5'
            : 'flex items-center gap-3 px-4 py-3 text-zinc-500 hover:text-zinc-300 hover:bg-zinc-900/50 rounded-xl transition-all group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>