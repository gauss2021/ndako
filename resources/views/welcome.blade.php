<x-app-layout>
    <div class="w-full" style="background-image: url('http://localhost:8000/images/banner.jpg');background-position: center; height: 600px;">
        <div class="w-full h-full flex flex-col items-center justify-between bg-black bg-opacity-70 py-8">
            <div class="flex-1 flex flex-col items-center justify-center">
                <h1 class="text-6xl lg:text-7xl xl:text-8xl text-gray-200 tracking-wider font-bold font-serif mt-12 text-center">Bienvenue sur NDAKO</h1>
                <div class="bg-white bg-opacity-10 px-4 py-2 rounded-xl flex items-center justify-center text-cyan-100 space-x-2 lg:space-x-4">
                    <span class="text-xl lg:text-2xl xl:text-3xl font-bold">Trouver une maison a louer ou mettre votre maison en location sans vous deplacer</span>
                </div>
                <div class="flex flex-col items-center space-y-4 mt-24">
                    <p class="text-gray-300 uppercase text-sm">Notify me when it's ready</p>
                    <form class="w-full flex items-center">
                        <input type="email" name="email" id="email" class="w-72 p-2 border-gray-300 focus:outline-none focus:ring-0 focus:border-gray-300 rounded-tl rounded-bl text-sm" placeholder="Email" autocomplete="off">
                        <button class="bg-blue-600 hover:bg-blue-700 py-2 px-6 text-gray-100 border border-blue-600 rounded-tr rounded-br text-sm">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto my-6">
        <h1 class="text-center">Decouvrer nos tendances</h1>
    </div>
</x-app-layout>
