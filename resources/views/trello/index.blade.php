@extends('layouts.app')
@section('title')
@endsection

@section('content')
<main>
    <h2 class="maintitle"><strong>HOME</strong></h2>
    

    
    {{-- <form action="{{ route('backgroundImage.store') }}" method="POST" enctype='multipart/form-data'> --}}
        @csrf
        <div>
            <input type="file" id="avatar" name="wallpaper">
            <input type="submit" value="Envoyer" />
        </div>
    </form>


    <div id="modif_container" class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                @auth
                    {{-- A FAIRE --}}

                    {{-- input button pour envoyer --}}

                    <form action="{{ route('inTodo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="formulaire">
                            <input class="inputform" placeholder="A FAIRE" type="text" name="task"
                                value="{{ old('task') }}">

                        </div>

                        <div class="image">
                            <input type="file" class="form-control"  name="image">
                        </div>

                        <button type="submit" class="btn btn-success">Add</button>

                    </form>

                    {{-- test upload image dans 'A FAIRE' --}}

                        

                    {{-- foreach A FAIRE --}}

                    @foreach ($postsTodo as $post)
                        <table>

                            <thead>
                                <tr>
                                    {{-- <th><a href="{{ route('homes.index') }}"><button><i class="fa-solid fa-square-plus"></i></button> </a>
                        </th> --}}
                                </tr>

                            </thead>

                            <tbody>
                                <tr>
                                    <div class="all">
                                        <div class="task"> <strong>{{$post->name}}</strong>:  {{  wordwrap($post->task, 40, "\n")}} 
                                        <img src="{{ asset('/' . $post->image)}}" alt="">
                                        </div>
                                        
                                        <div class="boutons">
                                            <form action="{{ route('update.status', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="searchModel" value="todo">
                                                <select onchange="form.submit()" name="choice" id="todo-select">
                                                    <option value=""> Déplacer </option>

                                                    <option value="inProgress">En cours</option>
                                                    <option value="finished">Terminé</option>
                                                </select>
                                            </form>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="green" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $post->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier la tâche
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('homesToDo.update', $post->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div>
                                                                    <input placeholder="A FAIRE" type="text" name="task"
                                                                        value="{{ old('task') }}" required>
                                                                    <input class="btn bg-primary text-light" type="submit"
                                                                        name="button" value="Envoyer" required>
                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('homesToDo.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="red"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>

                                    </div>
                                </tr>
                            </tbody>

                        </table>
                        <hr />
                    @endforeach

                </div>
                <div class="col-md-4">
                    {{-- EN COURS --}}

                    <form action="{{ route('inProgress.store') }}" method="POST">
                        @csrf

                        <div class="formulaire">
                            <input class="inputform" placeholder="EN COURS" type="text" name="task"
                                value="{{ old('task') }}" required>
                        </div>
                    </form>

                    @foreach ($postsInprogress as $post)
                        <table>

                            <thead>
                                <tr>
                                    {{-- <th><a href="{{ route('homes.index') }}"><button><i class="fa-solid fa-square-plus"></i></button> </a>
                        </th> --}}
                                </tr>

                            </thead>

                            <tbody>
                                <tr>
                                    <div class="all">
                                        <div class="task"> <strong>{{ $post->name }}</strong>:
                                            {{ wordwrap($post->task, 40, "\n") }} </div>
                                        <div class="boutons">
                                            <form action="{{ route('update.status-inProgress', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="searchModel" value="ip">
                                                <select onchange="form.submit()" name="choice" id="todo-select">
                                                    <option value=""> Déplacer </option>
                                                    <option value="toDo">A faire</option>
                                                    <option value="finished">Terminé</option>
                                                </select>
                                            </form>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="green" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $post->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier la tâche
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('homesIP.update', $post->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div>
                                                                    <input placeholder="A FAIRE" type="text"
                                                                        name="task" value="{{ old('task') }}" required>
                                                                    <input class="btn bg-primary text-light" type="submit"
                                                                        name="button" value="Envoyer" required>
                                                                </div>

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <form action="{{ route('homesIP.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button class="red"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>

                        <hr />
                    @endforeach
                </div>
                <div class="col-md-4">
                    {{-- TERMINER --}}

                    {{-- input button pour TERMINER --}}

                    <form action="{{ route('finished.store') }}" method="POST">
                        @csrf
                        <div class="formulaire">
                            <input class="inputform" placeholder="TERMINEES" type="text" name="task"
                                value="{{ old('task') }}" required>
                        </div>
                    </form>

                    {{-- foreach TERMINE --}}

                    @foreach ($postsFinished as $post)
                        <table>

                            <thead>
                                <tr>
                                    {{-- <th><a href="{{ route('homes.index') }}"><button><i class="fa-solid fa-square-plus"></i></button> </a>  </th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <div class="all">
                                        <div class="task"> <strong>{{ $post->name }}</strong>:
                                            {{ wordwrap($post->task, 40, "\n") }} </div>
                                        <div class="boutons">

                                            <form action="{{ route('update.status-finished', $post->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <input type="hidden" name="searchModel" value="finished">
                                                <select onchange="form.submit()" name="choice" id="todo-select">
                                                    <option value=""> Déplacer </option>
                                                    <option value="toDo">A faire</option>
                                                    <option value="inProgress">En cours</option>
                                                </select>
                                            </form>

                                            <!-- Button trigger modal -->
                                            <button type="button" class="green" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $post->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier la tâche
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('homesFinish.update', $post->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div>
                                                                    <input placeholder="A FAIRE" type="text"
                                                                        name="task" value="{{ old('task') }}" required>
                                                                    <input class="btn bg-primary text-light" type="submit"
                                                                        name="button" value="Envoyer" required>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('homesFinish.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="red"><i class="fa-solid fa-trash-can"></i></button>

                                            </form>
                                        </div>
                                    </div>
                                </tr>
                            </tbody>
                        </table>
                        <hr />
                    @endforeach
                @endauth

            </div>
        </div>
    </div>
</main>
@endsection
