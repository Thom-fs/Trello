@extends('layouts.app')

@section('title', 'Modification Profil')



@section('content')
<h2 class="maintitle"><strong>MODIFICATION PROFIL</strong></h2>
<div id="modif_container" class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
        <main>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif

                    <form action="{{ route('profils.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label>Nom</label>
                        <input class="form-control" type="text" name="name"  value="{{ $user->name ?? '' }}">

                        <label>Email</label>
                        <input class="form-control" type="text" name="email" value="{{ $user->email ?? '' }}">

                        <button id="modify_button" type="submit" class="btn bg-primary text-light">Modifier le profil</button>
                    </form>
        </main>

        </div>
    </div>
</div>
    
@endsection