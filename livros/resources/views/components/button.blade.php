@props(['color' => 'indigo'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-'.$color.'-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-'.$color.'-700 active:bg-'.$color.'-700 focus:outline-none focus:border-'.$color.'-700 focus:ring focus:ring-'.$color.'-200 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
