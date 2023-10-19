@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Events') }}
                </div>
                <div class="card-body">
                 {!! Form::open(['method' => 'POST', 'route' => ['events.store']]) !!}
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('title', trans('global.events.fields.title').'*', ['class' => 'control-label']) !!}
                            {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                             @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            {!! Form::label('start_time', trans('global.events.fields.start-time').'*', ['class' => 'control-label']) !!}
                            {!! Form::text('start_time', old('start_time'), ['class' => 'form-control datetime', 'placeholder' => '', 'required' => '']) !!}
                            <p class="help-block"></p>
                            @error('start_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
                <div class="row"><div class="col-xs-6"><a href="{{ route('events.index') }}" class="btn btn-info" style="margin-top: 5%;">@lang('global.app_back_to_list')</a></div></div>  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });

            $('.datetime').datetimepicker({
                format: "{{ config('app.datetime_format_moment') }}",
                locale: "{{ App::getLocale() }}",
                sideBySide: true,
            });

        });
    </script>

@stop