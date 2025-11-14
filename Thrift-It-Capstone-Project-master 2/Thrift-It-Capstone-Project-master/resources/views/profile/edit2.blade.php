<x-app-layout>
 


    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            {{-- Subscription Type --}}
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Subscription Type') }}
                    </h3>

                    @if ($user->subscribedToProduct('prod_T4nVT7WiXSJe56'))
                        <p>You are subscribed to our Starter Rack plan.</p>
                    @endif

                    @if ($user->subscribedToPrice('price_basic_monthly'))
                        <p>You are subscribed to our monthly Basic plan.</p>
                    @endif
                </div>
            </div>

           
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
