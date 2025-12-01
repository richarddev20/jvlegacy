@extends('layouts.admin')

@section('title', 'Add Changelog Entry')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.changelog.index') }}" class="text-blue-600 hover:text-blue-800 text-sm">
            ← Back to changelog
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h2 class="text-xl font-bold text-gray-900 mb-4">Add Changelog Entry</h2>

        <form method="POST" action="{{ route('admin.changelog.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Version</label>
                <input type="text" name="version" value="{{ old('version', 'v2.0.0') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Details</label>
                <textarea name="body" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded-md" placeholder="- New: …&#10;- Improved: …&#10;- Fixed: …">{{ old('body') }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Markdown is not parsed; line breaks are preserved.</p>
            </div>

            <div class="flex gap-3 mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
                    Save entry
                </button>
                <a href="{{ route('admin.changelog.index') }}" class="px-4 py-2 border border-gray-300 rounded-md text-sm hover:bg-gray-50">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection


