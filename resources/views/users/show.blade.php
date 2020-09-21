@extends('layouts.master')

@section('content')
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card text-left">
                <img class="img-fluid" src=" {{ $user->image }} " alt="" >
                <div class="card-body">
                    <h4 class="card-title">{{ $user->name }}</h4>
                    <p class="card-text d-flex flex-row align-items-center" >
                       <span class="badge badge-primary mr-2"> Ville : {{ $user->ville }}</span>
                       <span class="badge badge-primary"> Telephone : {{ $user->telp }}</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <h3> Mes Commandes </h3>
            <table class="table">
                <thead>
                    <tr>
                        <th> Marque : </th>
                        <th> Type : </th>
                        <th> Prix Journée : </th>
                        <th> Date de debut : </th>
                        <th> Date de fin : </th>
                        <th> Prix TTC : </th>
                        <th> Action : </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach (auth()->user()->commands as $command )
                        <tr>
                            <td> {{ App\Car ::findOrFail($command->car_id)->marque }}</td>
                            <td> {{ App\Car ::findOrFail($command->car_id)->type }}</td>
                            <td> {{ App\Car ::findOrFail($command->car_id)->prixJ }}</td>
                            <td> {{ $command->dateL }}</td>
                            <td> {{ $command->dateR }}</td>
                            <td> {{ $command->prixTTC }} </td>
                            <td>
                                 <form action="{{route ('commands.delete',[$command->id,$command->car_id])}}" method="post">
                                @csrf
                                {{ method_field('delete') }}
                               <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
