@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'block border border-gray-300 bg-[#FFFFFF] text-gray-900 placeholder-gray-400 rounded-full px-5 py-3 text-base focus:border-[#B59F84] focus:ring-2 focus:ring-[#B59F84] focus:bg-white transition-all duration-150 shadow-sm']) }}>
    