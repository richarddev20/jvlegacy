@extends('layouts.admin')

@section('title', 'Email Templates')

@section('content')
    <div class="mb-4">
        <h2 class="text-2xl font-bold text-gray-900">Email Templates</h2>
        <p class="text-sm text-gray-500">These templates are rendered and then sent via Postmark.</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        @if($templates->isEmpty())
            <div class="p-6 text-sm text-gray-500">
                No templates found.
            </div>
        @else
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Key</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Subject</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($templates as $template)
                        <tr>
                            <td class="px-6 py-4 text-sm font-mono text-gray-700">{{ $template->key }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $template->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $template->subject }}</td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('admin.email-templates.edit', $template->id) }}" class="text-sm text-blue-600 hover:text-blue-800 font-semibold">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection


