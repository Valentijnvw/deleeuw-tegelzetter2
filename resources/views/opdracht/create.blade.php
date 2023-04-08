@push("scripts")
<script type="module">
  flatpickr('.flatpickr', {
    dateFormat: "d-m-Y"
  });
</script>
@endpush

<x-app-layout title="Opdracht toevoegen" header="Opdracht toevoegen">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <!-- End Page Header -->
      <div class="card p-4">
        <form method="POST" action="{{ route('opdracht.store') }}">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Opdracht titel</label>
                  <input type="text" name="titel" class="form-control" placeholder="Opdracht naam">
                </div>
                
                <div class="mb-3">
                  <label class="form-label">Selecteer een klant</label>
                  
                  <x-moneybird-contact-selector name="klant_moneybird_id" placeholder="Selecteer een klant..."/>
                </div>
                
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Start datum</label>
                  <input type="text" name="start_datum" class="form-control flatpickr" placeholder="Start datum">
                </div>
                <div class="mb-3">
                  <label class="form-label">Eind datum</label>
                  <input type="text" name="eind_datum" class="form-control flatpickr" placeholder="Eind datum">
                </div>

              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="exampleFormControlInput1">Omschrijving</label>
              <textarea type="text" name="omschrijving" class="form-control" placeholder="Opdracht omschrijving" rows="4">
              </textarea>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-check ms-1"></i> Opdracht toevoegen</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</x-app-layout>