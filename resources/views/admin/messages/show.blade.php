@extends('layouts.admin')

@section('title', 'Message')
@section('header', 'Message')

@section('content')

    <div class="py-4">
        <h2 class="">Name: {{ $message->name }}</h2>
        <h2 class="">Email: {{ $message->email }}</h2>
        <h2 class="">Date: {{ \Carbon\Carbon::parse($message->created_at)->toFormattedDateString() }}</h2>

        <p class="py-4">{{ $message->message }}</p>

    </div>

@endsection