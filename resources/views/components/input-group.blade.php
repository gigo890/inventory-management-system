@props(['value'])
<div {{ $attributes->merge(['class' => 'mt-1 flex flex-col']) }}>
    {{ $value ?? $slot }}
</div>
