<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SummonerController extends Controller
{
	
	protected $api_key = '79ce3b73-03cf-46aa-b1a9-086418eb9408';
	protected $region = 'na';

	protected $league	= 'master';
	protected $type	=	'RANKED_SOLO_5x5';

    public function getAll(){
    	/*$base_uri = 'https://na.api.pvp.net/api/lol/na/v2.5/league/';
    	$client = new Client();
    	$response = $client->get('https://na.api.pvp.net/api/lol/na/v2.5/league/master?type=RANKED_SOLO_5x5&api_key=79ce3b73-03cf-46aa-b1a9-086418eb9408');
    	dd($response);*/
    	$client = new \GuzzleHttp\Client();
		$res = $client->request('GET', 'https://na.api.pvp.net/api/lol/na/v2.5/league/master?type=RANKED_SOLO_5x5&api_key=79ce3b73-03cf-46aa-b1a9-086418eb9408');
		
    }
}
