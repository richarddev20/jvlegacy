@extends('layouts.public')

@section('title', 'Page not found')

@section('content')
    <section class="py-24 bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <p class="text-sm uppercase tracking-[0.3em] text-blue-200 font-semibold mb-4">404 – Not found</p>
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                We couldn’t find that page.
            </h1>
            <p class="text-blue-100 mb-8 text-lg">
                The link you followed may be broken, expired, or the page may have been moved.
                Your investments and documents are still exactly where they should be.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('home') }}" class="px-6 py-3 bg-white text-blue-700 font-semibold rounded-lg hover:bg-blue-50 transition">
                    Back to homepage
                </a>
                <a href="{{ route('investor.login') }}" class="px-6 py-3 border-2 border-white/40 text-white font-semibold rounded-lg hover:bg-white/10 transition">
                    Investor dashboard
                </a>
            </div>
        </div>
    </section>
@endsection


