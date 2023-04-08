@push("scripts")
<script type="module">
  HSCore.components.HSDatatables.init('.js-datatable')
</script>
@endpush

<x-app-layout title="Gebruikers" header="Gebruikers">
  
  <a class="btn btn-secondary mb-3" href="{{ route('gebruiker.toevoegen') }}" style="width: 200px;">
    <i class="fas fa-plus"></i> Gebruiker toevoegen </a>
    <div class="card">
      
        <!-- Table -->
        <div class="table-responsive datatable-custom">
          <table class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                 data-hs-datatables-options='{
                         "order": [],
                         "isResponsive": false,
                         "isShowPaging": false,
                         "pagination": "datatableWithPaginationPagination"
                       }'>
            <thead class="thead-light">
            <tr>
              <th>Naam</th>
              <th>Functie</th>
              <th>Actief sinds</th>
            </tr>
            </thead>
      
            <tbody>

            @foreach ($userList as $user)
            <tr>
                <td>
                    <span class="d-block h5 mb-0">
                        {{ $user->first_name . " " . $user->last_name }}
                    </span>
                </td>
                <td>
                    {{ $user->roles->implode(",") }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}
                </td>

            </tr>
            @endforeach

            </tbody>
          </table>
        </div>
        <!-- End Table -->
      
        <!-- Footer -->
        <div class="card-footer">
          <!-- Pagination -->
          <div class="d-flex justify-content-center justify-content-sm-end">
            <nav id="datatableWithPaginationPagination" aria-label="Activity pagination"></nav>
          </div>
          <!-- End Pagination -->
        </div>
        <!-- End Footer -->
      </div>

{{-- <x-confirmation-modal routeName="opdracht.delete" ::componentId="opdrachtId">
    <x-slot name="title">
        Weet je het zeker?
    </x-slot>
    <x-slot name="message">
        Klik op "Opdracht verwijderen" om de opdracht definitief te verwijderen
    </x-slot>
</x-confirmation-modal> --}}


</x-app-layout>
