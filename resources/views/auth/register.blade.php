<x-guest-layout>

    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
        <div
            class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">{{ __('Register') }}</h2>
            <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">{{ __('The most reliable e-commerce') }}</div>
            <div class="intro-x mt-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <input id="name" type="text" class="intro-x login__input form-control py-3 px-4 block"
                        placeholder="{{ __('Name') }}" name="name" :value="old('name')" required autofocus
                        autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                    <!-- Last name -->
                    <input id="last_name" type="text" class="intro-x login__input form-control py-3 px-4 block mt-2"
                        placeholder="{{ __('Last name') }}" name="last_name" :value="old('last_name')" required>
                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />

                    <!-- Email Address -->
                    <input id="email" name="email" type="email"
                        class="intro-x login__input form-control py-3 px-4 block mt-2" placeholder="{{ __('Email') }}"
                        type="email" name="email" :value="old('email')" required autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    {{-- document --}}
                    <div class="intro-x input-group mt-2">
                        <div id="phone" class="input-group">
                            <select class="form-select form-select-lg w-40"
                                name="document_type"
                                aria-label="Default select example" required>
                                <option  value="">{{__('Documento')}}</option>
                                @foreach (\App\Enums\TypeOfDocuments::cases() as $item)
                                    <option value="{{old('document_type', $item->value)}}">{{$item->name}}</option>
                                @endforeach
                            </select>                            
                        </div>                       
                        <input type="text" name="document_number" :value="old('document_number')" class="form-control"
                            placeholder="{{ __('Cedula/RIF') }}" aria-label="document_number" aria-describedby="document_number" required>                        
                    </div>
                    <x-input-error :messages="$errors->get('document_type')" class="mt-2" />
                    <x-input-error :messages="$errors->get('document_number')" class="mt-2" />

                    {{-- Phone --}}
                    <div class="intro-x input-group mt-2">
                        <div id="phone" class="input-group">

                            <select class="form-select form-select-lg w-40"
                                name="phone_type"
                                aria-label="Default select example" required>
                                    <option value="">{{__('Operadora')}}</option>
                                @foreach (\App\Enums\TypeOfPhone::cases() as $item)
                                    <option value="{{old('phone_type', $item->value)}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <input type="text" name="phone_number" :value="old('phone_number')" class="form-control"
                            placeholder="{{ __('Phone') }}" aria-label="phone_number" aria-describedby="phone_number" required>
                        
                    </div>
                    <x-input-error :messages="$errors->get('phone_type')" class="mt-2" />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />

                    <!-- Password -->
                    <input id="password" type="password" class="intro-x login__input form-control py-3 px-4 block mt-2"
                        placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    <!-- Confirm Password -->
                    <input id="password_confirmation" type="password"
                        class="intro-x login__input form-control py-3 px-4 block mt-2"
                        placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required
                        autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                    <div class="intro-x flex text-slate-600 text-xs sm:text-sm mt-2">
                        <div class="flex items-center mr-auto">
                            <a href="{{ route('login') }}">{{ __('Already registered?') }}</a>
                        </div>
                    </div>
                    <div class="intro-x mt-5 xl:mt-4 text-center xl:text-left">
                        <button type="submit" id="btn-login"
                            class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">{{ __('Register') }}</button>

                    </div>
                </form>

            </div>
            <div class="intro-x mt-4 xl:mt-2 text-slate-600 text-center xl:text-left">
                Al registrarse, usted acepta nuestros <a class="text-primary" href="">Terminos y condiciones</a>
                & <a class="text-primary" href="">Politicas de Privacidad</a>
            </div>
        </div>
    </div>


</x-guest-layout>

{{--  --}}
