@extends('dashboard.layouts.base')
@section('toolbar')
    @include('dashboard.layouts.components.toolbar',[
        'title' => 'Pixels',
        'breadcrumbs' => [
            ['title'=> 'Home', 'url' => url('/dashboard/')],
            ['title'=> 'Pixels', 'url' => route('dashboard.pixels.index')],
            ['title'=> 'Create Pixels'],
        ]
    ])
@endsection

@push('styles')
    {{ module_vite('pixels', 'resources/assets/sass/app.scss') }}
@endpush


@section('content')
    <div id="app">
        <create></create>
    </div>
@endsection

@push('scripts')
    {{ module_vite('pixels', 'resources/assets/js/app.js') }}
@endpush
