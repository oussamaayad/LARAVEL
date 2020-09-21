@extends('layouts.master')

@section('content')
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
            <div class="card border-primary shadow-sm">
                <h3 class="card-header"> Inscription </h3>
                <div class="card-body">
                     <form action="{{ route('users.register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nom & Prenom</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="Nom complet ...">
                         </div>

                         <div class="form-group">
                            <label for="telp">Telephone</label>
                            <input type="text" name="telp" id="" class="form-control" placeholder="Telephone...">
                         </div>

                         <div class="form-group">
                            <label for="ville">Ville</label>
                            <input type="text" name="ville" id="" class="form-control" placeholder="Ville...">
                         </div>


                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" class="form-control-file" name="image" id="" >
                        </div>


                         <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="" class="form-control" placeholder="Email ...">
                         </div>

                          <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Mot de passe" ...>
                         </div>
                         <div class="form-group">
                             <button type="submit" class="btn btn-primary"> valider </button>
                         </div>
                     </form>
                </div>
            </div>
        </div>
    </div>
@endsection
