@props([
    'name'
])

<input {{ $attributes->class(['form-control','is-invalid' => $errors->any($name)])->merge(['name' => $name]) }} />
<x-input-error-messages :messages="$errors->get($name)" />