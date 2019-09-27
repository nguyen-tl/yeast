<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yeast;

class YeastController extends Controller
{
    public function getAllYeasts()
    {
    	$yeasts = Yeast::all();

    	return view('show_all', ['yeasts' => $yeasts]);
    }

    public function showFormAddData()
    {
    	return view('add_data');
    }

    public function addData(Request $request)
    {
    	$yeast = new Yeast();
    	$yeast->species = $request->species;
    	$yeast->source = $request->source;
    	$yeast->total_carotenoid = $request->total_carotenoid;
    	$yeast->beta_carotene = $request->beta_carotene;
    	$yeast->biomass = $request->biomass;
    	$yeast->amylase = $request->amylase;
    	$yeast->cellulase = $request->cellulase;
    	$yeast->protease = $request->protease;
    	$yeast->ttc = $request->ttc;
    	$yeast->identify = $request->identify;
    	$yeast->gene_sequences = $request->gene_sequences;
    	$yeast->storage_location = $request->storage_location;
    	$yeast->save();

    	return $this->getAllYeasts(); 
    }
}
