<?php

namespace App\Http\Controllers;

use HPWebdeveloper\LaravelPayPocket\Exceptions\InsufficientBalanceException;
use HPWebdeveloper\LaravelPayPocket\Facades\LaravelPayPocket;
use HPWebdeveloper\LaravelPayPocket\Traits\GetWallets;
use Illuminate\Http\Request;

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
