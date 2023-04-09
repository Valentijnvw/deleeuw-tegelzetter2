@props(['messages'])

@if ($messages)
<span class="invalid-feedback">
    @foreach ($messages as $message)
       <span> {{ $message }}</span>
    @endforeach
</span>
@endif