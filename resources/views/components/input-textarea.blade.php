@props([
    'name'
])

<textarea {{ $attributes->class(['form-control','is-invalid' => $errors->any($name)])->merge(['name' => $name]) }} >{{$slot}}</textarea>
<x-input-error-messages :messages="$errors->get($name)" />