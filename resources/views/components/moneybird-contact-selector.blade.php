@props([
    'name',
    'placeholder',
	'invalid',
])

@push('scripts')

<script type="module">
	let users = [];
    var settings = {
		valueField: 'moneybird_id',
		searchField: ['first_name','last_name', 'company_name', 'email', 'phone', 'city'],
        placeholder: "{{ $placeholder }}",
		// fetch remote data
		load: function(query, callback) {
			var url = '/api/moneybird-test?q=' + encodeURIComponent(query);
			fetch(url)
				.then(response => response.json())
				.then(json => {
					users = json.items;
					callback(json);
				}).catch(()=>{
					callback();
				});
		},
		onChange: function(value) {
			// window callback uitvoeren
			let user = users.find(user => user.moneybird_id == value)
			window.mbUserSelected(user)
		},
		render: {
			option: function(item, escape) {
        let title = item.first_name + " " + item.last_name;
        if(item.company_name) {
          title = item.company_name
        }

        item.city = item.city === "" ? "Onbekend" : item.city;

				return `<div class="row border-bottom py-2">
							<div class="col-md-11">
								<div class="mt-0">${escape(title)}
									<span class="small text-muted">${escape(item.email)}</span>
								</div>
								<div class="mb-1"><i class="bi bi-geo"></i> ${escape(item.city)}</div>
								<div class="d-flex text-muted">
								</div>
							</div>
						</div>`;
			},
			item: function(item, escape) {
        let title = item.first_name + " " + item.last_name;
        if(item.company_name) {
          title = item.company_name
        }
				return `<div class="py-2 d-flex">
							<div>
								<div class="mb-1">
									<span class="h4">
										${ escape(title) }
									</span>
									<span class="text-muted">${ escape(item.email) }</span>
								</div>
						 		<div class="description">
                  <i class="bi bi-geo"></i> ${ escape(item.city) }
                </div>
							</div>
						</div>`;
			}

		}
	};

    new TomSelect(".moneybird-contact-selector", settings);
</script>

@endPush

<select @class(["js-select", "form-select", "moneybird-contact-selector", "is-invalid" => $errors->any($name)]) name="{{$name}}" autocomplete="off"></select>
<x-input-error-messages :messages="$errors->get($name)" />