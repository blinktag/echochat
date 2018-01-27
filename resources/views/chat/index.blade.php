@extends('layouts.app')

@section('content')
    <chat-log :messages="messages"></chat-log>
    <chat-composer v-on:messagesent="addMessage"></chat-composer>
@endsection
