@props(['currentStep' => 1])

@php
    $steps = ['Product Details', 'Optional QR', 'Finalize'];
    $totalSteps = count($steps);
    $progressPercent = ($currentStep - 1) / ($totalSteps - 1) * 100;
@endphp

<div class="relative mb-8">
    <div class="absolute top-3.5 left-0 w-full h-1 bg-gray-300 rounded"></div>
    <div class="absolute top-3.5 left-0 h-1 bg-[#E1D5B6] rounded transition-all duration-500" 
         style="width: {{ $progressPercent }}%"></div>

    <div class="flex justify-between relative">
        @foreach($steps as $index => $step)
            @php
                $stepNumber = $index + 1;
                $completed = $stepNumber <= $currentStep;
                $active = $stepNumber === $currentStep;
            @endphp

            <div class="flex flex-col items-center w-1/3">
                <div class="w-8 h-8 flex items-center justify-center rounded-full
                            {{ $completed ? 'bg-[#E1D5B6] text-white' : 'bg-gray-300 text-gray-700' }}
                            transition-all duration-500">
                    {{ $stepNumber }}
                </div>
                <span class="mt-2 text-xs text-center 
                             {{ $active ? 'font-semibold text-gray-800 dark:text-gray-100' : 'text-gray-500 dark:text-gray-400' }}">
                    {{ $step }}
                </span>
            </div>
        @endforeach
    </div>
</div>
