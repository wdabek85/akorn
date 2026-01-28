@extends('layouts.app')
@section('content')

    <div class="flex gap-2">
        <x-button href="{{ home_url('/kontakt') }}" variant="primary" size="lg">
            Kup teraz
        </x-button>
    
        <x-button variant="secondary" size="lg">
            <x-slot name="leftIcon">
              {{-- tu wstaw SVG albo swój komponent ikony --}}
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M12 5v14M5 12h14"/></svg>
            </x-slot>
          
            Dodaj
        </x-button>
    </div>
    
  
@endsection