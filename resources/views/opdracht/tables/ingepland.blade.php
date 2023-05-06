@push("scripts")
<script type="module">


    

  let dt = $('#dt-ingepland').DataTable({
    ajax: "{{ route('api.getOpdrachten', ['status' => 'nieuw']) }}",
    columns: [
      {
        title: "Naam klant",
        data: 'naamKlant',
      },
      {
        title: "Aannemer",
        data: "aannemer"
      },
      {
        title: "Omschrijving",
          data: 'omschrijving',
          render: function (data, type) {
              return truncate(data, 80);
          },
      },
      {
        title: "Start datum",
        data: 'start_datum',
      },
      {
        title: "Eind datum",
        data: 'eind_datum',
      },
      {
        data: 'id',
        orderable: false,
        searchable: false,
        render: function(opdrachtId, type) {
          var url = '{{ route("opdracht.bewerken", ":id:") }}';
          url = url.replace(':id:', opdrachtId);
          return `<div class="dropdown">
                  <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm rounded-circle" id="contentActivityStreamDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-vertical text-primary" style="width: 5px;"></i>
                  </button>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonWithIcon">
                    <a class="dropdown-item" href="${url}">
                      <i class="fas fa-pencil dropdown-item-icon"></i> Bewerken
                    </a>
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModalCenter" onclick="$('#opdracht-verwijderen-id').val('${opdrachtId}')">
                      <i class="fas fa-trash dropdown-item-icon"></i> Verwijderen
                    </a>
                  </div>
                </div>`;
        }
      },
    ],
  });

  setInterval(function() {
    dt.draw();
    // alert("H")
  }, 1000)
  window.drawIngepland = () => {dt.draw()};

  let q = $("#tableSearch").val();
  dt.search(q).draw();
  $("#tableSearch").keyup(function() {
    let q = $(this).val();
    dt.search(q).draw();
  });

</script>
@endpush

<!-- Table -->
<div class="table-responsive datatable-custom" x-show="tab === 'ingepland'">
    <table id="dt-ingepland" class="w-100 js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
        <thead class="thead-light">
        </thead>
    </table>
</div>
<!-- End Table -->