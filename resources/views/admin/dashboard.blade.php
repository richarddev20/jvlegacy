@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Total Projects -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Projects</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalProjects) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-folder-open text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active Projects -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Active Projects</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($activeProjects) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chart-line text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Accounts -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Accounts</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ number_format($totalAccounts) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-purple-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Invested -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Invested</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">£{{ number_format($totalInvested, 0) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-amber-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-pound-sign text-amber-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Investment Summary</h3>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Total Investments</span>
                        <span class="text-lg font-semibold text-gray-900">{{ number_format($totalInvestments) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Total Paid</span>
                        <span class="text-lg font-semibold text-green-600">£{{ number_format($totalPaid, 0) }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Outstanding</span>
                        <span class="text-lg font-semibold text-gray-900">£{{ number_format($totalInvested - $totalPaid, 0) }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-center text-sm font-medium">
                        <i class="fas fa-plus mr-1"></i> New Project
                    </a>
                    <a href="{{ route('admin.investments.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 text-center text-sm font-medium">
                        <i class="fas fa-plus mr-1"></i> New Investment
                    </a>
                    <a href="{{ route('admin.updates.index') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 text-center text-sm font-medium">
                        <i class="fas fa-bullhorn mr-1"></i> Post Update
                    </a>
                    <a href="{{ route('admin.accounts.index') }}" class="px-4 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 text-center text-sm font-medium">
                        <i class="fas fa-users mr-1"></i> View Accounts
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Projects -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Projects</h3>
                        <a href="{{ route('admin.projects.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
                    </div>
                </div>
                <div class="divide-y divide-gray-200">
                    @forelse($recentProjects as $project)
                        <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="font-medium text-gray-900 hover:text-blue-600">
                                        {{ $project->name }}
                                    </a>
                                    <p class="text-sm text-gray-500 mt-1">
                                        Project ID: {{ $project->project_id }}
                                    </p>
                                </div>
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                    {{ \App\Models\Project::STATUS_MAP[$project->status] ?? 'Unknown' }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center text-gray-500">
                            <p>No recent projects</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Updates -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-900">Recent Updates</h3>
                        <a href="{{ route('admin.updates.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
                    </div>
                </div>
                <div class="divide-y divide-gray-200">
                    @forelse($recentUpdates as $update)
                        <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <a href="{{ route('admin.updates.show', $update->id) }}" class="font-medium text-gray-900 hover:text-blue-600">
                                        {{ Str::limit($update->title, 50) }}
                                    </a>
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ $update->project ? $update->project->name : 'No Project' }}
                                        @if($update->sent_on)
                                            • {{ $update->sent_on->format('d M Y') }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="px-6 py-8 text-center text-gray-500">
                            <p>No recent updates</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Projects Needing Attention -->
        @if($projectsNeedingAttention->count() > 0)
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Projects Needing Attention</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    @foreach($projectsNeedingAttention as $project)
                        <div class="px-6 py-4 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center justify-between">
                                <div>
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="font-medium text-gray-900 hover:text-blue-600">
                                        {{ $project->name }}
                                    </a>
                                    <p class="text-sm text-gray-500 mt-1">
                                        Status: {{ \App\Models\Project::STATUS_MAP[$project->status] ?? 'Unknown' }}
                                    </p>
                                </div>
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="px-3 py-1 text-sm font-medium text-blue-600 bg-blue-50 rounded-lg hover:bg-blue-100">
                                    Review
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Recent Investments -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <div class="px-6 py-4 border-b border-gray-200">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Investments</h3>
                    <a href="{{ route('admin.investments.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Project</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Account</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($recentInvestments as $investment)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.projects.show', $investment->project_id) }}" class="text-sm font-medium text-gray-900 hover:text-blue-600">
                                        {{ $investment->project->name ?? 'N/A' }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.accounts.show', $investment->account_id) }}" class="text-sm text-gray-900 hover:text-blue-600">
                                        {{ $investment->account->name ?? 'N/A' }}
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    £{{ number_format($investment->amount, 0) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($investment->paid)
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">Paid</span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">Unpaid</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $investment->paid_on ? \Carbon\Carbon::parse($investment->paid_on)->format('d M Y') : '—' }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                    <p>No recent investments</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

