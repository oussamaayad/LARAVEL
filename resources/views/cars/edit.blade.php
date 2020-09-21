@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8 mx-auto">
                <div class="card bg-light">
                    <h3 class="card-header">Modifier une Voiture</h3>
                    <div class="card-body">
                <form action="{{ route('cars.update',$car->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('put') }}
                   <div class="form-group">
                       <label for="">Marque *</label>
                       <input id="" value="{{ $car->marque }}"
                       class="form-control" type="text" name="marque" placeholder="Marque.....">
                   </div>
                    <div class="form-group">
                       <label for="">Model *</label>
                       <input id=""  value="{{ $car->model }}"
                       class="form-control" type="text" name="model" placeholder="Model.....">
                   </div>
                        <div class="form-group">
                          <label for="">Type *</label>
                          <select class="form-control" name="type" id="">
                            <option value="" selected disabled>veuillez choisir un type</option>
                            <option value="Diesel" {{ $car->type   ? 'selected' : '' }}>Diesel</option>
                            <option value ="Essence" {{ $car->type  ? 'selected' : '' }}>Essence</option>
                          </select>
                        </div>
                    <div class="form-group">
                       <label for="">Prix Journée *</label>
                       <input id="" value="{{ $car->prixJ }}"
                       class="form-control" type="number" name="prixJ" placeholder="Prix.....">
                   </div>

                   <div class="form-group">
                          <label for="">Disponible *</label>
                          <select class="form-control" name="dispo" id="">
                            <option value="" selected disabled>veuillez choisir une option</option>
                            <option value="1" {{ $car->dispo  ? 'selected' : '' }}>Oui</option>
                            <option value ="0" {{ !$car->dispo ? 'selected' : '' }}>Non</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <img src="{{ $car->image }}" width ="100" height="100" alt="" class="img-fluid">
                        </div>
                    <div class="form-group">
                       <label for="">Photo *</label>
                       <input id=""
                       class="form-control" type="file" name="image" >
                   </div>
                   <button type="submit" class="btn btn-primary">Valider</button>
                </form>


                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

