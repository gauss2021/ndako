<x-app-layout>
    <div class="">
        <div class="w-full flex justify-center bg-white border rounded shadow py-6">
            <a href="{{ route('home') }}">
                <img src={{ asset('images/ndako.png') }} alt="logo" />
            </a>
        </div>
    </div>
    @if ($houses->count() > 0)
        <div class="container mx-auto mt-6 p-6 rounded shadow bg-white">
            <h1 class="text-center text-2xl ">Toutes les maisons disponible pour: {{ $nameOfCategory }}</h1>
        </div>
        <div class=" container mx-auto flex flex-wrap px-4 mt-5">
            @foreach ($houses as $house)
                <div class="sm:basis-1 md:basis-1/2 lg:basis-1/4 mt-5">
                    <div
                        class="sm:w-1 md:w-11/12 overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
                        <img src={{ asset('storage/' .$house->houseImages()->inRandomOrder('id')->take(1)->first()->path) }}
                            alt="house" class="h-auto w-full" />
                        <div class="p-5">
                            <p class="text-medium mb-5 text-gray-700">Prix: {{ $house->prix . ' FCFA' }}</p>
                            <p class="text-medium mb-5 text-gray-700">Quotient: {{ $house->nb_quotient . ' mois' }}
                            </p>
                            <p class="text-medium mb-5 text-gray-700">Ville: {{ $house->ville }}</p>
                            <p class="text-medium mb-5 text-gray-700">Quartier: {{ $house->quartier }}</p>
                            @auth
                                @if ($house->user_id == Auth::user()->id)
                                    <div class="py-4">
                                        <p class="text-medium mb-5 text-red-700 text-center">Publier par vous</p>
                                    </div>
                                @else
                                    <div class="flex justify-center">

                                    </div>
                                @endif
                            @endauth
                            @guest
                                <div class="flex justify-center">
                                    <a href={{ route('house.show', $house) }}
                                        class="w-full px-4 rounded-md bg-indigo-600  py-2 text-indigo-100 text-center hover:bg-indigo-500 hover:shadow-md duration-75">En
                                        savoir plus
                                    </a>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="flex-1">
            <h2 class="text-center text-2xl text-red-400  self-center">Aucune Maison pour {{ $nameOfCategory }} n'est
                disponible
                pour l'instant </h2>
        </div>
    @endif
</x-app-layout>
