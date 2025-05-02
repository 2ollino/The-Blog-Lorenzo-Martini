<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class CryptoTicker extends Component
{
    public $prices;

    // Metodo per aggiornare i prezzi delle criptovalute
    public function mount()
    {
        $this->fetchPrices();
    }

    // Metodo per recuperare i dati delle criptovalute
    public function fetchPrices()
    {
        $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => 'bitcoin,ethereum,dogecoin,solana,cardano,polkadot,ripple,chainlink,tether,usd-coin,bnb,xrp,tron,polygon,stellar,cosmos',
            'vs_currencies' => 'usd'
        ]);
    
        
        if (!$response->successful()) {
            Log::error('CoinGecko API Error', ['status' => $response->status()]);
            return view('home', ['prices' => []]);
        }
    
        $currentPrices = $response->json();
    
        // Verifica che tutti i dati necessari siano presenti
        
        $coins = ['bitcoin', 'ethereum', 'dogecoin', 'solana', 'cardano', 'polkadot', 'ripple', 'chainlink','tether', 'usd-coin', 'bnb', 'xrp', 'tron', 'polygon', 'stellar', 'cosmos'];
        
        $formatted = [];
        $theme = request()->cookie('theme', 'light');
        $previousPrices = session('crypto_prices', []);
        session(['crypto_prices' => $currentPrices]);
    
        foreach ($coins as $coin) {
            $current = $currentPrices[$coin]['usd'] ?? null;
    
            if (is_null($current)) {
                continue; // Salta se il prezzo non è disponibile
            }
    
            $previous = $previousPrices[$coin]['usd'] ?? null;
            $symbol = '';
            $color = $theme === 'light' ? 'dark' : 'light';
    
            if (!is_null($previous)) {
                if ($current > $previous) {
                    $symbol = '🔺';
                    $color = 'lightgreen';
                } elseif ($current < $previous) {
                    $symbol = '🔻';
                    $color = 'red';
                }
            }
    
            $formatted[] = [
                'name' => ucfirst($coin),
                'price' => number_format($current, 2),
                'symbol' => $symbol,
                'color' => $color,
            ];
        }

        $this->prices = $formatted;
    }

    // Metodo per aggiornare il tema
    public function updatedTheme()
    {
        $this->fetchPrices();
    }

    public function render()
    {
        return view('livewire.crypto-ticker');
    }
}
