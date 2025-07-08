<div x-data="{showAlert: @entangle('showAlert'),initialized: false }" x-init="initialized = true" x-effect="if (initialized && showAlert) { setTimeout(() => showAlert = false, 5000); }" class="fixed -translate-x-full bottom-4 -left-1 opacity-0 z-50 transition-all duration-500" :class="showAlert ? 'translate-x-0 bottom-4 left-6 opacity-100' : ''" wire:key="alert">
  <div class="bg-white bg-opacity-20 border border-white text-sm rounded-lg px-4 py-3 shadow-lg flex items-center space-x-2 max-w-full">
    @if($alertType == "green")
      <span class="text-{{$alertType}}-800">&check;</span>
      <div class="flex-1">
        <p class="text-xs text-{{$alertType}}-900">{{$alertMsg}}</p>
      </div>
    @else
      <span class="text-{{$alertType}}-600">&cross;</span>
      <div class="flex-1">
        <p class="text-xs text-{{$alertType}}-700">{{$alertMsg}}</p>
      </div>
    @endif
    
  </div>
</div>