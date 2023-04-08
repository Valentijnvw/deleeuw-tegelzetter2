@push("scripts")
<script type="module">
  HSCore.components.HSDatatables.init('.js-datatable')
</script>
@endpush
<x-app-layout title="Opdrachten" header="Opdrachten">
  
  <a class="btn btn-secondary mb-3" href="{{ route('opdracht.create') }}" style="width: 200px;">
    <i class="fas fa-plus"></i> Opdracht toevoegen </a>
    <div class="card">


        {{-- <div class="card-header">
          <h4 class="card-header-title">Users</h4>
        </div> --}}
      
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
              <th>Naam klant</th>
              <th>Opdracht beschrijving</th>
              <th>Start datum</th>
              <th>Eind datum</th>
            </tr>
            </thead>
      
            <tbody>

            @foreach ($opdrachten as $opdracht)
            <tr>
                <td>
                    <span class="d-block h5 mb-0">{{ $opdracht->contact->displayName() }}</span>
                </td>
                <td>
                    {{ \Illuminate\Support\Str::limit($opdracht->omschrijving, 100, $end='...') }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($opdracht->start_datum)->format('d-m-Y') }}
                </td>
                <td>
                    {{ \Carbon\Carbon::parse($opdracht->eind_datum)->format('d-m-Y') }}
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
