<x-app-layout>

  <div class="page-header">
      <div class="row align-items-end">
        <div class="col-sm mb-2 mb-sm-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-no-gutter">
              <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Pages</a></li>
              <li class="breadcrumb-item"><a class="breadcrumb-link" href="javascript:;">Users</a></li>
              <li class="breadcrumb-item active" aria-current="page">Overview</li>
            </ol>
          </nav>

          <h1 class="page-header-title">Users</h1>
        </div>
        <!-- End Col -->

        <div class="col-sm-auto">
          <a class="btn btn-primary" :href="route('opdracht.add')">
            <i class="bi-calendar-plus-fill me-1"></i> Opdracht toevoegen
          </a>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Row -->
    </div>
    <!-- End Page Header -->


    <!-- Card -->
    <div class="card">
      <!-- Header -->
      <div class="card-header card-header-content-md-between">
        <div class="mb-2 mb-md-0">
          <form>
            <!-- Search -->
            <div class="input-group input-group-merge input-group-flush">
              <div class="input-group-prepend input-group-text">
                <i class="bi-search"></i>
              </div>
              <input id="datatableSearch" type="search" class="form-control" placeholder="Search users" aria-label="Search users">
            </div>
            <!-- End Search -->
          </form>
        </div>

        <div class="d-grid d-sm-flex justify-content-md-end align-items-sm-center gap-2">
          <!-- Datatable Info -->
          <div id="datatableCounterInfo" style="display: none;">
            <div class="d-flex align-items-center">
              <span class="fs-5 me-3">
                <span id="datatableCounter">0</span>
                Selected
              </span>
              <a class="btn btn-outline-danger btn-sm" href="javascript:;">
                <i class="bi-trash"></i> Delete
              </a>
            </div>
          </div>
          <!-- End Datatable Info -->
        </div>
      </div>
      <!-- End Header -->

      <!-- Table -->
      <div class="table-responsive datatable-custom position-relative">
        <table class="js-datatable table table-lg table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
          <thead class="thead-light">
            <tr>
              <th>Klant</th>
              <th>Omschrijving</th>
              <th>Start datum</th>
              <th>Eind datum</th>
            </tr>
          </thead>

          <tbody>
            {{-- <tr v-for="opdracht in opdrachtenList" :key="opdracht.id">
            <!-- <td>{{ opdracht.contact.firstname + " " + opdracht.contact.lastname }}</td> -->
            <td>Test naam</td>
            <td>{{ truncateString(opdracht.omschrijving, 100) }}</td>
            <td>{{ opdracht.start_datum }}</td>
            <td>{{ opdracht.eind_datum }}</td> --}}
          </tr>
          </tbody>
        </table>
      </div>
      <!-- End Table -->

    </div>

</x-app-layout>