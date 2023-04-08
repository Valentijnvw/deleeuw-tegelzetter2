<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="js-validate needs-validation" novalidate>
        @csrf
        <div class="text-center">
            <div class="mb-5">
            <h1 class="display-5">Inloggen</h1>
            {{-- <p>Don't have an account yet? <a class="link" href="./authentication-signup-basic.html">Sign up here</a></p> --}}
            </div>

        </div>

        <!-- Form -->
        <div class="mb-4">
            <label class="form-label" for="signinSrEmail">E-mailadres</label>
            <input type="email" class="form-control form-control-lg" name="email" id="signinSrEmail" tabindex="1" placeholder="E-mailadres" required>
            <span class="invalid-feedback">Please enter a valid email address.</span>
        </div>
        <!-- End Form -->

        <!-- Form -->
        <div class="mb-4">
            <label class="form-label w-100" for="signupSrPassword" tabindex="0">
            <span class="d-flex justify-content-between align-items-center">
                <span>Wachtwoord</span>
                <a class="form-label-link mb-0" href="{{ route('password.request') }}">Wachtwoord vergeten?</a>
            </span>
            </label>

            <div class="input-group input-group-merge" data-hs-validation-validate-class>
            <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="signupSrPassword" placeholder="Wachtwoord" required minlength="8" data-hs-toggle-password-options='{
                    "target": "#changePassTarget",
                    "defaultClass": "bi-eye-slash",
                    "showClass": "bi-eye",
                    "classChangeTarget": "#changePassIcon"
                    }'>
            <a id="changePassTarget" class="input-group-append input-group-text" href="javascript:;">
                <i id="changePassIcon" class="bi-eye"></i>
            </a>
            </div>

            <span class="invalid-feedback">Please enter a valid password.</span>
        </div>
        <!-- End Form -->

        <!-- Form Check -->
        <div class="form-check mb-4">
            <input class="form-check-input" name="remember" type="checkbox" id="termsCheckbox">
            <label class="form-check-label" for="termsCheckbox">
            Blijf ingelogd
            </label>
        </div>
        <!-- End Form Check -->

        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
        </div>
    </form>
    <!-- End Form -->


</x-guest-layout>
