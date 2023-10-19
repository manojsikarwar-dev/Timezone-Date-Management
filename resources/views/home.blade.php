@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You can create meeting on clicking button => ') }}

                     <a href="{{ url('events') }}" class="btn btn-xs btn-primary">{{ __('Create Event') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
