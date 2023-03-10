<x-app-layout>
    <div class="">
        <div class="w-full flex justify-center bg-white border rounded shadow py-6">
            <a href="{{ route('home') }}">
                <img src={{ asset('images/ndako.png') }} alt="logo" />
            </a>
        </div>
    </div>

    <div class="container mx-auto mt-6 p-6 rounded shadow bg-white">
        <h1 class="text-center text-2xl ">Apropos de la maison</h1>
    </div>

    <div class="mx-auto mt-6 p-6 rounded shadow bg-white" style="width: 96%">
        <h1 class="text-center md:text-start text-2xl text-red-600 ">
            <?= $images->count() > 1 ? 'Toutes les images de cette maison' : 'L\'image de cette maison' ?> </h1>
        @if ($images->count() > 1)
            <div class="flex flex-wrap px-4 mt-6 justify-between">
                @foreach ($images as $image)
                    <div style="width: 30%"
                        class="sm:w-1 md:w-11/12 overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
                        <img src={{ asset('storage/' . $image->path) }} alt="houseImage" class="w-full h-52" />
                    </div>
                @endforeach
            </div>
        @else
            <div class="flex justify-center mt-6">
                <div class="overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
                    <img src={{ asset('storage/' . $images[0]->path) }} alt="houseImage" class="w-full h-52" />
                </div>
            </div>
        @endif

    </div>
    <div class="mx-auto mt-6 p-6 rounded shadow bg-white" style="width: 96%">
        <h1 class="text-center md:text-start text-2xl text-red-600 "> Informations supplementaires</h1>
        <div class="mt-4 px-6 flex gap-5 lg:justify-between flex-wrap">
            <input type="text" class="text-white bg-indigo-600 rounded-lg" disabled value="<?= "Prix :$house->prix
            FCFA" ?>" >
            <input type="text" class="text-white bg-indigo-600 rounded-lg" disabled
                value="<?= "Quotient:$house->nb_quotient mois" ?>">
            <input type="text" class="text-white bg-indigo-600 rounded-lg" disabled
                value="<?= "Ville:$house->ville" ?>" >
            <input type="text" class="text-white bg-indigo-600 rounded-lg" disabled
                value="<?= "Quartier:$house->quartier" ?>" >
        </div>
    </div>

    <div class="mt-6 p-6 flex justify-center">
        <a href={{ route('chat.chatWithProprietaire', $house) }}
            class="w-full px-4 rounded-md bg-indigo-600  py-2 text-indigo-100 text-center hover:bg-indigo-500 hover:shadow-md duration-75">
            Discutter avec le(a) proprietaire
        </a>
    </div>


</x-app-layout>
