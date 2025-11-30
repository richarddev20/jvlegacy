@extends('layouts.admin')

@section('title', 'Edit System Status')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.system-status.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-900 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to System Status
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit System Status</h1>

        @if($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.system-status.update', $status->id) }}">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" value="{{ old('title', $status->title) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status Type</label>
                    <select name="status_type" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                        @foreach(\App\Models\SystemStatus::TYPE_MAP as $type => $label)
                            <option value="{{ $type }}" @selected(old('status_type', $status->status_type) == $type)>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Message (Full WYSIWYG Editor) <span class="text-red-500">*</span></label>
                    <div id="message-editor" class="bg-white border border-gray-300 rounded-lg" style="min-height: 300px;"></div>
                    <textarea name="message" id="message-input" class="hidden">{{ old('message', $status->message) }}</textarea>
                    <p class="text-xs text-red-600 mt-1 hidden" id="message-error">Please enter a message for the system status.</p>
                </div>

                <div class="flex items-center space-x-6">
                    <label class="flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $status->is_active) ? 'checked' : '' }} class="mr-2">
                        <span class="text-sm text-gray-700">Active</span>
                    </label>
                    <label class="flex items-center">
                        <input type="checkbox" name="show_on_login" value="1" {{ old('show_on_login', $status->show_on_login) ? 'checked' : '' }} class="mr-2">
                        <span class="text-sm text-gray-700">Show on Login Page</span>
                    </label>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        Update Status
                    </button>
                    <a href="{{ route('admin.system-status.index') }}" class="px-6 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                        Cancel
                    </a>
                </div>
            </div>
        </form>

        <!-- Status Updates Section -->
        <div class="mt-8 pt-8 border-t border-gray-200">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Status Updates</h2>
            <p class="text-sm text-gray-600 mb-4">Add updates to this status message. Users can mark updates as "fixed" when issues are resolved.</p>

            <!-- Add Update Form -->
            <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <form id="add-update-form" class="space-y-3">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Add Update</label>
                        <textarea 
                            id="update-message" 
                            rows="3" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md" 
                            placeholder="Add an update to this status message..."
                            required
                        ></textarea>
                    </div>
                    <button 
                        type="submit" 
                        class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 text-sm font-medium"
                    >
                        <i class="fas fa-plus mr-2"></i>Add Update
                    </button>
                </form>
            </div>

            <!-- Updates List -->
            <div class="space-y-3">
                @php
                    try {
                        $updates = $status->updates ?? collect();
                    } catch (\Exception $e) {
                        $updates = collect();
                    }
                @endphp

                @if($updates->isEmpty())
                    <div class="p-6 text-center bg-gray-50 rounded-lg border border-gray-200">
                        <i class="fas fa-info-circle text-gray-300 text-2xl mb-2"></i>
                        <p class="text-sm text-gray-500">No updates yet. Add the first update above.</p>
                    </div>
                @else
                    @foreach($updates as $update)
                        <div class="p-4 bg-white rounded-lg border border-gray-200 {{ $update->is_fixed ? 'bg-green-50 border-green-200' : '' }}">
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <div class="flex items-center gap-2 mb-2">
                                        <p class="text-sm font-medium text-gray-900">
                                            {{ $update->account->name ?? 'System' }}
                                        </p>
                                        <span class="text-xs text-gray-500">
                                            {{ $update->created_on?->format('d M Y, H:i') ?? '' }}
                                        </span>
                                        @if($update->is_fixed)
                                            <span class="px-2 py-0.5 text-xs font-medium bg-green-100 text-green-800 rounded-full flex items-center gap-1">
                                                <i class="fas fa-check-circle"></i> Fixed
                                            </span>
                                            @if($update->fixedBy)
                                                <span class="text-xs text-gray-500">
                                                    by {{ $update->fixedBy->name }}
                                                </span>
                                            @endif
                                        @endif
                                    </div>
                                    <p class="text-sm text-gray-700 whitespace-pre-wrap">{{ $update->message }}</p>
                                </div>
                                @if(!$update->is_fixed)
                                    <form 
                                        method="POST" 
                                        action="{{ route('admin.system-status-updates.mark-fixed', $update->id) }}" 
                                        class="ml-4"
                                    >
                                        @csrf
                                        <button 
                                            type="submit" 
                                            class="px-3 py-1 text-xs font-medium text-green-700 bg-green-100 rounded hover:bg-green-200 transition-colors"
                                        >
                                            <i class="fas fa-check mr-1"></i>Mark Fixed
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
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

            // Set initial content
            quill.root.innerHTML = {!! json_encode(old('message', $status->message)) !!};

            // Update hidden textarea before form submit
            var form = document.querySelector('form');
            var messageInput = document.getElementById('message-input');
            var messageError = document.getElementById('message-error');
            
            form.addEventListener('submit', function(e) {
                var content = quill.root.innerHTML;
                var textContent = quill.getText().trim();
                
                // Check if editor has meaningful content
                if (!textContent || textContent === '') {
                    e.preventDefault();
                    e.stopPropagation();
                    messageError.classList.remove('hidden');
                    quill.focus();
                    // Scroll to editor
                    document.getElementById('message-editor').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return false;
                }
                
                // Hide error if content exists
                messageError.classList.add('hidden');
                
                // Update hidden textarea with HTML content
                messageInput.value = content;
                
                // Remove any validation attributes that might cause issues
                messageInput.removeAttribute('required');
                
                // Show loading state
                var submitButton = form.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.disabled = true;
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Updating...';
                }
                
                return true;
            });
            
            // Clear error when user starts typing
            quill.on('text-change', function() {
                var textContent = quill.getText().trim();
                if (textContent && textContent !== '') {
                    messageError.classList.add('hidden');
                }
            });

            // Handle add update form
            var addUpdateForm = document.getElementById('add-update-form');
            if (addUpdateForm) {
                addUpdateForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    var message = document.getElementById('update-message').value.trim();
                    if (!message) {
                        alert('Please enter an update message');
                        return;
                    }

                    var formData = new FormData();
                    formData.append('message', message);
                    formData.append('_token', '{{ csrf_token() }}');

                    var submitButton = addUpdateForm.querySelector('button[type="submit"]');
                    var originalText = submitButton.innerHTML;
                    submitButton.disabled = true;
                    submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Adding...';

                    fetch('{{ route("admin.system-status.add-update", $status->id) }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('update-message').value = '';
                            location.reload();
                        } else {
                            alert('Error adding update: ' + (data.message || 'Unknown error'));
                            submitButton.disabled = false;
                            submitButton.innerHTML = originalText;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Error adding update. Please try again.');
                        submitButton.disabled = false;
                        submitButton.innerHTML = originalText;
                    });
                });
            }
        });
    </script>
    @endpush
@endsection

