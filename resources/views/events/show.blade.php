@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Events details') }}
                </div>
                <div class="card-body">
                   <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>@lang('global.events.fields.title')</th>
                                <td field-key='title'>{{ $event->title }}</td>
                            </tr>
                            <tr>
                                <th>@lang('global.events.fields.start-time')</th>
                                <td field-key='start_time'>{{ date('Y-m-d H:i:s T',strtotime($event->start_time)) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a href="{{ route('events.index') }}" class="btn btn-info">@lang('global.app_back_to_list')</a>
            </div>
        </div>
    </div>
</div>
@endsection