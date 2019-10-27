<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Yeast;
use Goutte\Client;
use Illuminate\Support\Str;

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

        $speciesImgs = $request->species_imgs;
        if (!empty($speciesImgs)) {
            $imgs = [];
            foreach ($speciesImgs as $file) {
                $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
                $imgs[] = $filename;
                $file->move('upload', $filename);
            }
            $yeast->species_imgs = $imgs;
        }
        
        if (isset($request->amylase_img)) {
            $file = $request->amylase_img;
            $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $yeast->amylase_img = $filename;
        }

        if (isset($request->cellulase_img)) {
            $file = $request->cellulase_img;
            $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $yeast->cellulase_img = $filename;
        }

        if (isset($request->protease_img)) {
            $file = $request->protease_img;
            $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $yeast->protease_img = $filename;
        }

        if (isset($request->ttc_img)) {
            $file = $request->ttc_img;
            $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $yeast->ttc_img = $filename;
        }

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

    	return redirect()->back()->with('message', 'Add data successfully!');
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

        $yeasts = Yeast::where('species', 'like', '%' . $key . '%')->paginate()->setPath(url()->full());
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

        $crawler = $client->request('GET', 'https://www.sciencedirect.com/search/advanced?qs=' . $key . '&show=25&sortBy=date');
        $papers =$crawler->filter('.result-list-title-link.u-font-serif.text-s')->each(function ($node) {
            return ['https://www.sciencedirect.com' . $node->attr('href'), $node->text()];
        });
        $subTypes =$crawler->filter('.SubType.hor')->each(function ($node) {
            return $node->text();
        });  

        return view('show_all', ['yeasts' => $yeasts, 'key' => $key, 'out' => $out, 'papers' => $papers, 'subTypes' => $subTypes]);
    }

    public function showBlastNucleotideForm()
    {
        return view('show_blastn');
    }

    public function updateImg($id, Request $request)
    {
        $yeast = Yeast::findOrFail($id);
        $imgs = $yeast->species_imgs;
        $speciesImgs = $request->species_imgs;
        if (!empty($speciesImgs)) {
            foreach ($speciesImgs as $file) {
                $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
                $imgs[] = $filename;
                $file->move('upload', $filename);
            }
            $yeast->species_imgs = $imgs;
        }
        
        if (isset($request->amylase_img)) {
            $file = $request->amylase_img;
            $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $yeast->amylase_img = $filename;
        }

        if (isset($request->cellulase_img)) {
            $file = $request->cellulase_img;
            $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $yeast->cellulase_img = $filename;
        }

        if (isset($request->protease_img)) {
            $file = $request->protease_img;
            $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $yeast->protease_img = $filename;
        }

        if (isset($request->ttc_img)) {
            $file = $request->ttc_img;
            $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
            $file->move('upload', $filename);
            $yeast->ttc_img = $filename;
        }
        $yeast->save();

        return view('yeast_detail', ['yeast' => $yeast]);
    }
}
