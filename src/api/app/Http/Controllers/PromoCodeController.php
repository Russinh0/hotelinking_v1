<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\PromotionalCode;
use App\Models\User;
use App\Repositories\OfferRepository;
use App\Repositories\PromoCodeRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PromoCodeController extends Controller
{
    protected $promoInterface;
    public function __construct(PromoCodeRepository $promoInterface)
    {
        $this->promoInterface=$promoInterface;
    }
    public function find(Request $req,$userId){
        try{
            $res=$this->promoInterface->find($userId);
            return response()->json($res);
        }catch (Exception $e){
            return response()->json($e);
        }
    }
    public function create (Request $req){
        try{
            $res=$this->promoInterface->create($req->json()->all());
            return response()->json($res);
        }
        catch (Exception $e){
            return response ()->json($e);
        }
    }
}
