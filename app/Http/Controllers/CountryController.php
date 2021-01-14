<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    //Show Data
    public function country(){

         return response() -> json(Country::get(), 200);
    }

    //Show Data by ID

    public function countryByID($id){

        $country = Country::find($id);

        if(is_null($country)){
            return response() -> json(["message" => "Record Not Found"], 404);
        }
        return response() -> json($country, 200);
   }




   //Intert Data
   public function countrySave(Request $request){

    $rules = [

        'name' => 'required|min:3',
        'iso' => 'required|min:2|max:2',

    ];

    $validator =Validator::make($request -> all(), $rules);

        if($validator -> fails()){

            return response() -> json($validator -> errors(), 400);

        }
   $country = Country::create($request -> all());

   return response() -> json($country, 201);

}

//Update Data
public function countryUpdate(Request $request, $id){


    $country = Country::find($id);

    if(is_null($country)){
        return response() -> json(["message" => "Record Not Found"], 404);
    }


    $country -> update($request -> all());

    return response() -> json($country, 200);

 }

 public function countryDelete(Request $request, $id){

    $country = Country::find($id);

    if(is_null($country)){
        return response() -> json(["message" => "Record Not Found"], 404);
    }

    $country -> delete();

    return response() -> json(null, 204);

 }







}
