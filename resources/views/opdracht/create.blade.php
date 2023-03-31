<x-app-layout title="Opdracht toevoegen" header="Opdracht toevoegen">
        <form>
            <div class="flex flex-row">
                <div class="basis-1/4">
                    Binnenkort beschikbaar
                    <input type="text" name="Naam" class="form-input" />
                    <x-moneybird-contact-selector name="test123" placeholder="456"/>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                <div class="basis-1/4">
                    
                </div>
            </div>
            
          
            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
              <button type="submit" class="rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
          </form>
</x-app-layout>