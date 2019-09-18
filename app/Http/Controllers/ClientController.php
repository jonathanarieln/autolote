<?php

namespace App\Http\Controllers;

use App\Client;
use App\Person;
use App\Legal;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $clients = Client::all();
          return view('clients.clients', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/clients/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $Datos = request()->validate([
          'person' => 'required',
      ],[
           'person.required' => 'Campo person es obligatorio!',
      ]);

      if($Datos['person']=='Natural'){
        $Datos = request()->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'birthdate' => 'required',
            'phone_number' => 'required',
            'gender_id' => 'required',
            'identification_number' => 'required|unique:people,identification_number',
            'RTN_natural' => 'required|unique:clients,RTN',
        ],[
             'first_name.required' => 'Campo nombre es obligatorio!',
             'surname.required' => 'Campo surname es obligatorio!',
             'birthdate.required' => 'Campo birthdate es obligatorio!',
             'phone_number.required' => 'Campo phone_number es obligatorio!',
             'gender_id.required' => 'Campo gender_id es obligatorio!',
             'identification_number.required' => 'Campo identification_number es obligatorio!',
             'identification_number.unique' => 'Campo identification_number ya fue utilizado!',
             'RTN_natural.required' => 'Campo RTN_natural es obligatorio!',
             'RTN_natural.unique' => 'Campo RTN_natural ya fue utilizado!',
        ]);

       $person = Person::create([
            'first_name'=> $Datos['first_name'],
            'surname'=> $Datos['surname'],
            'birthdate'=> $Datos['birthdate'],
            'phone_number'=> $Datos['phone_number'],
            'gender_id'=> $Datos['gender_id'],
            'identification_number'=> $Datos['identification_number'],
          ]);


          $client = Client::create([
            'is_legal' => false,
            'person_id' => $person->id,
            'RTN' => $Datos['RTN_natural'],
          ]);

        return view('clients.show',  ['client' => $client]);

      }else{
        $Datos = request()->validate([
            'legal_name' => 'required|unique:legals,legal_name',
            'contact_name' => 'required',
            'contact_phone_number' => 'required',
            'RTN_juridico' => 'required|unique:clients,RTN',
        ],[
             'legal_name.required' => 'Campo legal_name es obligatorio!',
             'legal_name.unique' => 'Campo legal_name ya fue utilizado!',
             'contact_name.required' => 'Campo contact_name es obligatorio!',
             'contact_phone_number.required' => 'Campo contact_phone_number es obligatorio!',
             'RTN_juridico.required' => 'Campo RTN_juridico es obligatorio!',
             'RTN_juridico.unique' => 'Campo RTN_juridico ya fue utilizado!',
        ]);

        $legal = Legal::create([
             'legal_name'=> $Datos['legal_name'],
             'contact_name'=> $Datos['contact_name'],
             'contact_phone_number'=> $Datos['contact_phone_number'],
           ]);


           $client = Client::create([
             'is_legal' => true,
             'legal_id' => $legal->id,
             'RTN' => $Datos['RTN_juridico'],
           ]);

         return view('clients.show',  ['client' => $client]);
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
      // get the nerd
      $client = Client::find($id);

      // show the view and pass the nerd to it
      return view('clients.show',compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return("editando");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $client = Client::find($id);
      try {
      $client->delete();

      return redirect()->route('clients.index');

      } catch (\Illuminate\Database\QueryException $e) {
          // var_dump($e->errorInfo);
          // var_dump($client->id);

          return  view('errors.foreign');

      }
    }
}
