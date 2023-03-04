@extends('./../layouts/adminNav')


@section('content')
    <div id="content" class="col-9 offset-1 bg-light">

        @if (session('removeUser'))
            {{ session('removeUser') }}
        @endif
        <h1 class="text-center">Liste de tous les utilisateurs</h1>

        <table id="example" class="table table-striped mt-5" style="width:100%">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>Date d'inscription</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->tel }}</td>
                        <td>{{ $user->adresse }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <th>
                            <form action={{ route('admin.editUser', $user) }}><button type="submit"
                                    class="btn btn-info">Modifier</button>
                            </form>
                        </th>
                        <th>
                            <form action={{ route('admin.deleteUser', $user) }} method="post">
                                @csrf
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
