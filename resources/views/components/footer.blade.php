@props(['fixed' => false])

<div class="w-full border-black border-y-3 text-center p-2.5 text-sm lg:text-base bg-white {{ $fixed ? 'fixed bottom-0' : '' }}">
  {{ __('Zeitschrift für Technologie und Gesellschaft', 'vigia') }}
</div>
