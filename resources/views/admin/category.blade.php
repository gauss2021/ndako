@extends('./../layouts/adminNav')


@section('content')
    <div>

        @if ($errors->any())
            @foreach ($errors->all() as $message)
                <p class="text-danger text-center">{{ $message }}</p>
            @endforeach
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($categories->count() > 0)
            <h3 class="text-center text-lighter">Les categories actuelles</h3>
            <div class="d-flex mt-3 flex-wrap">
                @foreach ($categories as $categorie)
                    <div class="col-3">
                        <div class="card" style="width: 18rem;">
                            <img src={{ asset('storage/' . $categorie->image) }} class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $categorie->nom }}</h5>
                                <form method="post" action={{ route('category.destroy', $categorie) }}>
                                    @method('DELETE')
                                    @csrf
                                    <a href={{ route('category.destroy', $categorie) }}
                                        onclick="event.preventDefault();
                                    this.closest('form').submit();
                                        "
                                        class="btn
                                        btn-danger mt-3">Supprimer</a>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <hr>
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-success rounded shadow px-2 mt-4 py-2" data-bs-toggle="modal"
            data-bs-target="#ajouterCategorie">Ajouter une nouvelle categorie</button>

        <div class="modal fade" id="ajouterCategorie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nouvelle categorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formulaire" method="POST" action={{ route('category.store') }}
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nom" class="form-label">nom</label>
                                <input type="text" class="form-control" id="nom" aria-describedby="textHelp"
                                    placeholder="Entrer le nom" name="nom">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">L'image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button id="save" type="button" class="btn btn-primary">Ajouter</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <style>
        li {
            list-style: none;
            width: 80%;
        }

        li a {
            text-decoration: none;
        }
    </style>

    <script type="text/javascript">
        let save = document.getElementById('save');
        console.log(save);
        save.addEventListener('click', function() {
            let formulaire = document.getElementById('formulaire');
            console.log(formulaire);
            formulaire.submit();
        });
    </script>
@endsection
