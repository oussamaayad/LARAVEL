@extends('layouts.master')

@section('content')
    <div class="row my-4">
        <div class="col-md-8 mx-auto">
                <div class="card border-primary shadow-sm">
                        <h3 class="card-header"> Louer cette Voiture </h3>
                        <div class="row my-3">
                            <div class="col-md-12">

                        <div class="card">
                        <h3 class="text-info">{{ $car->marque }}</h3>
                            <div class="card-img-top">
                                <img src="{{ $car->image }}"  class="img-fluid rounded m-2" alt="">
                            </div>
                            <div class="card-body">
                                        <p class="d-flex flex-row justify-content-start">
                                            <span class="badge badge-danger mx-3">Type: {{ $car->type }}</span>
                                            <span class="badge badge-primary mr-3">Prix journée: {{ $car->prixJ }} $</span>
                                        </p>
                            </div>
                        </div>

                </div>
        </div>
                <div class="card-body">
                     <form action="{{ route('commands.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="dateL">Date Début </label>
                            <input type="date" name="dateL" id="date"
                            class="form-control" placeholder="Date debut ...">
                         </div>

                        <div class="form-group">
                            <label for="dateR">Date Retourne </label>
                            <input type="date" name="dateR" id="date"
                            class="form-control" placeholder="Date de Retourne ...">
                            <input type="hidden" name="car_id" value="{{ $car->id }}">

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
