<div id="orders" class="hidden overflow-hidden mb-8">
    <!-- Header with Description -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-2 flex items-center gap-2">
                <svg class="w-6 h-6 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                Order Management
            </h3>
            <p class="text-gray-600 dark:text-gray-400 text-sm max-w-2xl">
                Manage your customer orders, track order status, and update delivery progress.
                Review payment proofs and ensure smooth order fulfillment.
            </p>
        </div>
        <div class="text-right">
            <div class="text-lg font-bold text-[#B59F84]">{{ $orders->count() }}</div>
            <div class="text-sm text-gray-500 dark:text-gray-400">Total Orders</div>
        </div>
    </div>

    @if ($orders->count() > 0)
        <!-- Orders Table -->
        <div class="overflow-x-auto border border-[#E9DFC7] dark:border-gray-700 rounded-lg">
            <table class="min-w-full">
                <thead class="bg-[#F8F4EC] dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Order ID
                            </div>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                Product
                            </div>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Buyer
                            </div>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Status
                            </div>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Actions
                            </div>
                        </th>
                        <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Payment Proof
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#E9DFC7] dark:divide-gray-600">
                    @foreach ($orders as $order)
                        <tr class="hover:bg-[#F8F4EC] dark:hover:bg-gray-700 transition-colors">
                            <!-- Order ID -->
                            <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    #{{ $order->id }}
                                </div>
                            </td>

                            <!-- Product -->
                            <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    {{ $order->product->name }}
                                </div>
                            </td>

                            <!-- Buyer -->
                            <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    {{ $order->buyer->fname }}
                                </div>
                            </td>

                            <!-- Status -->
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center gap-2">
                                    @if ($order->status === 'pending')
                                        <svg class="w-4 h-4 text-[#8A7560]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @elseif($order->status === 'approved')
                                        <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    @elseif($order->status === 'delivering')
                                        <svg class="w-4 h-4 text-[#6B5B48]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                        </svg>
                                    @elseif($order->status === 'completed')
                                        <svg class="w-4 h-4 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif
                                    <span class="px-2 py-1 rounded-full text-xs font-medium
                                        @if ($order->status === 'pending') bg-[#F1E9D2] text-[#8A7560]
                                        @elseif($order->status === 'approved') bg-[#F8F4EC] text-[#B59F84]
                                        @elseif($order->status === 'delivering') bg-[#E1D5B6] text-[#6B5B48]
                                        @elseif($order->status === 'completed') bg-[#F8F4EC] text-[#B59F84]
                                        @else bg-[#F4F2ED] text-[#8A7560] @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                            </td>

                            <!-- Actions -->
                            <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                                <div class="flex flex-wrap gap-1">
                                    @if ($order->status === 'pending')
                                        <form action="{{ route('orders.updateStatus', [$order->id, 'approved']) }}" method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-1 text-xs bg-[#B59F84] text-white rounded hover:bg-[#9C8770] transition-colors gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('orders.updateStatus', [$order->id, 'cancelled']) }}" method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-1 text-xs bg-[#8A7560] text-white rounded hover:bg-[#6B5B48] transition-colors gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Cancel
                                            </button>
                                        </form>
                                    @elseif($order->status === 'approved')
                                        <form action="{{ route('orders.updateStatus', [$order->id, 'delivering']) }}" method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-1 text-xs bg-[#B59F84] text-white rounded hover:bg-[#9C8770] transition-colors gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                                </svg>
                                                Shipping
                                            </button>
                                        </form>
                                    @elseif($order->status === 'delivering')
                                        <form action="{{ route('orders.updateStatus', [$order->id, 'completed']) }}" method="POST" class="inline">
                                            @csrf @method('PATCH')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-1 text-xs bg-[#9C8770] text-white rounded hover:bg-[#8A7560] transition-colors gap-1">
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Complete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>

                            <!-- Payment Proof -->
                            <td class="px-4 py-3 text-sm text-gray-800 dark:text-gray-200">
                                @if ($order->proof)
                                    <button type="button"
                                            onclick="window.open('{{ Storage::disk('s3')->url($order->proof) }}', '_blank')"
                                            class="inline-flex items-center px-3 py-1 text-xs bg-[#B59F84] text-white rounded hover:bg-[#9C8770] transition-colors gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        View Proof
                                    </button>
                                @else
                                    <div class="flex items-center gap-1 text-gray-500 dark:text-gray-400 text-xs">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                        </svg>
                                        No proof uploaded
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <!-- Empty State -->
        <div class="text-center py-12">
            <div class="w-16 h-16 bg-[#F8F4EC] dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8 text-[#B59F84]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">No Orders Yet</h4>
            <p class="text-gray-600 dark:text-gray-400 text-sm max-w-md mx-auto">
                Your order dashboard is ready! When customers place orders, they will appear here for you to manage.
            </p>
        </div>
    @endif
</div>