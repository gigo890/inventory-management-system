@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['type' => 'number','step' => '0.01', 'class' => 'text-gray-800 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
