@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold">Projects</h2>
        <a href="{{ route('admin.projects.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
            Create Project
        </a>
    </div>

    <div class="bg-white p-4 rounded shadow mb-6">
        <form method="GET" class="mb-4 flex flex-wrap gap-4 items-end">
            <div class="w-full md:w-64">
                <label class="block text-sm font-medium mb-1">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Project name or ID..." class="w-full px-3 py-2 border border-gray-300 rounded-md">
            </div>
            <div class="w-full md:w-48">
                <label class="block text-sm font-medium mb-1">Status</label>
                <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    <option value="">All Statuses</option>
                    @foreach(\App\Models\Project::STATUS_MAP as $key => $label)
                        <option value="{{ $key }}" @selected(request('status') == $key)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-auto flex gap-2">
                <button type="submit" class="h-10 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700">Filter</button>
                <a href="{{ route('admin.projects.index') }}" class="h-10 px-4 rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100 flex items-center justify-center">Clear</a>
            </div>
        </form>
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>

    <div class="bg-white rounded shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Project ID</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Progress</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Created</th>
                    <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($projects as $project)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 whitespace-nowrap">
                            @if($project->project_id)
                                <a href="{{ route('admin.projects.show', $project->project_id) }}" class="text-blue-600 hover:text-blue-800 hover:underline">
                                    {{ $project->project_id }}
                                </a>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            @if($project->project_id)
                                <a href="{{ route('admin.projects.show', $project->project_id) }}" class="text-blue-600 hover:text-blue-800 hover:underline">
                                    {{ $project->name }}
                                </a>
                            @else
                                {{ $project->name }}
                            @endif
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded {{ $project->status == \App\Models\Project::STATUS_SOLD || $project->status == \App\Models\Project::STATUS_LET ? 'bg-green-100 text-green-800' : ($project->status >= \App\Models\Project::STATUS_PENDING_EQUITY ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                {{ \App\Models\Project::STATUS_MAP[$project->status] ?? 'Unknown' }}
                            </span>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-16 bg-gray-200 rounded-full h-2 mr-2">
                                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $project->progress ?? 0 }}%"></div>
                                </div>
                                <span class="text-sm text-gray-600">{{ $project->progress ?? 0 }}%</span>
                            </div>
                        </td>
                        <td class="px-4 py-2 whitespace-nowrap">{{ human_date($project->created_on) }}</td>
                        <td class="px-4 py-2 whitespace-nowrap">
                            @if($project->project_id)
                                <a href="{{ route('admin.projects.show', $project->project_id) }}" class="text-blue-600 hover:text-blue-800 hover:underline text-sm">
                                    View
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">No projects found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $projects->links() }}
    </div>
@endsection

