@push("scripts")
<script type="module">
  window.mbUserSelected = function(user) {
    if(user) {
      $("[name='first_name']").val(user.first_name)
      $("[name='last_name']").val(user.last_name)
      $("[name='email']").val(user.email)
    }
  }

  $("[name='role_id']").change(function() {
    let roleId = $(this).val();
    if(roleId != 4) {
      $("[name='email']").prop('readonly', false)
    } else {
      $("[name='email']").prop('readonly', true)
    }
  })
</script>
@endpush

@php
    // dd($roleList)
@endphp

<x-app-layout title="Gebruiker toevoegen" header="Gebruiker toevoegen">
  
    <div class="card container">

        <!-- Body -->
        <div class="card-body">
          <!-- Form -->
          <form method="POST" action="{{ route('gebruiker.create') }}" x-data="{functie: -1}">
            @csrf

            <!-- Form -->
            <div id="accountType" class="row mb-4">
              <label class="col-sm-3 col-form-label form-label">Functie</label>

              <div class="col-sm-9">
                <div class="input-group input-group-sm-vertical">
                  <!-- Radio Check -->
                @foreach ($roleList as $role)
                    <label class="form-control" for="role-{{ $role->id }}">
                        <span class="form-check">
                            <input type="radio" class="form-check-input" value="{{ $role->id }}" name="role_id" id="role-{{ $role->id }}" checked="" x-model="functie">
                            <span class="form-check-label">{{ $role->name }}</span>
                        </span>
                    </label>
                @endforeach
                <!-- End Radio Check -->

                </div>
              </div>
            </div>
            <!-- End Form -->

            <div class="row mb-3" x-show="functie == 4">
              <label class="col-sm-3 col-form-label form-label">Selecteer een klant</label>
              <div class="col-sm-9">
                <x-moneybird-contact-selector :invalid="$errors->any('klant_moneybird_id')" name="klant_moneybird_id" placeholder="Selecteer een klant..."/>
              </div>
            </div>


            <!-- Form -->
            <div class="row mb-4">
              <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Naam</label>

              <div class="col-sm-9">
                <div class="input-group input-group-sm-vertical">
                  <x-input-text type="text" name="first_name" id="firstNameLabel" placeholder="Voornaam" />
                  <x-input-text type="text" name="last_name" id="lastNameLabel" placeholder="Achternaam" />
                </div>
              </div>
            </div>
            <!-- End Form -->

            <!-- Form -->
            <div class="row mb-4">
              <label for="emailLabel" class="col-sm-3 col-form-label form-label">E-mailadres</label>

              <div class="col-sm-9">
                <x-input-text type="email" class="form-control" name="email" placeholder="E-mailadres" />
              </div>
            </div>
            <!-- End Form -->

            <!-- Form -->
            <div class="row mb-4">
              <label for="wachtwoord" class="col-sm-3 col-form-label form-label">Wachtwoord</label>

              <div class="col-sm-9">
                <x-input-text type="password" class="form-control" name="password" id="wachtwoord" placeholder="Wachtwoord" />
              </div>
            </div>
            <!-- End Form -->

            <div class="row mb-4">
                <label for="herhaal-wachtwoord" class="col-sm-3 col-form-label form-label">Herhaal wachtwoord</label>
  
                <div class="col-sm-9">
                  <x-input-text type="password" class="form-control" name="password_confirm" id="herhaal-wachtwoord" placeholder="Herhaal wachtwoord" />
                </div>
            </div>

            

            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Gebruiker toevoegen</button>
            </div>
          </form>
          <!-- End Form -->
        </div>
        <!-- End Body -->
      </div>

</x-app-layout>
