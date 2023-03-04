<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if (session('message'))
            <div class="my-4">
                <h3 class="text-center text-xl text-red-500">{{ session('message') }}</h3>
            </div>
        @endif
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <div class="flex items-center relative">
                <span class="absolute left-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17 21.25H7C3.35 21.25 1.25 19.15 1.25 15.5V8.5C1.25 4.85 3.35 2.75 7 2.75H17C20.65 2.75 22.75 4.85 22.75 8.5V15.5C22.75 19.15 20.65 21.25 17 21.25ZM7 4.25C4.14 4.25 2.75 5.64 2.75 8.5V15.5C2.75 18.36 4.14 19.75 7 19.75H17C19.86 19.75 21.25 18.36 21.25 15.5V8.5C21.25 5.64 19.86 4.25 17 4.25H7Z"
                            fill="#292D32" />
                        <path
                            d="M11.9988 12.868C11.1588 12.868 10.3088 12.608 9.6588 12.078L6.5288 9.57802C6.2088 9.31802 6.14881 8.84802 6.4088 8.52802C6.6688 8.20802 7.13881 8.14802 7.45881 8.40802L10.5888 10.908C11.3488 11.518 12.6388 11.518 13.3988 10.908L16.5288 8.40802C16.8488 8.14802 17.3288 8.19802 17.5788 8.52802C17.8388 8.84802 17.7888 9.32802 17.4588 9.57802L14.3288 12.078C13.6888 12.608 12.8388 12.868 11.9988 12.868Z"
                            fill="#292D32" />
                    </svg>
                </span>
                <x-text-input id="email" class="block mt-1 w-full pl-10" type="email" name="email"
                    :value="old('email')" required autofocus placeholder='Entrer votre adresse email' />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <div class=" flex items-center relative">
                <span class="absolute left-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18 10.75C17.59 10.75 17.25 10.41 17.25 10V8C17.25 4.85 16.36 2.75 12 2.75C7.64 2.75 6.75 4.85 6.75 8V10C6.75 10.41 6.41 10.75 6 10.75C5.59 10.75 5.25 10.41 5.25 10V8C5.25 5.1 5.95 1.25 12 1.25C18.05 1.25 18.75 5.1 18.75 8V10C18.75 10.41 18.41 10.75 18 10.75Z"
                            fill="#292D32" />
                        <path
                            d="M12 19.25C10.21 19.25 8.75 17.79 8.75 16C8.75 14.21 10.21 12.75 12 12.75C13.79 12.75 15.25 14.21 15.25 16C15.25 17.79 13.79 19.25 12 19.25ZM12 14.25C11.04 14.25 10.25 15.04 10.25 16C10.25 16.96 11.04 17.75 12 17.75C12.96 17.75 13.75 16.96 13.75 16C13.75 15.04 12.96 14.25 12 14.25Z"
                            fill="#292D32" />
                        <path
                            d="M17 22.75H7C2.59 22.75 1.25 21.41 1.25 17V15C1.25 10.59 2.59 9.25 7 9.25H17C21.41 9.25 22.75 10.59 22.75 15V17C22.75 21.41 21.41 22.75 17 22.75ZM7 10.75C3.42 10.75 2.75 11.43 2.75 15V17C2.75 20.57 3.42 21.25 7 21.25H17C20.58 21.25 21.25 20.57 21.25 17V15C21.25 11.43 20.58 10.75 17 10.75H7Z"
                            fill="#292D32" />
                    </svg>
                </span>
                <input autocomplete="current-password" placeholder="Entrer votre mot de passe" id="password"
                    type="password" name="password" required=""
                    class="block px-10 mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <span class="absolute right-1" id='visibility'>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.9999 16.3299C9.60992 16.3299 7.66992 14.3899 7.66992 11.9999C7.66992 9.60992 9.60992 7.66992 11.9999 7.66992C14.3899 7.66992 16.3299 9.60992 16.3299 11.9999C16.3299 14.3899 14.3899 16.3299 11.9999 16.3299ZM11.9999 9.16992C10.4399 9.16992 9.16992 10.4399 9.16992 11.9999C9.16992 13.5599 10.4399 14.8299 11.9999 14.8299C13.5599 14.8299 14.8299 13.5599 14.8299 11.9999C14.8299 10.4399 13.5599 9.16992 11.9999 9.16992Z"
                            fill="#292D32"></path>
                        <path
                            d="M12.0001 21.02C8.24008 21.02 4.69008 18.82 2.25008 15C1.19008 13.35 1.19008 10.66 2.25008 8.99998C4.70008 5.17998 8.25008 2.97998 12.0001 2.97998C15.7501 2.97998 19.3001 5.17998 21.7401 8.99998C22.8001 10.65 22.8001 13.34 21.7401 15C19.3001 18.82 15.7501 21.02 12.0001 21.02ZM12.0001 4.47998C8.77008 4.47998 5.68008 6.41998 3.52008 9.80998C2.77008 10.98 2.77008 13.02 3.52008 14.19C5.68008 17.58 8.77008 19.52 12.0001 19.52C15.2301 19.52 18.3201 17.58 20.4801 14.19C21.2301 13.02 21.2301 10.98 20.4801 9.80998C18.3201 6.41998 15.2301 4.47998 12.0001 4.47998Z"
                            fill="#292D32"></path>
                    </svg>
                </span>
                <span class="absolute right-1 hidden" id='unvisibility'>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.46992 15.2799C9.27992 15.2799 9.08992 15.2099 8.93992 15.0599C8.11992 14.2399 7.66992 13.1499 7.66992 11.9999C7.66992 9.60992 9.60992 7.66992 11.9999 7.66992C13.1499 7.66992 14.2399 8.11992 15.0599 8.93992C15.1999 9.07992 15.2799 9.26992 15.2799 9.46992C15.2799 9.66992 15.1999 9.85992 15.0599 9.99992L9.99992 15.0599C9.84992 15.2099 9.65992 15.2799 9.46992 15.2799ZM11.9999 9.16992C10.4399 9.16992 9.16992 10.4399 9.16992 11.9999C9.16992 12.4999 9.29992 12.9799 9.53992 13.3999L13.3999 9.53992C12.9799 9.29992 12.4999 9.16992 11.9999 9.16992Z"
                            fill="#292D32" />
                        <path
                            d="M5.59984 18.51C5.42984 18.51 5.24984 18.45 5.10984 18.33C4.03984 17.42 3.07984 16.3 2.25984 15C1.19984 13.35 1.19984 10.66 2.25984 8.99998C4.69984 5.17998 8.24984 2.97998 11.9998 2.97998C14.1998 2.97998 16.3698 3.73998 18.2698 5.16998C18.5998 5.41998 18.6698 5.88998 18.4198 6.21998C18.1698 6.54998 17.6998 6.61998 17.3698 6.36998C15.7298 5.12998 13.8698 4.47998 11.9998 4.47998C8.76984 4.47998 5.67984 6.41998 3.51984 9.80998C2.76984 10.98 2.76984 13.02 3.51984 14.19C4.26984 15.36 5.12984 16.37 6.07984 17.19C6.38984 17.46 6.42984 17.93 6.15984 18.25C6.01984 18.42 5.80984 18.51 5.59984 18.51Z"
                            fill="#292D32" />
                        <path
                            d="M12.0006 21.02C10.6706 21.02 9.37055 20.75 8.12055 20.22C7.74055 20.06 7.56055 19.62 7.72055 19.24C7.88055 18.86 8.32055 18.68 8.70055 18.84C9.76055 19.29 10.8706 19.52 11.9906 19.52C15.2206 19.52 18.3106 17.58 20.4706 14.19C21.2206 13.02 21.2206 10.98 20.4706 9.81C20.1606 9.32 19.8205 8.85 19.4606 8.41C19.2006 8.09 19.2506 7.62 19.5706 7.35C19.8906 7.09 20.3605 7.13 20.6306 7.46C21.0206 7.94 21.4006 8.46 21.7406 9C22.8006 10.65 22.8006 13.34 21.7406 15C19.3006 18.82 15.7506 21.02 12.0006 21.02Z"
                            fill="#292D32" />
                        <path
                            d="M12.6896 16.2701C12.3396 16.2701 12.0196 16.0201 11.9496 15.6601C11.8696 15.2501 12.1396 14.8601 12.5496 14.7901C13.6496 14.5901 14.5696 13.6701 14.7696 12.5701C14.8496 12.1601 15.2396 11.9001 15.6496 11.9701C16.0596 12.0501 16.3296 12.4401 16.2496 12.8501C15.9296 14.5801 14.5496 15.9501 12.8296 16.2701C12.7796 16.2601 12.7396 16.2701 12.6896 16.2701Z"
                            fill="#292D32" />
                        <path
                            d="M1.99945 22.75C1.80945 22.75 1.61945 22.68 1.46945 22.53C1.17945 22.24 1.17945 21.76 1.46945 21.47L8.93945 14C9.22945 13.71 9.70945 13.71 9.99945 14C10.2895 14.29 10.2895 14.77 9.99945 15.06L2.52945 22.53C2.37945 22.68 2.18945 22.75 1.99945 22.75Z"
                            fill="#292D32" />
                        <path
                            d="M14.5307 10.2199C14.3407 10.2199 14.1507 10.1499 14.0007 9.99994C13.7107 9.70994 13.7107 9.22994 14.0007 8.93994L21.4707 1.46994C21.7607 1.17994 22.2407 1.17994 22.5307 1.46994C22.8207 1.75994 22.8207 2.23994 22.5307 2.52994L15.0607 9.99994C14.9107 10.1499 14.7207 10.2199 14.5307 10.2199Z"
                            fill="#292D32" />
                    </svg>
                </span>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-primary-button>
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>


        <div class="flex justify-between items-center">
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                </label>
            </div>

            <div class="mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublie?') }}
                    </a>
                @endif
            </div>
        </div>
        <!-- Remember Me -->
    </form>
    <div class="mt-4">
        <p class="text-center">Je n'ai pas de compte? <a href={{ route('register') }}
                class="text-indigo-600 pl-2">S'enregistrer</a></p>
    </div>
</x-guest-layout>


<script>
    const visibility = document.getElementById('visibility');

    const unvisibility = document.getElementById('unvisibility');

    const password = document.getElementById('password');
    visibility.addEventListener('click', function() {


        password.setAttribute('type', 'text');

        visibility.classList.add('hidden');

        unvisibility.classList.remove('hidden');

    });

    unvisibility.addEventListener('click', function() {
        password.setAttribute('type', 'password');

        unvisibility.classList.add('hidden');

        visibility.classList.remove('hidden');

    });
</script>
