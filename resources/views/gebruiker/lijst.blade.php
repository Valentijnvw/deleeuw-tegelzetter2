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
              <th></th>
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

                <td><div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="contentActivityStreamDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-vertical text-primary" style="width: 5px;"></i>
                  </button>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonWithIcon">
                    <a class="dropdown-item" href="{{ route('opdracht.bewerken', [$user->id]) }}">
                      <i class="fas fa-pencil dropdown-item-icon"></i> Bewerken
                    </a>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" onclick="$('#opdracht-verwijderen-id').val('{{ $user->id }}')">
                      <i class="fas fa-trash dropdown-item-icon"></i> Verwijderen
                    </a>
                  </div>
                </div></td>
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

<!-- Modal -->
<div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="{{route('gebruiker.destroy')}}" method="POST">
        @csrf
        @method('delete')
        <div class="modal-header">
          <h5 class="modal-title">Weet je het zeker?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="opdracht-verwijderen-id" name="gebruiker_verwijder_id" />
          <p>Klik op "Gebruiker verwijderen" om de opdracht definitief te verwijderen. Let op: deze actie kan <strong>niet</strong> ongedaan worden gemaakt!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-bs-dismiss="modal">Annuleren</button>
          <button type="submit" class="btn btn-primary">Gebruiker verwijderen</button>
        </div>
      </div>
      </form>
  </div>
</div>
<!-- End Modal -->

</x-app-layout>
