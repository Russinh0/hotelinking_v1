<?php

namespace App\Implementations;

use App\Models\Offer;
use App\Models\PromotionalCode;
use App\Models\User;
use App\Repositories\PromoCodeRepository;
use Exception;
require_once __DIR__.'/../Utils/customMsg.php';
use function App\Utils\customMsg;

class PromoCodeRepositoryImpl implements PromoCodeRepository{
    public function create($req){
        try{
            $user=User::find($req['userId']);
            $offer=Offer::find($req['offerId']);

            if (!$user)return customMsg(true,'User not founded');
            elseif(!$offer)return customMsg(true,'Offer not founded');

            $code='PROMO-'.$req['offerId'].$req['userId'];
            
            $user->offers()->attach($offer,['code'=>$code]);
            return customMsg(false,'Promotional code created successfully.',$code);
        }
        catch (Exception $e){
            return customMsg(true,'Internal Error',$e);
        }
    }
    public function find($userId){
        try{
            $promos=PromotionalCode::where('user_id','=',$userId)->get();
            return count($promos)==0? customMsg(true,'No promotional codes found'):customMsg(false,'Promotional codes founded successfully',$promos);
        }
        catch(Exception $e){
            return customMsg(true,'Internal Error',$e);
        }
    }
}