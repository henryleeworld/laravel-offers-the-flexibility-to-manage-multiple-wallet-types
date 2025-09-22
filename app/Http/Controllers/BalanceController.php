<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use ToneflixCode\LaravelPayPocket\Facades\LaravelPayPocket;

class BalanceController extends Controller
{
    /**
     *  Increase User's Wallet Balance
     */
    public function deposit(Request $request)
    {
        $amount = 200;

        try {
            LaravelPayPocket::deposit(auth()->user(), $request->type, $amount);
        } catch (InvalidDepositException $e) {
            return back()->with('status', __($e->getMessage()));
        } catch (\Exception $e) {
            return back()->with('status', __('Unable to process deposit.'));
        }
        return back()->with('status', __('The deposit was done successfully!'));
    }
}
