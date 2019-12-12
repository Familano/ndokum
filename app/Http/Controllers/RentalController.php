<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Rental;
use App\Http\Resources\Rental as RentalResource;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentals = Rental::paginate(10);

        return RentalResource::collection($rentals);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $rental = new Rental;
        $rental->start_date = $request->input('start_date');
        $rental->end_date = $request->input('end_date');
        $rental->total = $request->input('total');
        $rental->status = $request->input('status');
        $rental->id_producct = $request->input('id_producct');
        $rental->id_user = $request->input('id_user');

        if($rental->save()){
            return new RentalResource($rental);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $rental = Rental::findOrFail($id);

        return new RentalResource($rental);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rental = Rental::find($id);

        $rental->start_date = $request->input('start_date');
        $rental->end_date = $request->input('end_date');
        $rental->total = $request->input('total');
        $rental->status = $request->input('status');
        $rental->id_producct = $request->input('id_producct');
        $rental->id_user = $request->input('id_user');

        if($rental->save()){
            return new RentalResource($rental);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rental = Rental::findOrFail($id);
        if ($rental->delete()) {
            return new RentalResource($rental);
        }
    }
}
