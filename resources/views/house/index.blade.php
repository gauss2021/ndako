<x-app-layout>
    @if ($errors->any())
        @foreach ($errors->all() as $message)
            <p class="text-red-500 text-center text-xl">{{ $message }}</p>
        @endforeach
    @endif
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
    <div id="modal_overlay"
        class="hidden absolute inset-0 bg-black bg-opacity-30 h-screen w-full flex justify-center items-start md:items-center pt-10 md:pt-0">

        <!-- modal -->
        <div id="modal"
            class="pacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-3/4 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">

            <!-- button close -->
            <button onclick="openModal(false)"
                class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
                &cross;
            </button>

            <!-- header -->
            <div class="px-4 py-3 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-600">Mettre une maison en location</h2>
            </div>

            <!-- body -->
            <div class="w-full p-3">
                <form action={{ route('house.store') }} id="formAddHouse" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col my-4">
                        <label for="ville" class="text-gray-700">Ville(<span class="text-red-700">*</span>)</label>
                        <input type="text" name="ville" id="ville"
                            class="mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900"
                            placeholder="Enter la ville ou se trouve la maison" required>
                    </div>
                    <div class="flex flex-col my-4">
                        <label for="quartier" class="text-gray-700">Quartier(<span
                                class="text-red-700">*</span>)</label>
                        <input type="text" name="quartier" id="quartier"
                            class="mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900"
                            placeholder="Enter le quartier où se trouve la maison" required>
                    </div>

                    <div class="flex flex-col my-4">
                        <label for="prix" class="text-gray-700">Prix(<span class="text-red-700">*</span>)</label>
                        <div class="flex">
                            <input type="number" style="width: 95%" name="prix" id="prix"
                                class="mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900"
                                placeholder="Enter le prix de la maison par mois">
                            <input type="text"
                                class="mt-2 ml-4 p-2 border bg-gray-600 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900"
                                disabled value="FCFA" required>
                        </div>
                    </div>
                    <div class="flex flex-col my-4">
                        <label for="quotient" class="text-gray-700">Quotient(<span
                                class="text-red-700">*</span>)</label>
                        <input type="number" name="quotient" id="quotient"
                            class="mt-2 p-2 border border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded text-sm text-gray-900"
                            placeholder="Enter le nombre de mois de quotient" required>
                    </div>
                    <div class="flex flex-col my-4">
                        <label for="categorie" class="text-gray-700">Type(<span class="text-red-700">*</span>)</label>
                        <select name="categorie" id="categorie" required>
                            <option disabled selected>Choissisez le type de votre maison</option>
                            @if ($categories->count() > 0)
                                @foreach ($categories as $categorie)
                                    <option value={{ $categorie->id }}>{{ $categorie->nom }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="flex flex-col my-4">
                        <label for="images" class="text-gray-700">Ajouter des images de votre maison(<span
                                class="text-red-700">*Au moins une image et aux maximun 4 images</span>)</label>
                        <input type="file" name="images[]" id="images" accept=".jpg, .jpeg, .png"
                            class="mt-2 p-2 border-gray-300 text-sm text-gray-900" multiple>
                    </div>

                </form>

            </div>

            <!-- footer -->
            <div
                class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                <button class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none"
                    id="addHouseButton">Ajouter</button>
                <button onclick="openModal(false)"
                    class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded text-white focus:outline-none">Annuler</button>
            </div>
        </div>

    </div>
    <!-- Code block ends -->

    <div class="my-5 p-5">

        @if ($houses->count() > 0)
            <h2 class="text-center text-3xl"> Vos maisons actuelement en location</h2>
            <div class="flex flex-wrap px-4">

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
                                <button
                                    class="w-full rounded-md bg-indigo-600  py-2 text-indigo-100 hover:bg-indigo-500 hover:shadow-md duration-75">Voir
                                    les offres pour cette maison
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h2 class="text-center text-3xl text-orange-400"> Vous n'avez pas encore mis une maison en location</h2>
        @endif
    </div>

    <div class="container mx-auto px-">
        @if ($houses->count() > 0)
            <button
                class="w-full rounded-md bg-indigo-600  py-2 text-indigo-100 hover:bg-indigo-500 hover:shadow-md duration-75"
                onclick="openModal(true)">Ajouter
                une autre maison en location</button>
        @else
            <button
                class="w-full rounded-md bg-indigo-600  py-2 text-indigo-100 hover:bg-indigo-500 hover:shadow-md duration-75"
                onclick="openModal(true)">Mettre une maison en location</button>
        @endif
    </div>
</x-app-layout>


<script>
    const modal_overlay = document.querySelector('#modal_overlay');
    const modal = document.querySelector('#modal');

    function openModal(value) {
        const modalCl = modal.classList
        const overlayCl = modal_overlay

        if (value) {
            overlayCl.classList.remove('hidden')
            setTimeout(() => {
                modalCl.remove('opacity-0')
                modalCl.remove('-translate-y-full')
                modalCl.remove('scale-150')
            }, 100);
        } else {
            modalCl.add('-translate-y-full')
            setTimeout(() => {
                modalCl.add('opacity-0')
                modalCl.add('scale-150')
            }, 100);
            setTimeout(() => overlayCl.classList.add('hidden'), 300);
        }
    }
    openModal(false)

    const addHouseButton = document.getElementById('addHouseButton');
    addHouseButton.addEventListener('click', function() {
        console.log('envoie du formulaire');
        const formAddHouse = document.getElementById('formAddHouse');
        console.log(formAddHouse);
        formAddHouse.submit();
    });

    function removeAlarm() {
        console.log('On a clique sur le remove alarm');
        const successAlarm = document.getElementById('successAlarm');

        successAlarm.remove();
    }
</script>
