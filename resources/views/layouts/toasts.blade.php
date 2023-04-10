<button id="liveToastBtn" class="btn btn-primary">Toast</button>

@if(session()->has('successMessage'))
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 10000">
    <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Gelukt!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        {{ session()->get('successMessage'); }}
      </div>
    </div>
  </div>
  <!-- End Toast -->
  
  <script type="module">
    const liveToast = new Toast(document.querySelector('#liveToast'))
    liveToast.show();
  </script>
@endif