<?php

namespace App\Http\Controllers;

use App\Services\GoogleWalletService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WalletController extends Controller
{
    public function index()
    {
        return view('wallet');
    }

    public function appleWallet()
    {
        // Dummy Apple Wallet pass (.pkpass)
        $passContent = 'Dummy Apple Wallet Pass Content';

        $headers = [
            'Content-Type' => 'application/vnd.apple.pkpass',
            'Content-Disposition' => 'attachment; filename="sample.pkpass"',
        ];

        return Response::make($passContent, 200, $headers);
    }

    public function googleWallet(GoogleWalletService $service)
    {
        // Dummy JWT (real integration requires service account & object creation)
        $jwt = $service->generateWalletJwt();

        // Redirect to Google Wallet Save page
        return redirect("https://pay.google.com/gp/v/save/{$jwt}");
    }
}
