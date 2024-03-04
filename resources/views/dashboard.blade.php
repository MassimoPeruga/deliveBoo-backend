@extends('layouts.admin')

@section('content')
    <div class=" containerinfo">
        <div class="row justify-content-center containermain">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.restaurants.create') }}">Ristorante</a>
        </div>
        {{-- <form action="{{ route('dish.store') }}">
            <button class="btn btn-primary btnanimation">Crea un nuovo piatto</button>
        </form> --}}
    </div>
@endsection
