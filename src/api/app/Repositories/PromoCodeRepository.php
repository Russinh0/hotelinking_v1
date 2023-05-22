<?php

namespace App\Repositories;


interface PromoCodeRepository
{
    
    public function create($req);
    public function find($userId);

}