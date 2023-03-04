<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nom')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                placeholder='Entrer votre nom' autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <!---Prenom -->
        <div class="mt-4">
            <x-input-label for="prenom" :value="__('Prenom')" />
            <x-text-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')"
                placeholder='Entrer votre prenom' required autofocus />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!--Numero de telephone -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('Numero de telephone')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" value='+242' required
                autofocus />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>
        <!--Adresse !-->
        <div class="mt-4">
            <x-input-label for="adresse" :value="__('Adresse')" />
            <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')"
                placeholder='Entrer votre adresse' required autofocus />
            <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                placeholder='Entrer votre adresse email' required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                placeholder='Entrer votre mot de passe' autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                placeholder='Confirmer votre mot de passe' name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Vous avez deja un compte?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('S\'Enregistrer') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
