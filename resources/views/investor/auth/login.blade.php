@extends('layouts.admin')

@section('content')
    <div class="flex min-h-screen justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <img src="{{ asset('logo.png') }}" alt="Logo" class="mx-auto h-16 w-auto">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Investor Login</h2>
                <p class="mt-2 text-center text-sm text-gray-600">Sign in to your account</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if($systemStatus)
                <div class="bg-white shadow-md rounded-lg border-l-4 {{ 
                    $systemStatus->status_type === 'error' ? 'border-red-500 bg-red-50' : 
                    ($systemStatus->status_type === 'warning' ? 'border-yellow-500 bg-yellow-50' : 
                    ($systemStatus->status_type === 'success' ? 'border-green-500 bg-green-50' : 
                    ($systemStatus->status_type === 'maintenance' ? 'border-orange-500 bg-orange-50' : 
                    'border-blue-500 bg-blue-50'))) 
                }} mb-6">
                    <div class="p-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                @if($systemStatus->status_type === 'error')
                                    <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
                                @elseif($systemStatus->status_type === 'warning')
                                    <i class="fas fa-exclamation-triangle text-yellow-500 text-xl"></i>
                                @elseif($systemStatus->status_type === 'success')
                                    <i class="fas fa-check-circle text-green-500 text-xl"></i>
                                @elseif($systemStatus->status_type === 'maintenance')
                                    <i class="fas fa-tools text-orange-500 text-xl"></i>
                                @else
                                    <i class="fas fa-info-circle text-blue-500 text-xl"></i>
                                @endif
                            </div>
                            <div class="ml-3 flex-1">
                                <h3 class="text-sm font-semibold {{ 
                                    $systemStatus->status_type === 'error' ? 'text-red-800' : 
                                    ($systemStatus->status_type === 'warning' ? 'text-yellow-800' : 
                                    ($systemStatus->status_type === 'success' ? 'text-green-800' : 
                                    ($systemStatus->status_type === 'maintenance' ? 'text-orange-800' : 
                                    'text-blue-800'))) 
                                }}">
                                    {{ $systemStatus->title }}
                                </h3>
                                <div class="mt-2 text-sm {{ 
                                    $systemStatus->status_type === 'error' ? 'text-red-700' : 
                                    ($systemStatus->status_type === 'warning' ? 'text-yellow-700' : 
                                    ($systemStatus->status_type === 'success' ? 'text-green-700' : 
                                    ($systemStatus->status_type === 'maintenance' ? 'text-orange-700' : 
                                    'text-blue-700'))) 
                                }}">
                                    {!! $systemStatus->message !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('investor.login.post') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 space-y-6">
                @csrf
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input type="email" name="email" id="email" autocomplete="email" required autofocus
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="current-password" required
                        class="appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" />
                </div>
                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded bg-amber-500 text-white font-bold hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
