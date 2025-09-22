<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ToneflixCode\LaravelPayPocket\Exceptions\InsufficientBalanceException;
use ToneflixCode\LaravelPayPocket\Facades\LaravelPayPocket;
use ToneflixCode\LaravelPayPocket\Traits\GetWallets;

class OrderController extends Controller
{
    use GetWallets;

    private $order_value;

    public function pay()
    {
        $orderValue = 100;

        try {
            LaravelPayPocket::pay(auth()->user(), $orderValue);
        } catch (InsufficientBalanceException $e) {
            return redirect()->route('dashboard')->with('status', __($e->getMessage()));
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('status', __('Error processing the payment.'));
        }

        return redirect()->route('dashboard')->with('status', __('Pay successfully.'));
    }
}
