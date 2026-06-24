<button {{ $attributes->merge(['class' => 'px-3 py-1 bg-blue-500 font-bold border rounded cursor-pointer']) }}>
    {{ $slot }}
</button>
