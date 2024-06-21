<?php
@extends('app')

@section('content')
    @foreach($workers as $worker)
        @include(
            'components.workerPanel',
            ['name' => $worker->name, 'position' => 'Worker', 'bio' => $worker->bio, 'id' => $worker->id]
        )
    @endforeach
@endsection
