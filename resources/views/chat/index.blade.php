@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Chat
                </div>
                <div class="panel body">
                    <chat-log :messages="messages"></chat-log>
                    <chat-composer v-on:messagesent="addMessage" user="{{ auth()->user()->name }}"></chat-composer>
                </div>
            </div>
        </div>
    </div>
@endsection
