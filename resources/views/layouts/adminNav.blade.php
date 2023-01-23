<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" defer>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" defer>
    </script>
    <title>Mon dashboard</title>
</head>

<body class="bg-light">
    <header class="bg-primary py-4">
    </header>
    <section class="d-flex justify-content-between">
        <nav class="col-2 bg-body py-5 d-flex flex-column">
            <div class="d-flex mt-3 justify-content-center">
                <img class="rounded-circle shadow" src={{ asset('images/gauss.jpg') }} alt="image-admin" srcset=""
                    width="90px" height="90px">
            </div>
            <h5 class="text-lighter text-center mt-3">Van Davydson</h5>
            <ul class="mt-5">
                <li
                    class="<?= request()->routeIs('dashboard') ? 'bg-primary py-2 px-2 rounded' : 'mt-2 py-2 px-2 rounded' ?>">
                    <a href={{ route('dashboard') }}
                        class="<?= request()->routeIs('dashboard') ? 'text-white' : 'text-body' ?>">
                        <svg class="me-3" style="width: 20px; height: 20px" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd"></path>
                        </svg>Utilisateurs
                    </a>
                </li>
                <li
                    class="<?= request()->routeIs('admin.category') ? 'bg-primary py-2 px-2 rounded' : 'mt-2 py-2 px-2 rounded' ?>">
                    <a href={{ route('admin.category') }}
                        class="<?= request()->routeIs('admin.category') ? 'text-white' : 'text-body' ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" class="me-3" style="width: 20px; height: 20px"
                            viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-300 group-hover:text-cyan-300" fill-rule="evenodd"
                                d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z"
                                clip-rule="evenodd" />
                            <path class="fill-current text-gray-600 group-hover:text-cyan-600"
                                d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>Categories</a>
                </li>
                <li
                    class="<?= request()->routeIs('admin.house') ? 'bg-primary py-2 px-2 rounded' : 'mt-2 py-2 px-2 rounded' ?>">
                    <a href={{ route('admin.house') }}
                        class="<?= request()->routeIs('admin.house') ? 'text-white' : 'text-body' ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" class="me-3" viewBox="0 0 576 512"
                            style="width: 20px; height: 20px;">
                            <path
                                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                        </svg>House</a>
                </li>
                <li
                    class="<?= request()->routeIs('admin.message') ? 'bg-primary py-2 px-2 rounded' : 'mt-2 py-2 px-2 rounded' ?>">
                    <a href={{ route('admin.message') }}
                        class="<?= request()->routeIs('admin.message') ? 'text-white' : 'text-body' ?>"><svg
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="me-3"
                            style="width: 20px; height: 20px;">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64h96v80c0 6.1 3.4 11.6 8.8 14.3s11.9 2.1 16.8-1.5L309.3 416H448c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64z" />
                        </svg>Messages</a>
                </li>




                <hr style="margin-top: 300px">
                <li class="mt-4 py-2 px-2 rounded">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="route('logout')" class="text-body"
                            onclick="event.preventDefault();
                        this.closest('form').submit();"><svg
                                xmlns="http://www.w3.org/2000/svg" class="me-3" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" style="height: 20px; width: 20px">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>Se deconnecter</a>
                    </form>
                </li>
            </ul>
        </nav>

        @yield('content')

    </section>
</body>

<style>
    .c-active {
        color: white;
        border-radius: .25 rem !important;
        background-color: #0d6efd !important;
        padding: .5 rem !important;
    }

    .c-active a {
        color: text-white
    }

    .c-non-active {
        border-radius: .25rem;
        padding: .5 rem;
        margin-top: 1.5 rem;
    }

    .c-non-active a {
        color: #212529 !important
    }
</style>

</html>
