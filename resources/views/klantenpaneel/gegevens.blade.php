@push("scripts")
<script type="module">

</script>
@endpush

@php
    // dd($roleList)
@endphp

<x-app-layout title="Mijn gegevens" header="Mijn gegevens">
  
    <div class="card container">
        <div class="card-body">
            @if(Auth::user()->moneybirdContact)
            <ul>
                <li>Voornaam: {{ Auth::user()->moneybirdContact->firstname }}</li>
                <li>Achternaam: {{ Auth::user()->moneybirdContact->lastname }}</li>
                <li>Bedrijfsnaam: {{ Auth::user()->moneybirdContact->company_name }}</li>
                <li>Postcode: {{ Auth::user()->moneybirdContact->zipcode }}</li>
                <li>Stad: {{ Auth::user()->moneybirdContact->city }}</li>
                <li>Adres: {{ Auth::user()->moneybirdContact->address1 }}</li>
                <li>KvK nummer: </li>
                <li>BTW nummer: </li>
            </ul>
            @else
                <p>Er is geen Moneybird account gekoppeld aan dit account</p>
            @endif
            
        </div>
    </div>

</x-app-layout>
