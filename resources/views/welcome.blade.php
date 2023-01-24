<x-app-layout>
    <div class="w-full h-50 lg:h-full"
        style="background-image: url('http://localhost:8000/images/banner.jpg');background-position: center;">
        <div class="w-full h-full flex flex-col items-center justify-between bg-black bg-opacity-70 py-8">
            <div class="flex-1 flex flex-col items-center justify-center">
                <h1
                    class="text-2xl md:text-4xl lg:text-7xl xl:text-8xl text-gray-200 tracking-wider font-bold font-serif mt-12 text-center">
                    Bienvenue sur NDAKO</h1>
                <div
                    class="mx-24 md-mx-12 bg-white bg-opacity-10 px-4 py-2 mt-6 rounded-xl flex items-center justify-center text-cyan-100 space-x-2 lg:space-x-4">
                    <span class="text-xl lg:text-2xl xl:text-3xl font-bold">Trouver une maison a louer ou mettre votre
                        maison en location sans vous deplacer</span>
                </div>
                <div class="mx-24 flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-4 mt-8">
                    <form class="w-72 flex items-center">
                        <input type="email" name="email" id="email"
                            class="w-full py-2  border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded-tl rounded-bl text-sm"
                            placeholder="faites une recherche" autocomplete="off">

                    </form>
                    <div class="flex justify-center md:block md:m-0">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 py-2 px-6 text-gray-100 border border-blue-600 rounded-tr rounded-br text-sm">Rechercher</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($categories->count() > 0)
        <div class="container mx-auto my-6" id="tendances">
            <h2 class="text-center text-2xl md:text-3xl lg:text-4xl">Decouvrer nos tendances</h2>
            <div class="flex flex-wrap px-4">
                @foreach ($categories as $categorie)
                    <div class="sm:basis-1 md:basis-1/2 lg:basis-1/4 mt-5">
                        <div
                            class="sm:w-1 md:w-11/12 overflow-hidden rounded-xl bg-white shadow-md duration-200 hover:scale-105 hover:shadow-xl">
                            <img src={{ asset('storage/' . $categorie->image) }} alt="plant" class="h-auto w-full" />
                            <div class="p-5">
                                <p class="text-medium mb-5 text-gray-700">{{ $categorie->nom }}</p>
                                <button
                                    class="w-full rounded-md bg-indigo-600  py-2 text-indigo-100 hover:bg-indigo-500 hover:shadow-md duration-75">Voir
                                    toutes les maisons associes</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container mx-auto my-6" id="maisons">
            <h2 class="text-center text-2xl md:text-3xl lg:text-4xl">Quelques maisons</h2>
        </div>

    @endif
</x-app-layout>
