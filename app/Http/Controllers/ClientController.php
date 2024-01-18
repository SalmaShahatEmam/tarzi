<?php

namespace App\Http\Controllers;

use App\Repositories\Contract\ClientRepositoryInterface;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientrepo;

    public function __construct(ClientRepositoryInterface $clientrepo)
    {
        $this->clientrepo  = $clientrepo;
    }

    public function create()
    {
        return view('dashboard.clients.create');
    }


}
