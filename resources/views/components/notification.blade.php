@props(['clase' => 'text-success', 'lucide' => 'check-circle'])

<div id="success-notification-content" class="toastify-content hidden flex">
    <i class="{{ $clase }}" data-lucide="{{ $lucide }}"></i>
    <div class="ml-4 mr-4">
        <div class="font-medium">{{ $title }}</div>
        <div class="text-slate-500 mt-1">{{ $slot }}</div>
    </div>
</div>