@push("scripts")
<script type="module">
//   HSCore.components.HSDatatables.init('.js-datatable')
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
          <form method="POST" action="{{ route('gebruiker.create') }}">
            @csrf
            <!-- Form -->
            <div class="row mb-4">
              <label for="firstNameLabel" class="col-sm-3 col-form-label form-label">Naam</label>

              <div class="col-sm-9">
                <div class="input-group input-group-sm-vertical">
                  <input type="text" class="form-control" name="first_name" id="firstNameLabel" placeholder="Voornaam">
                  <input type="text" class="form-control" name="last_name" id="lastNameLabel" placeholder="Achternaam">
                </div>
              </div>
            </div>
            <!-- End Form -->

            <!-- Form -->
            <div class="row mb-4">
              <label for="emailLabel" class="col-sm-3 col-form-label form-label">E-mailadres</label>

              <div class="col-sm-9">
                <input type="email" class="form-control" name="email" placeholder="E-mailadres">
              </div>
            </div>
            <!-- End Form -->

            <!-- Form -->
            <div class="row mb-4">
              <label for="wachtwoord" class="col-sm-3 col-form-label form-label">Wachtwoord</label>

              <div class="col-sm-9">
                <input type="password" class="form-control" name="password" id="wachtwoord" placeholder="Wachtwoord">
              </div>
            </div>
            <!-- End Form -->

            <div class="row mb-4">
                <label for="herhaal-wachtwoord" class="col-sm-3 col-form-label form-label">Herhaal wachtwoord</label>
  
                <div class="col-sm-9">
                  <input type="password" class="form-control" name="password_confirm" id="herhaal-wachtwoord" placeholder="Herhaal wachtwoord">
                </div>
              </div>


            <!-- Form -->
            <div id="accountType" class="row mb-4">
              <label class="col-sm-3 col-form-label form-label">Functie</label>

              <div class="col-sm-9">
                <div class="input-group input-group-sm-vertical">
                  <!-- Radio Check -->
                @foreach ($roleList as $role)
                    <label class="form-control" for="role-{{ $role->id }}">
                        <span class="form-check">
                            <input type="radio" class="form-check-input" value="{{ $role->id }}" name="role_id" id="role-{{ $role->id }}" checked="">
                            <span class="form-check-label">{{ $role->name }}</span>
                        </span>
                    </label>
                @endforeach
                  <!-- End Radio Check -->

                </div>
              </div>
            </div>
            <!-- End Form -->


            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Gebruiker toevoegen</button>
            </div>
          </form>
          <!-- End Form -->
        </div>
        <!-- End Body -->
      </div>

</x-app-layout>
