@extends('layouts.app')
@section('title')
@endsection

@section('content')
<h2 class="maintitle"><strong>PROJET</strong></h2>
    <div id="modif_container" class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">

                @auth
                    {{-- A FAIRE --}}
                    {{-- input button pour envoyer --}}

                    <form action="{{ route('inTodo.store') }}" method="POST">
                        @csrf

                        <div class="formulaire">
                            <input class="inputform" placeholder="A FAIRE" type="text" name="task"
                                value="{{ old('task') }}" required>

                        </div>

                    </form>

                    {{-- foreach A FAIRE --}}

                    @foreach ($postsTodoProjet as $post)
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
                                        <div class="task"> <strong>{{$post->name}}</strong>:  {{  wordwrap($post->task, 40, "\n") }}  </div>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier la tâche</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('update.status', $post->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <div>
                                                                    <input placeholder="A FAIRE" type="text" name="task"
                                                                        value="{{ old('task') }}" required>
                                                                    <input class="btn bg-primary text-light" type="submit" name="button"
                                                                        value="Envoyer" required>
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

                    @foreach ($postsInprogressProjet as $post)
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
                                        <div class="task"> <strong>{{$post->name}}</strong>: {{  wordwrap($post->task, 40, "\n") }}  </div>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier la tâche</h5>
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

                    @foreach ($postsFinishedProjet as $post)
                        <table>

                            <thead>
                                <tr>
                                    {{-- <th><a href="{{ route('homes.index') }}"><button><i class="fa-solid fa-square-plus"></i></button> </a>  </th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <div class="all">
                                        <div class="task"> <strong>{{$post->name}}</strong>:  {{  wordwrap($post->task, 40, "\n") }} </div>
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
                                                            <h5 class="modal-title" id="exampleModalLabel">Modifier la tâche</h5>
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
@endsection

