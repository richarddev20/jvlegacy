@extends('layouts.admin')

@section('title', 'Changelog')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Changelog</h2>
            <p class="text-sm text-gray-500">Version history and notable changes.</p>
        </div>
        <a href="{{ route('admin.changelog.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-sm font-semibold">
            Add entry
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        @if($entries->isEmpty())
            <div class="p-6 text-sm text-gray-500">
                No changelog entries yet.
            </div>
        @else
            <ul class="divide-y divide-gray-200">
                @foreach($entries as $entry)
                    <li class="p-6">
                        <div class="flex items-center justify-between mb-1">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-50 text-blue-700">
                                    {{ $entry->version }}
                                </span>
                                <h3 class="text-sm font-semibold text-gray-900">
                                    {{ $entry->title }}
                                </h3>
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $entry->created_on ? $entry->created_on->format('d M Y, H:i') : '' }}
                            </div>
                        </div>
                        @if($entry->body)
                            <div class="mt-2 text-sm text-gray-700 prose max-w-none">
                                {!! nl2br(e($entry->body)) !!}
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection


