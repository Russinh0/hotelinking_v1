<?php

namespace App\Implementations;

use App\Models\Offer;
use App\Repositories\OfferRepository;
use Exception;
require_once __DIR__.'/../Utils/customMsg.php';
use function App\Utils\customMsg;

class OfferRepositoryImpl implements OfferRepository
{
    public function find($lastItem){
        try{
            $offers= Offer::where('id','>',$lastItem)->orderBy('id')->limit(10)->get();
            if(count($offers)==0)return customMsg(true,'No offers finded',$offers);
            return customMsg(false,'Success',$offers);
        }
        catch(Exception $e){
            return customMsg(true,'Internal Error',$e);
        }
    }
}