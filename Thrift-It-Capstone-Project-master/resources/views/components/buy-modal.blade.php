<div>
    <!-- Buy Button -->
    @if($product->qr_code)
        <button 
            data-modal-target="buyModal-{{ $product->id }}" 
            data-modal-toggle="buyModal-{{ $product->id }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Buy Now
        </button>
    @endif

    <!-- Modal -->
    <div id="buyModal-{{ $product->id }}" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
            <!-- Close button -->
            <button type="button" class="absolute top-3 right-3 text-gray-500 hover:text-black"
                data-modal-hide="buyModal-{{ $product->id }}">
                ✖
            </button>

            <h2 class="text-lg font-semibold mb-4">Buy {{ $product->name }}</h2>

            <!-- QR Code -->
            <div class="mb-4 text-center">
                <p class="mb-2">Scan the QR Code to Pay</p>
                <img src="{{ asset('storage/' . $product->qr_code) }}" alt="QR Code" class="mx-auto w-48 h-48 object-contain border rounded-lg">
            </div>

            <!-- Upload Proof -->
            <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

            <div>
                    <label for="proof" class="block text-sm font-medium text-gray-700">Upload Proof of Payment</label>
                    <input type="file" name="proof" id="proof" accept="image/*" required
                           class="block w-full border rounded-md p-2 mt-1">
                </div>

                <button type="submit" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                    Submit Proof
                </button>
            </form>
        </div>
    </div>
</div>
