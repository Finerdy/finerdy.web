@php
$types = [
    // Español
    'ingreso' => ['bg' => 'bg-success-100', 'text' => 'text-success-800', 'label' => 'Ingreso'],
    'gasto' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'label' => 'Gasto'],
    'transferencia' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'label' => 'Transferencia'],
    'cambio' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800', 'label' => 'Cambio'],
    'corrección' => ['bg' => 'bg-gray-200', 'text' => 'text-gray-800', 'label' => 'Corrección'],
    // English
    'income' => ['bg' => 'bg-success-100', 'text' => 'text-success-800', 'label' => 'Income'],
    'expense' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'label' => 'Expense'],
    'transfer' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'label' => 'Transfer'],
    'exchange' => ['bg' => 'bg-purple-100', 'text' => 'text-purple-800', 'label' => 'Exchange'],
    'correction' => ['bg' => 'bg-gray-200', 'text' => 'text-gray-800', 'label' => 'Correction'],
];
$config = $types[strtolower($type)] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'label' => $type];
@endphp

<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold not-prose {{ $config['bg'] }} {{ $config['text'] }}">
    {{ $config['label'] }}
</span>
