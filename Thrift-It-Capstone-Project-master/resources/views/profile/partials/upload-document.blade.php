<section x-data="{ showUpload: false }" class="space-y-4">
    <!-- Trigger Button -->
    <div class="relative">
    <button type="button"
        @click="showUpload = !showUpload"
        class="inline-flex items-center gap-3 px-6 py-3 
            @if($user->verification_status === 'pending') bg-amber-500/90 cursor-not-allowed 
            @elseif($user->verification_status === 'approved') bg-emerald-600 hover:bg-emerald-700 
            @else bg-green-600 hover:bg-green-700 @endif
            border-0 rounded-2xl font-semibold text-sm text-white uppercase tracking-wider shadow-lg 
            hover:shadow-xl transform transition-all duration-300 ease-out
            focus:outline-none focus:ring-3 focus:ring-green-400 focus:ring-offset-2 focus:ring-offset-white
            disabled:opacity-80 disabled:cursor-not-allowed disabled:transform-none disabled:hover:shadow-lg"
        @if($user->verification_status === 'pending' || $user->verification_status === 'approved') disabled @endif>
        
        <!-- Icons for each state -->
        @if($user->verification_status === 'pending')
            <svg class="w-5 h-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Under Review</span>
            
        @elseif($user->verification_status === 'approved')
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Verified</span>
            
        @else
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
            </svg>
            <span>Get Verified</span>
        @endif
    </button>

    <!-- Status Description -->
    <div class="mt-2 text-xs text-gray-500 dark:text-gray-400 font-medium transition-opacity duration-300">
        @if($user->verification_status === 'pending')
            ⏳ Your verification is being reviewed
        @elseif($user->verification_status === 'approved')
            ✅ Identity verified successfully
        @else
            🔒 Verify your account to unlock features
        @endif
    </div>
</div>

    <!-- Approved -->
    @if($user->verification_status === 'approved')
        <div class="p-6 border border-green-500 rounded-xl bg-green-50 dark:bg-gray-900 shadow-inner">
            <h3 class="text-lg font-semibold text-green-700 dark:text-green-400 mb-3">✅ Account Verified</h3>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                Your account is <span class="font-bold">verified</span>. You can now sell and enjoy full access 🚀
            </p>
        </div>

    <!-- Pending -->
    @elseif($user->verification_status === 'pending')
        <div class="p-6 border border-green-400 rounded-xl bg-green-50 dark:bg-gray-900 shadow-inner">
            <h3 class="text-lg font-semibold text-green-700 dark:text-green-400 mb-3">⏳ Verification Pending</h3>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                Your document has been submitted and is under review.  
                Please wait <span class="font-medium">1–3 working days</span> for approval.
            </p>
        </div>

    <!-- Not Verified Yet -->
    @else
        <div x-show="showUpload" x-transition
            class="p-6 border border-dashed border-green-400 rounded-xl bg-green-50 dark:bg-gray-900 shadow-inner">
            
            <h3 class="text-lg font-semibold text-green-700 dark:text-green-400 mb-3">Upload Verification Document</h3>

            <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">
                Please upload a clear photo or scan of one of the following valid IDs.  
                <span class="font-medium">Max file size: 2MB.</span>
            </p>

            <!-- List of Legal Documents -->
            <ul class="list-disc list-inside text-sm text-gray-700 dark:text-gray-300 mb-4 space-y-1">
                <li>Passport</li>
                <li>Driver’s License</li>
                <li>National ID / PhilSys</li>
                <li>SSS / GSIS ID</li>
                <li>PRC License</li>
                <li>Voter’s ID</li>
                <li>Postal ID</li>
            </ul>

            <form action="{{ route('profile.verification.upload') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <input type="file" name="verification_document" id="verification_document"
                        class="block w-full text-sm text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:placeholder-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-green-700 hover:file:bg-green-200">
                    @error('verification_document')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end gap-3">
                    <button type="button"
                        @click="showUpload = false"
                        class="px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">
                        Cancel
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2 bg-green-600 border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wide hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    @endif
</section>
