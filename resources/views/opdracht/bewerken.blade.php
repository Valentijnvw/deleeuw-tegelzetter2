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

<x-app-layout title="Opdracht bewerken" header="Opdracht bewerken">
    <!-- End Page Header -->
    <div class="card p-4">
        <form method="POST" action="{{ route('opdracht.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body row">
                <p class="mb-3">
                    Klant: {{ $opdracht->moneybirdContact->displayName() }}
                </p>
                    <div class="col-lg-6">
                        <div class="row">
                            <h2>Opdracht gegevens</h2>
                            <span class="divider-end mb-4"></span>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Opdracht titel</label>
                                    <x-input-text name="titel" placeholder="Opdracht titel" value="{{ $opdracht->titel }}" />
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
                                    <x-input-text type="text" name="start_datum" class="flatpickr" placeholder="Start datum" value="{{ Carbon::parse($opdracht->start_datum)->format('d-m-Y') }}" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Eind datum</label>
                                    <x-input-text type="text" name="eind_datum" class="form-control flatpickr" placeholder="Eind datum" value="{{ Carbon::parse($opdracht->eind_datum)->format('d-m-Y') }}" />
                                </div>
                            </div>
                
                
                            
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Omschrijving</label>
                            <x-input-textarea type="text" name="omschrijving" class="form-control" placeholder="Opdracht omschrijving" rows="4">
                            {{ $opdracht->omschrijving }}
                            </x-input-textarea>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save ms-1"></i> Wijzigingen opslaan</button>
                    </div>
                    <div class="col-lg-6">
                        <h2>Foto's</h2>
                        <span class="divider-end mb-4"></span>
                        @if(count($imageUrlList) > 0)
                        <div id="carousel" class="carousel slide" data-bs-ride="carousel" data-interval="false">
                            <div class="mb-2">
                                <button type="button" class="btn btn-primary"  data-bs-target="#carousel" data-bs-slide="prev">
                                    <i class="fas fa-arrow-left"></i> Vorige afbeelding
                                </button>
                                <button type="button" class="btn btn-primary"  data-bs-target="#carousel" data-bs-slide="next">
                                    <i class="fas fa-arrow-right"></i> Volgende afbeelding
                                </button>
                            </div>
                            <div class="carousel-inner">
                                @foreach ($imageUrlList as $imageSrc)
                                <div @class(["carousel-item", "active" => $loop->index == 0])>
                                  <img src="{{ $imageSrc }}" class="d-block w-100" alt="..." style="width: 200px;">
                                </div>
                                @endforeach

                            </div>
                            <button class="carousel-control-prev" type="button">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                          </div>
                        </div>

                        @else
                            <p>Er zijn geen foto's geupload bij deze opdracht</p>
                        @endif

            </div>
        </form>
    </div>
</x-app-layout>