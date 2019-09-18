<?php

namespace App\Http\Controllers;

use App\Client;
use App\Person;
use App\Legal;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

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
             'first_name.required' => 'Campo Nombres es obligatorio!',
             'surname.required' => 'Campo Apellidos es obligatorio!',
             'birthdate.required' => 'Campo Fecha de Nacimiento es obligatorio!',
             'phone_number.required' => 'Campo Numero de Telefono es obligatorio!',
             'gender_id.required' => 'Campo Genero es obligatorio!',
             'identification_number.required' => 'Campo Numero de identidad es obligatorio!',
             'identification_number.unique' => 'Campo Numero de Indentidad ya fue utilizado!',
             'RTN_natural.required' => 'Campo RTN es obligatorio!',
             'RTN_natural.unique' => 'Campo RTN ya fue utilizado!',
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

        return view('clients.show', compact('client'));

      }else{
        $Datos = request()->validate([
            'legal_name' => 'required|unique:legals,legal_name',
            'contact_name' => 'required',
            'contact_phone_number' => 'required',
            'RTN_juridico' => 'required|unique:clients,RTN',
        ],[
             'legal_name.required' => 'Campo Nombre Empresa es obligatorio!',
             'legal_name.unique' => 'Campo Nombre Empresa ya fue utilizado!',
             'contact_name.required' => 'Campo Nombre Contacti es obligatorio!',
             'contact_phone_number.required' => 'Campo Numero de Telefono de Contacto es obligatorio!',
             'RTN_juridico.required' => 'Campo RTN es obligatorio!',
             'RTN_juridico.unique' => 'Campo RTN ya fue utilizado!',
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

         return view('clients.show',compact('client'));
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
      // get the nerd
      $client = Client::find($id);

      // show the view and pass the nerd to it
      return view('clients.edit',compact('client'));
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
      $client = Client::find($id);
      $Datos = request()->validate([
          'person' => 'required',
      ],[
           'person.required' => 'Campo person es obligatorio!',
      ]);

      if($Datos['person']=='Natural'){
        $person = $client->person;
        $Datos = request()->validate([
            'first_name' => 'required',
            'surname' => 'required',
            'birthdate' => 'required',
            'phone_number' => 'required',
            'gender_id' => 'required',
            'identification_number' => ['required',
                  Rule::unique('people')->ignore($person, 'id'),
                  'max:50'],
            'RTN' => ['required',
                  Rule::unique('clients')->ignore($id, 'id'),
                  'max:50'],
        ],[
             'first_name.required' => 'Campo Nombres es obligatorio!',
             'surname.required' => 'Campo Apellidos es obligatorio!',
             'birthdate.required' => 'Campo Fecha de Nacimiento es obligatorio!',
             'phone_number.required' => 'Campo Numero de Telefono es obligatorio!',
             'gender_id.required' => 'Campo Genero es obligatorio!',
             'identification_number.required' => 'Campo Numero de Identidad es obligatorio!',
             'identification_number.unique' => 'Campo Numero de Identidad ya fue utilizado!',
             'RTN_natural.required' => 'Campo RTN es obligatorio!',
             'RTN_natural.unique' => 'Campo RTN ya fue utilizado!',
        ]);

         $person->update($Datos);

          $client->update($Datos);

        return view('clients.show', compact('client'));

      }else{
        $legal = $client->legal;
        $Datos = request()->validate([
            'legal_name' => ['required',
                  Rule::unique('legals')->ignore($id, 'id'),
                  'max:50'],
            'contact_name' => 'required',
            'contact_phone_number' => 'required',
            'RTN' => ['required',
                  Rule::unique('clients')->ignore($id, 'id'),
                  'max:50'],
        ],[
             'legal_name.required' => 'Campo Nombre Empresa es obligatorio!',
             'legal_name.unique' => 'Campo Nombre Empresa ya fue utilizado!',
             'contact_name.required' => 'Campo Nombre Contacto es obligatorio!',
             'contact_phone_number.required' => 'Campo Numero De Telefono de Contacto es obligatorio!',
             'RTN_juridico.required' => 'Campo RTN es obligatorio!',
             'RTN_juridico.unique' => 'Campo RTN ya fue utilizado!',
        ]);

        $legal->update($Datos);


           $client->update($Datos);

         return view('clients.show',compact('client'));
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
