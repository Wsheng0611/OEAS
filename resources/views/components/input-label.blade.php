@props(['value', 'for'])

{{-- <label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label> --}}

<!-- x-label component -->
<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value }}
    @if($attributes->has('required'))
        <span class="text">*</span>
    @endif
</label>

<style>
    .text{
        color: red !important;
    }
</style>