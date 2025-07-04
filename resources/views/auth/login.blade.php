<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div
            class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">{{ __('Sign In') }}</h2>
            <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">{{ __('The most reliable e-commerce') }}</div>
            <div class="intro-x mt-8">



                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <input id="email" name="email" type="email"
                        class="intro-x login__input form-control py-3 px-4 block" placeholder="Email"
                        :value="old('email')" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    <!-- Password -->
                    <input id="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-4"
                        placeholder="Password" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Remember Me -->
                    <div class="intro-x flex text-slate-600 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            <input id="remember-me" name="remember" type="checkbox"
                                class="form-check-input border mr-2">
                            <label class="cursor-pointer select-none" for="remember-me">{{ __('Remember me') }}</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
                        @endif

                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button type="submit" id="btn-login"
                            class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">{{ __('Log in') }}</button>
                        <a href="{{ route('register') }}"
                            class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">{{ __('Register') }}</a>
                    </div>
                </form>

            </div>
            {{-- <div class="intro-x mt-10 xl:mt-24 text-slate-600 text-center xl:text-left">
                By signin up, you agree to our <a class="text-primary" href="">Terms and Conditions</a> & <a
                    class="text-primary" href="">Privacy Policy</a>
            </div> --}}
        </div>
    </div>

    @push('java')
        <script>
            // Success notification
            $("#success-notification-toggle").on("click", function() {
                Toastify({
                    node: $("#success-notification-content")
                        .clone()
                        .removeClass("hidden")[0],
                    duration: -1,
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                }).showToast();
            });
        </script>
    @endpush

</x-guest-layout>
