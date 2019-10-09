<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yeast;
use Goutte\Client;

class YeastController extends Controller
{
    public function getAllYeasts()
    {
    	$yeasts = Yeast::paginate();

    	return view('show_all', ['yeasts' => $yeasts]);
    }

    public function showFormAddData()
    {
    	return view('add_data');
    }

    /*
    * Add data
    */
    public function addData(Request $request)
    {
    	$yeast = new Yeast();
    	$yeast->species = $request->species;
    	$yeast->source = $request->source;
    	$yeast->total_carotenoid = $request->total_carotenoid;
    	$yeast->beta_carotene = $request->beta_carotene;
    	$yeast->amylase = $request->amylase;
    	$yeast->cellulase = $request->cellulase;
    	$yeast->protease = $request->protease;
    	$yeast->ttc = $request->ttc;
    	$yeast->its_sequences = $request->its_sequences;
    	$yeast->d1_d2_sequences = $request->d1_d2_sequences;
    	$yeast->storage_location = $request->storage_location;
    	$yeast->save();

    	return $this->getAllYeasts(); 
    }

    public function getDetailYeast($id)
    {
        $yeast = Yeast::findOrFail($id);
        
        return view('yeast_detail', ['yeast' => $yeast]);
    }

    public function search(Request $request)
    {

        $key = $request->key;
        if (empty($key)) {
            return $this->getAllYeasts();
        }

        $yeasts = Yeast::where('species', 'like', '%' . $key . '%')->paginate();
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.sciencedirect.com/search/advanced?qs=' . $key);
        $resultString = $crawler->filter('title')->text();
        $out = [['Year', 'Count']];
        if ((int) str_replace(',', '', explode(' ', $resultString)[0]) > 0) {
            for ($i=2000; $i<2021; $i++) {
                $crawler = $client->request('GET', 'https://www.sciencedirect.com/search/advanced?qs=' . $key . '&years=' . $i . '&lastSelectedFacet=years');
                $resultString = $crawler->filter('title')->text();
                $out[] = ['' . $i, (int) str_replace(',', '', explode(' ', $resultString)[0])];
            }
        }        

        return view('show_all', ['yeasts' => $yeasts, 'key' => $key, 'out' => $out]);
    }
}
