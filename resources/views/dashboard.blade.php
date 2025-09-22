<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 alert alert-success" role="alert">
                        <span class="font-medium">{{ session('status') }}</span> 
                    </div>
                    @endif
                    <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                            <form class="space-y-6" action="{{route('deposit')}}" method="POST">
					    	    @csrf
                                <div>
                                    <div class="mt-2">
									    {{ __('Wallet Balance:') }}
                                        <span class="text-green-700">{{ number_format(LaravelPayPocket::checkBalance(auth()->user())) }}</span> {{ __('Dollar') }} 
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" name="type" value="wallet_1" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('Deposit') }} $200 {{ __('into wallet 1') }}</button>
                                    <button type="submit" name="type" value="wallet_2" class="flex w-full justify-center mt-2 rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ __('Deposit') }} $200 {{ __('into wallet 2') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="flex flex-col justify-center px-6 py-12 lg:px-8">
                        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                            <form class="space-y-6" method="post" action="{{ route('pay') }}">
                                @csrf
                                <button type="submit" class="flex w-full justify-center rounded-md bg-cyan-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-cyan-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-cyan-600">{{ __('Pay') }} $100</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
