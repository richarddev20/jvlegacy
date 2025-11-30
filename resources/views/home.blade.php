@extends('layouts.public')

@section('title', 'Invest alongside JaeVee')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-blue-600 via-indigo-700 to-purple-800 text-white overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%), radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%);"></div>
        
        <div class="relative max-w-7xl mx-auto px-6 py-24 lg:py-32">
            <div class="grid gap-12 lg:grid-cols-2 items-center">
                <div class="space-y-6">
                    <p class="text-sm uppercase tracking-[0.3em] text-blue-200 font-semibold">Institutional-grade co-investing</p>
                    <h1 class="text-5xl lg:text-6xl font-bold leading-tight">
                        Build a diversified property portfolio without lifting a brick.
                    </h1>
                    <p class="text-xl text-blue-100 leading-relaxed">
                        Back UK developments alongside JaeVee and our developer partners. Stay updated in real time,
                        download agreements instantly, and know exactly when payouts land.
                    </p>
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="#opportunities" class="px-8 py-4 bg-white text-blue-700 font-bold rounded-xl hover:bg-blue-50 transition-all shadow-xl hover:shadow-2xl transform hover:scale-105">
                            <i class="fas fa-chart-line mr-2"></i>View Current Opportunities
                        </a>
                        <a href="{{ route('investor.login') }}" class="px-8 py-4 border-2 border-white/30 text-white font-bold rounded-xl hover:bg-white/10 backdrop-blur-sm transition-all">
                            <i class="fas fa-sign-in-alt mr-2"></i>Already Invested? Sign In
                        </a>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-md border border-white/20 rounded-3xl p-8 lg:p-10 shadow-2xl">
                    <p class="text-sm text-blue-200 uppercase tracking-wider font-semibold mb-6">Why investors stay</p>
                    <ul class="space-y-6">
                        <li class="flex gap-4 items-start">
                            <div class="flex-shrink-0 w-8 h-8 bg-green-400 rounded-full flex items-center justify-center mt-0.5">
                                <i class="fas fa-check text-green-900 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">Full transparency on every project milestone, payout, and document.</p>
                            </div>
                        </li>
                        <li class="flex gap-4 items-start">
                            <div class="flex-shrink-0 w-8 h-8 bg-green-400 rounded-full flex items-center justify-center mt-0.5">
                                <i class="fas fa-check text-green-900 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">Access both equity and mezzanine debt with curated SPVs.</p>
                            </div>
                        </li>
                        <li class="flex gap-4 items-start">
                            <div class="flex-shrink-0 w-8 h-8 bg-green-400 rounded-full flex items-center justify-center mt-0.5">
                                <i class="fas fa-check text-green-900 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">Direct support team—no ticket backlog, no bots.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Live Opportunities Section -->
    <section class="py-20 bg-white" id="opportunities">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-wrap items-end justify-between gap-4 mb-12">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-2">Live opportunities</p>
                    <h2 class="text-4xl font-bold text-gray-900">Projects accepting capital</h2>
                </div>
                <a href="{{ route('public.projects.index') }}" class="text-blue-600 hover:text-blue-700 font-semibold text-sm flex items-center gap-2 group">
                    View all projects <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>

            <div class="grid gap-8 md:grid-cols-2">
                @forelse($highlightedProjects as $project)
                    <div class="group border-2 border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-xl transition-all hover:border-blue-200 bg-white">
                        <div class="flex items-start justify-between mb-4">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-gray-500 font-semibold mb-1">
                                    SPV{{ $project->project_id }}
                                </p>
                                <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                    {{ $project->name }}
                                </h3>
                                <p class="text-sm text-gray-600">
                                    {{ $project->property->investment_strategy ?? 'Property development' }}
                                </p>
                            </div>
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->name }}" class="w-20 h-20 rounded-lg object-cover">
                            @endif
                        </div>
                        
                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="px-4 py-1.5 rounded-full bg-blue-50 text-blue-700 text-xs font-semibold">
                                <i class="fas fa-calendar-alt mr-1"></i>Term: {{ optional($project->property)->investment_turnaround_time ?? '—' }} months
                            </span>
                            <span class="px-4 py-1.5 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold">
                                Status: {{ \App\Models\Project::STATUS_MAP[$project->status] ?? 'In progress' }}
                            </span>
                        </div>
                        
                        <p class="text-gray-600 text-sm leading-relaxed mb-6 line-clamp-3">
                            {{ strip_tags(Str::limit($project->description ?? 'Full project brief available in dashboard.', 180)) }}
                        </p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <a href="{{ route('public.projects.show', $project->project_id) }}" class="text-blue-600 font-bold hover:text-blue-700 text-sm flex items-center gap-2 group">
                                View project <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                            </a>
                            <span class="text-gray-400 text-xs">
                                <i class="far fa-clock mr-1"></i>Updated {{ optional($project->launched_on)->diffForHumans() ?? 'recently' }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-16">
                        <i class="fas fa-folder-open text-gray-300 text-5xl mb-4"></i>
                        <p class="text-gray-500 text-lg">No live opportunities today.</p>
                        <p class="text-gray-400 text-sm mt-2">Join the platform to be notified when the next one launches.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Why JaeVee Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid gap-12 lg:grid-cols-3 mb-16">
                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-2">Why JaeVee</p>
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Designed for serious investors</h2>
                    <p class="text-gray-600 leading-relaxed">
                        We only partner with developers that pass rigorous due diligence.
                        Investors see the same data rooms, legal docs, and update cadence
                        we rely on internally.
                    </p>
                </div>
                <div class="lg:col-span-2 grid gap-6 sm:grid-cols-2">
                    <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all">
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                        </div>
                        <p class="text-xs uppercase text-gray-500 tracking-wider font-semibold mb-2">Always transparent</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Live dashboards, not PDF reports</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Track construction progress, funding phases, and payouts in real time.
                            Every document—shareholders' agreement, loan agreement, certificates—is one click away.
                        </p>
                    </div>
                    <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all">
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-handshake text-green-600 text-xl"></i>
                        </div>
                        <p class="text-xs uppercase text-gray-500 tracking-wider font-semibold mb-2">Aligned incentives</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Co-invest alongside us</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            We participate in every SPV, so our returns depend on the same milestones as yours.
                            No "listings" marketplace—just curated developments with skin in the game.
                        </p>
                    </div>
                    <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all">
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-headset text-purple-600 text-xl"></i>
                        </div>
                        <p class="text-xs uppercase text-gray-500 tracking-wider font-semibold mb-2">Direct access</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Talk to the actual team</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Need clarity on a payout, document, or timeline? Raise a support request from any project card
                            and the humans running the deal reply—no outsourced help desk.
                        </p>
                    </div>
                    <div class="bg-white border border-gray-100 rounded-2xl p-8 shadow-sm hover:shadow-lg transition-all">
                        <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center mb-4">
                            <i class="fas fa-shield-alt text-amber-600 text-xl"></i>
                        </div>
                        <p class="text-xs uppercase text-gray-500 tracking-wider font-semibold mb-2">Regulated flow</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Bank-grade tooling</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Digital KYC/AML, segregated client accounts, and institutional reporting
                            baked in from day one—because trust isn't a feature, it's the baseline.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white" id="faq">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12">
                <p class="text-sm text-gray-500 uppercase tracking-wider font-semibold mb-2">Questions investors ask first</p>
                <h2 class="text-4xl font-bold text-gray-900">FAQ</h2>
            </div>
            <div class="space-y-4">
                <details class="group border-2 border-gray-100 rounded-xl p-6 hover:border-blue-200 transition-all bg-white">
                    <summary class="font-bold text-gray-900 cursor-pointer flex items-center justify-between">
                        <span>Who can invest on the platform?</span>
                        <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        You must self-certify as a high net-worth or sophisticated investor under UK regulations.
                        Onboarding is digital and takes around 5 minutes.
                    </p>
                </details>
                <details class="group border-2 border-gray-100 rounded-xl p-6 hover:border-blue-200 transition-all bg-white">
                    <summary class="font-bold text-gray-900 cursor-pointer flex items-center justify-between">
                        <span>How are payouts handled?</span>
                        <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        Equity payouts occur at exit; mezzanine interest is settled at completion.
                        Every payout event shows up inside your dashboard, with notifications and downloadable statements.
                    </p>
                </details>
                <details class="group border-2 border-gray-100 rounded-xl p-6 hover:border-blue-200 transition-all bg-white">
                    <summary class="font-bold text-gray-900 cursor-pointer flex items-center justify-between">
                        <span>Can I sell my position?</span>
                        <i class="fas fa-chevron-down text-gray-400 group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <p class="text-gray-600 mt-4 leading-relaxed">
                        Secondary liquidity isn't guaranteed. If you need to exit early, contact support and we'll
                        review options within the SPV docs.
                    </p>
                </details>
            </div>
        </div>
    </section>
@endsection
