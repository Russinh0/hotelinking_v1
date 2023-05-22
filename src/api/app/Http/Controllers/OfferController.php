<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Repositories\OfferRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class OfferController extends Controller
{
    protected $offerInterface;
    public function __construct(OfferRepository $offerInterface)
    {
        $this->offerInterface=$offerInterface;
    }
    public function find(Request $req,$lastItem){
        try{
           $offers= $this->offerInterface->find($lastItem);
           if($offers['error'])return response()->json($offers);
           return response()->json($offers);
        }catch (Exception $e){
            return response()->json($e);
        }
    }
}
