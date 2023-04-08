@props([
    'name',
    'placeholder',
])

@push('scripts')

<script>
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
					callback(json);
				}).catch(()=>{
					callback();
				});
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

    setInterval(() => {console.log(window.TomSelect)}, 1000)
    new TomSelect(".moneybird-contact-selector", settings);
</script>

@endPush

<select class="js-select form-select moneybird-contact-selector" name="{{$name}}" autocomplete="off"></select>