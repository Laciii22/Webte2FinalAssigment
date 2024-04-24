@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-teal-500 dark:text-teal-500']) }}>
    {{ $value ?? $slot }}
</label>
