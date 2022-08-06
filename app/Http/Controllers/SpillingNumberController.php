<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpillingRequest;
use App\Services\CosmoService;
use Illuminate\Http\Request;

class SpillingNumberController extends Controller
{
    private CosmoService $spiller;

    public function __construct(CosmoService $spiller)
    {
        $this->spiller = $spiller;
    }

    public function index()
    {
        return view('convert');
    }

    public function convert(Request $request)
    {
        
        $this->spiller->setConfig($request->get('language'));

        $res = $this->spiller->spill($request->get('number'));

        return response()->json(['spellout' => $res]);

    }
}
