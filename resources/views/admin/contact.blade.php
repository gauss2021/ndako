<x-app-layout>
    <div class="container mx-auto mt-6 p-6 rounded shadow bg-white">
        <h1 class="text-center text-2xl ">Nous contacter</h1>
    </div>

    @if (session('success'))
        <div id='successAlarm' class="container mx-auto py-5 pl-5 mt-5 flex justify-between bg-green-400"
            style="position: relative">
            <h3 class="text-xl">{{ session('success') }}</h3>
            <button onclick="removeAlarm()"
                class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                &cross;
            </button>
        </div>
    @endif
    <div class="container mx-auto mt-6 p-6 rounded shadow bg-white">
        @auth
            <form id="formulaireMessage" action={{ route('admin.contactStore') }} method="post">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Nom')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->name"
                        required disabled autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="Auth::user()->email"
                        placeholder='Entrer votre adresse mail' required autofocus disabled />
                    <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="message" :value="__('Message')" />
                    <textarea name="message" id="message" class="block mt-1 w-full border-gray-300 rounded" cols="5"
                        placeholder="Veuillez entrer votre message"></textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <button type="submit" id="buttonMessage"
                        class=" w-full rounded-sm bg-indigo-600 py-2 text-white">Envoyer</button>
                </div>
            </form>
        @endauth
        @guest
            <form id="formulaireMessage" action={{ route('admin.contactStore') }} method="post">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Nom')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required
                        autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        placeholder='Entrer votre adresse mail' required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="message" :value="__('Message')" />
                    <textarea name="message" id="message" class="block mt-1 w-full border-gray-300 rounded" cols="5"
                        placeholder="Veuillez entrer votre message"></textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>
                <div class="mt-4">
                    <button type="submit" id="buttonMessage"
                        class=" w-full rounded-sm bg-indigo-600 py-2 text-white">Envoyer</button>
                </div>
            </form>
        @endguest
    </div>
</x-app-layout>


<script>
    const buttonMessage = document.getElementById('buttonMessage');

    buttonMessage.addEventListener('click', function() {
        const formulaireMessage = document.getElementById('formulaireMessage');

        formulaireMessage.submit();
    });

    function removeAlarm() {
        console.log('On a clique sur le remove alarm');
        const successAlarm = document.getElementById('successAlarm');

        successAlarm.remove();
    }
</script>
