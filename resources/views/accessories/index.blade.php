@extends('app')

@section('title', 'Accessories')

@section('content')

    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6 max-w-5xl mx-auto">
            <h2 class="text-2xl font-semibold">Accessory List</h2>
            <form method="GET" action="{{ route('accessories.index') }}" class="mb-4" id="brand-filter-form">


            </form>
            <a href="{{ route('accessories.create') }}" class="btn btn-outline">
                ➕ Add Accessory
            </a>
        </div>

        @livewire('accessories-page')
    </div>

@endsection

