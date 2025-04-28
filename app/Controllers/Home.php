<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        
        return view('/partials/navbar') . view('/Beranda/beranda') . view('partials/footer');
            
    }
}
