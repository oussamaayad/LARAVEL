<?php

namespace App\Http\Controllers;

use App\Command;
use App\Car;
use Illuminate\Http\Request;
use DateTime;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('commands.index')->with(['commands'=> Command::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //

        return view('commands.create')->withCar(car::findOrFail($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request,[
        'car_id'=>'required',
        'dateL' =>'required',
        'dateR' =>'required',
    ]);

    $car = Car::findOrFail($request->car_id);
    $dateLocation = new DateTime($request->dateL);
    $dateRetoure = new DateTime($request->dateR);
    $jours = \date_diff($dateLocation,$dateRetoure);
    $prixTtc = $car->prixJ * $jours->format('%d');


       Command::create([
           'user_id' => auth()->user()->id,
           'car_id' => $request->car_id,
           'dateL' => $request->dateL,
           'dateR' => $request->dateR,
           'prixTTC' => $prixTtc,
        ]);
        $car->update([
            'dispo' => 0
        ]);
        return \redirect()->route('users.profile',auth()->user()->id)->with([
            'success' =>'Commande ajouter !!'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function show(Command $command)
    {
        //
        return view('commands.show')->withCommand($command);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function edit(Command $command)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Command $command)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function destroy(Command $command)
    {
        //
    }

    public function deleteUserCommands($commandId,$carId){
        $command = Command :: findOrfail($commandId);
        if($command->car_id==$carId){
            $command->delete();
            return \redirect()->route('users.profile',auth()->user()->id)->with([
            'success' =>'Commande supprimer !!'
        ]);

        }
    }
}
