<x-app-layout title="Opdrachten" header="Opdrachten">
  
<div x-data="{tab: 'nieuw'}">
  <a class="btn btn-secondary mb-3" href="{{ route('opdracht.create') }}" style="width: 200px;">
    <i class="fas fa-plus"></i> Opdracht toevoegen</a>
    <div class="card">
      <div class="card-header">
        <div class="row flex-grow-1 align-items-right">
          <div class="col-auto">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link" :class="tab === 'nieuw' ? 'active' : ''" href="#" @click="tab='nieuw'">Nieuw</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" :class="tab === 'ingepland' ? 'active' : ''" href="#" @click="tab='ingepland'; window.drawIngepland()">Ingepland</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" :class="tab === 'te-factureren' ? 'active' : ''" href="#" @click="tab='te-factureren'">Te factureren</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" :class="tab === 'archief' ? 'active' : ''" href="#" @click="tab='archief'">Archief</a>
              </li>
            </ul>
          </div>
          {{-- <div class="col-auto">
            <div class="dropdown">
              <button type="button" class="btn btn-white btn-sm w-100" id="usersFilterDropdown" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-expanded="false">
                <i class="fas fa-filter me-1"></i> Filter
              </button>
  
              <div id="filterDropdown" class="collapse dropdown-menu-sm-end dropdown-card card-dropdown-filter-centered" aria-labelledby="usersFilterDropdown" style="min-width: 22rem;">
                <!-- Card -->
                <div class="card">
                  <div class="card-header card-header-content-between">
                    <h5 class="card-header-title">Filter users</h5>
  
                    <!-- Toggle Button -->
                    <button type="button" class="btn btn-ghost-secondary btn-icon btn-sm ms-2">
                      <i class="bi-x-lg"></i>
                    </button>
                    <!-- End Toggle Button -->
                  </div>
  
                  <div class="card-body">
                    <form>
                      <div class="row">
                        <div class="col-sm mb-4">
                          <small class="text-cap text-body">Position</small>
  
                          <!-- Select -->
                          <div class="tom-select-custom">
                            <select class="js-select js-datatable-filter form-select form-select-sm tomselected ts-hidden-accessible" data-target-column-index="2" data-hs-tom-select-options="{
                                      &quot;placeholder&quot;: &quot;Any&quot;,
                                      &quot;searchInDropdown&quot;: false,
                                      &quot;hideSearch&quot;: true,
                                      &quot;dropdownWidth&quot;: &quot;10rem&quot;
                                    }" id="tomselect-1" tabindex="-1">
                              <option value="">Any</option>
                              <option value="Accountant">Accountant</option>
                              <option value="Co-founder">Co-founder</option>
                              <option value="Designer">Designer</option>
                              <option value="Developer">Developer</option>
                              <option value="Director">Director</option>
                            </select><div class="ts-wrapper js-select js-datatable-filter form-select form-select-sm single plugin-change_listener plugin-hs_smart_position"><div class="ts-control"><div class="ts-custom-placeholder">Any</div></div><div class="tom-select-custom"><div class="ts-dropdown single plugin-change_listener plugin-hs_smart_position" style="display: none;"><div role="listbox" tabindex="-1" class="ts-dropdown-content" id="tomselect-1-ts-dropdown"></div></div></div></div>
                            <!-- End Select -->
                          </div>
                        </div>
                        <!-- End Col -->
  
                        <div class="col-sm mb-4">
                          <small class="text-cap text-body">Status</small>
  
                          <select name="" id="statusSelect">
                            <option value=""></option>
                            <option value="f"><span class="legend-indicator bg-success"></span>Completed</span></option>
                          </select>
                        </div>
                        <!-- End Col -->
  
                      </div>
                      <!-- End Row -->
  
                      <div class="d-grid">
                        <a class="btn btn-primary" href="javascript:;">Apply</a>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- End Card -->
              </div>
            </div>
          </div> --}}
          <div class="col-auto ms-auto">
              <!-- Filter -->
              <form class="mt-3">
                <!-- Search -->
                <div class="input-group input-group-merge input-group-flush">
                  <div class="input-group-prepend input-group-text">
                    <i class="fas fa-search"></i>
                  </div>
                  <input id="tableSearch" type="search" class="form-control" placeholder="Opdracht zoeken" aria-label="Opdracht zoeken">
                </div>
                <!-- End Search -->
              </form>
              <!-- End Filter -->
          </div>
        </div>
        
      </div>
      <!-- End Header -->
        @include('opdracht.tables.nieuw')
        @include('opdracht.tables.ingepland')
      
        <!-- Footer -->
        <div class="card-footer">
          <!-- Pagination -->
          <div class="d-flex justify-content-center justify-content-sm-end">
            <nav id="paginationNav" aria-label="Activity pagination"></nav>
          </div>
          <!-- End Pagination -->
        </div>
        <!-- End Footer -->
      </div>
  
  <!-- Modal -->
  <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="{{route('opdracht.verwijderen')}}" method="POST">
        @csrf
        @method('delete')
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Weet je het zeker?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="opdracht-verwijderen-id" name="opdracht_verwijder_id" />
          <p>Klik op "Opdracht verwijderen" om de opdracht definitief te verwijderen. Let op: deze actie kan <strong>niet</strong> ongedaan worden gemaakt!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-bs-dismiss="modal">Annuleren</button>
          <button type="submit" class="btn btn-primary">Opdracht verwijderen</button>
        </div>
      </div>
      </form>
  </div>
  </div>
  <!-- End Modal -->

</div>


</x-app-layout>
