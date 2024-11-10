<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        $results = [];

        if ($query) {
            // Simulasi pencarian makanan, Anda bisa menggantinya dengan query SPARQL atau pencarian database
            $results = [
                ['name' => 'Nasi Goreng', 'description' => 'Nasi goreng yang enak dengan berbagai pilihan topping.'],
                ['name' => 'Sate Ayam', 'description' => 'Sate ayam dengan bumbu kacang yang gurih.'],
            ];
        }

        return view('cari', compact('results'));
    }
}
