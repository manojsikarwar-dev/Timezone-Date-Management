@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Events') }}
                    <p style="margin-left: 625px;" >
                        <a href="{{ route('events.create') }}" class="btn btn-success">{{ __('Add Event') }}</a>
                    </p>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>@lang('global.events.fields.title')</th>
                                <th>@lang('global.events.fields.start-time')</th>
                                <th>{{ __('Action') }}</th>

                            </tr>
                        </thead>

                        <tbody>
                            @if (count($events) > 0)
                                @foreach ($events as $event)
                                    <tr data-entry-id="{{ $event->id }}">
                                        <td field-key='title'>{{ $event->title }}</td>
                                            <td field-key='start_time'>{{ date('Y-m-d H:i:s T',strtotime($event->start_time)) }}</td>
                                            <td>
                                                    <a href="{{ route('events.show',[$event->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>&nbsp;
                                                    <a href="{{ route('events.edit',[$event->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>&nbsp;
                                                    {!! Form::open(array(
                                                        'style' => 'display: inline-block;',
                                                        'method' => 'DELETE',
                                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                                        'route' => ['events.destroy', $event->id])) !!}
                                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                    {!! Form::close() !!}
                                            </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7">@lang('global.app_no_entries_in_table')</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
