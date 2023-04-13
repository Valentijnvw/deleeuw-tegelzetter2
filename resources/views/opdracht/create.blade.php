@push("scripts")
<script type="module">
  flatpickr('.flatpickr', {
    dateFormat: "d-m-Y",
  });

  new TomSelect("#aannemer-select", {
    placeholder: "Selecteer een aannemer..."
  });
</script>
@endpush

<x-app-layout title="Opdracht toevoegen" header="Opdracht toevoegen">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <!-- End Page Header -->
      <div class="card p-4">
        <form method="POST" action="{{ route('opdracht.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Opdracht titel</label>
                  <x-input-text name="titel" placeholder="Opdracht titel" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Selecteer een klant</label>
                  <x-moneybird-contact-selector :invalid="$errors->any('klant_moneybird_id')" name="klant_moneybird_id" placeholder="Selecteer een klant..."/>
                    
                </div>

                <div class="mb-3">
                  <label class="form-label">Selecteer een aannemer</label>
                  <select @class(["js-select", "form-select", "is-invalid" => $errors->any('aannemer_user_id')]) id="aannemer-select" name="aannemer_user_id" autocomplete="off">
                    @foreach ($aannemerList as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name . " " . $user->last_name }}</option>
                    @endforeach
                  </select>
                  <x-input-error-messages :messages="$errors->get('aannemer_user_id')" />

                </div>
                
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Start datum</label>
                  <x-input-text type="text" name="start_datum" class="flatpickr" placeholder="Start datum" />
                </div>
                <div class="mb-3">
                  <label class="form-label">Eind datum</label>
                  <x-input-text type="text" name="eind_datum" class="form-control flatpickr" placeholder="Eind datum" />
                </div>

                <div class="mb-3">
                  <label class="form-label">Foto's uploaden</label>
                  <input type="file" name="fotos[]" id="customFileEg1" class="form-control" multiple="multiple">
                </div>
              </div>


              
            </div>
            <div class="mb-3">
              <label class="form-label" for="exampleFormControlInput1">Omschrijving</label>
              <x-input-textarea type="text" name="omschrijving" class="form-control" placeholder="Opdracht omschrijving" rows="4">
              </x-input-textarea>
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