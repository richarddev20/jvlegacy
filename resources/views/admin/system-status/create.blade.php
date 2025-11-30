@extends('layouts.admin')

@section('title', 'Create System Status')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.system-status.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-900 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to System Status
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Create System Status</h1>

        @if($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.system-status.store') }}">
            @csrf

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status Type</label>
                    <select name="status_type" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                        @foreach(\App\Models\SystemStatus::TYPE_MAP as $type => $label)
                            <option value="{{ $type }}" @selected(old('status_type') == $type)>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Message (Full WYSIWYG Editor)</label>
                    <div id="message-editor" class="bg-white border border-gray-300 rounded-lg" style="min-height: 300px;"></div>
                    <textarea name="message" id="message-input" class="hidden" required>{{ old('message') }}</textarea>
                </div>

                <div class="flex items-center space-x-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="mr-2">
                        <span class="text-sm text-gray-700">Active</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="show_on_login" value="1" {{ old('show_on_login', true) ? 'checked' : '' }} class="mr-2">
                        <span class="text-sm text-gray-700">Show on Login Page</span>
                    </label>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Create Status
                    </button>
                    <a href="{{ route('admin.system-status.index') }}" class="px-6 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>

    @push('scripts')
    <!-- Quill.js CDN -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var quill = new Quill('#message-editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                        [{ 'font': [] }],
                        [{ 'size': [] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'color': [] }, { 'background': [] }],
                        [{ 'script': 'sub'}, { 'script': 'super' }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        [{ 'indent': '-1'}, { 'indent': '+1' }],
                        [{ 'direction': 'rtl' }],
                        [{ 'align': [] }],
                        ['link', 'image', 'video'],
                        ['blockquote', 'code-block'],
                        ['clean']
                    ]
                },
                placeholder: 'Enter your system status message here...'
            });

            // Set initial content if editing
            @if(old('message'))
                quill.root.innerHTML = {!! json_encode(old('message')) !!};
            @endif

            // Update hidden textarea before form submit
            document.querySelector('form').addEventListener('submit', function() {
                document.getElementById('message-input').value = quill.root.innerHTML;
            });
        });
    </script>
    @endpush
@endsection

