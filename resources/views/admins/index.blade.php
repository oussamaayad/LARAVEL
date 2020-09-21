@extends('layouts.master')

@section('content')
<div class="row my-4">
    <div class="col-md-12">
        <div class="form-group">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addCar"> <i class="fa fa-plus"></i>

            </button>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Marque</th>
                            <th>Model</th>
                            <th>Type</th>

                            <th>Prix Journée</th>
                            <th>Disponible</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($cars as $car )
                         <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->marque }}</td>
                            <td>{{ $car->model }}</td>
                            <td>{{ $car->type }}</td>

                            <td>{{ $car->prixJ }}</td>
                            <td>
                                @if($car->dispo)
                                <span class="badge badge-success"> Disponible </span>
                                @else
                                <span class="badge badge-warning"> Reservé </span>
                                @endif
                            </td>
                            <td>
                                <img src="{{ $car->image }}" width="60" height="60" class="img-fluide" alt="">
                            </td>
                            <td class="d-flex flex-lg-row justify-content-center">
                                <a href="{{ route('cars.edit',$car->id) }}"
                                    class="btn btn-warning mr-2" ><i class="fa fa-edit"></i> </a>
                                <form action="{{route ('cars.destroy',$car->id)}}">
                                @csrf

                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                                </form>

                            </td>
                        </tr>

                       @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $cars->links() !!}
                </div>
            </div>
        </div>

    </div>

</div>
    <div class="modal fade" id="addCar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une Voiture</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="form-group">
                       <label for="">Marque *</label>
                       <input id=""
                       class="form-control" type="text" name="marque" placeholder="Marque.....">
                   </div>
                    <div class="form-group">
                       <label for="">Model *</label>
                       <input id=""
                       class="form-control" type="text" name="model" placeholder="Model.....">
                   </div>
                        <div class="form-group">
                          <label for="">Type *</label>
                          <select class="form-control" name="type" id="">
                            <option value="" selected disabled>veuillez choisir un type</option>
                            <option value="Diesel">Diesel</option>
                            <option value ="Essence">Essence</option>
                          </select>
                        </div>
                    <div class="form-group">
                       <label for="">Prix Journée *</label>
                       <input id=""
                       class="form-control" type="number" name="prixJ" placeholder="Prix.....">
                   </div>

                   <div class="form-group">
                          <label for="">Disponible *</label>
                          <select class="form-control" name="dispo" id="">
                            <option value="" selected disabled>veuillez choisir une option</option>
                            <option value="1">Oui</option>
                            <option value ="0">Non</option>
                          </select>
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
@endsection
