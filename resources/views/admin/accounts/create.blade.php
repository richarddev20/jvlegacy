@extends('layouts.admin')

@section('title', 'Create Account')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.accounts.index') }}" class="inline-flex items-center text-blue-600 hover:text-blue-900 font-medium">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Accounts
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Create New Account</h1>

        @if($errors->any())
            <div class="mb-6 bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.accounts.store') }}" class="space-y-6">
            @csrf

            <!-- Account Type Selection -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Account Type <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-2 gap-4">
                    <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-300 transition-colors">
                        <input type="radio" name="account_type" value="person" class="mr-3" required>
                        <div>
                            <p class="font-semibold text-gray-900">Individual</p>
                            <p class="text-sm text-gray-500">Person account</p>
                        </div>
                    </label>
                    <label class="flex items-center p-4 border-2 border-gray-200 rounded-lg cursor-pointer hover:border-blue-300 transition-colors">
                        <input type="radio" name="account_type" value="company" class="mr-3" required>
                        <div>
                            <p class="font-semibold text-gray-900">Company</p>
                            <p class="text-sm text-gray-500">Business account</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Account Type ID -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Account Type ID <span class="text-red-500">*</span></label>
                <select name="type_id" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    <option value="">Select account type...</option>
                    @foreach($accountTypes as $type)
                        <option value="{{ $type->id }}" @selected(old('type_id') == $type->id)>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password <span class="text-red-500">*</span></label>
                <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md" required minlength="8">
                <p class="text-xs text-gray-500 mt-1">Minimum 8 characters</p>
            </div>

            <!-- Password Confirmation -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password <span class="text-red-500">*</span></label>
                <input type="password" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md" required minlength="8">
            </div>

            <!-- Person Fields (shown when account_type is person) -->
            <div id="person-fields" class="hidden space-y-4">
                <div class="border-t border-gray-200 pt-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Person Details</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">First Name <span class="text-red-500">*</span></label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Last Name <span class="text-red-500">*</span></label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Telephone</label>
                        <input type="text" name="telephone_number" value="{{ old('telephone_number') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                </div>
            </div>

            <!-- Company Fields (shown when account_type is company) -->
            <div id="company-fields" class="hidden space-y-4">
                <div class="border-t border-gray-200 pt-4">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Company Details</h3>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Company Name <span class="text-red-500">*</span></label>
                        <input type="text" name="company_name" value="{{ old('company_name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">
                    <i class="fas fa-save mr-2"></i>Create Account
                </button>
                <a href="{{ route('admin.accounts.index') }}" class="px-6 py-2 border border-gray-300 rounded-md hover:bg-gray-50">
                    Cancel
                </a>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const accountTypeRadios = document.querySelectorAll('input[name="account_type"]');
            const personFields = document.getElementById('person-fields');
            const companyFields = document.getElementById('company-fields');

            accountTypeRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'person') {
                        personFields.classList.remove('hidden');
                        companyFields.classList.add('hidden');
                        // Make person fields required
                        personFields.querySelectorAll('input').forEach(input => {
                            if (input.name === 'first_name' || input.name === 'last_name') {
                                input.setAttribute('required', 'required');
                            }
                        });
                        // Remove required from company fields
                        companyFields.querySelectorAll('input').forEach(input => {
                            input.removeAttribute('required');
                        });
                    } else if (this.value === 'company') {
                        companyFields.classList.remove('hidden');
                        personFields.classList.add('hidden');
                        // Make company fields required
                        companyFields.querySelectorAll('input').forEach(input => {
                            if (input.name === 'company_name') {
                                input.setAttribute('required', 'required');
                            }
                        });
                        // Remove required from person fields
                        personFields.querySelectorAll('input').forEach(input => {
                            input.removeAttribute('required');
                        });
                    }
                });
            });

            // Trigger on page load if old value exists
            const oldAccountType = '{{ old("account_type") }}';
            if (oldAccountType) {
                const radio = document.querySelector(`input[name="account_type"][value="${oldAccountType}"]`);
                if (radio) {
                    radio.checked = true;
                    radio.dispatchEvent(new Event('change'));
                }
            }
        });
    </script>
    @endpush
@endsection

