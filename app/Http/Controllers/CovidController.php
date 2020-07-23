<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class CovidController extends Controller
{
    public function getApi(){
        $client   = new Client;
        $request  = $client->request('GET', 
            'https://data.covid19.go.id/public/api/update.json'
        );
        
        $data = json_decode($request->getBody()->getContents());
        $data = $data->update->harian;
        return view('covid.data_covid_terupdate', compact('data')); 
    }
}
