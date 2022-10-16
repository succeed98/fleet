@extends('layouts.app')

@section('content')
    <nav class="level app-levelbar">
        <div class="level-left">
            <div class="level-item">
                <h3 class="subtitle is-5"><strong>Home</strong></h3></div>
            <div class="level-item">
              <span aria-label="Dashboard" class="icon tooltip tooltip--right tooltip--small tooltip--rounded">
                <a href="#"><i class="fa fa-home"></i></a>
              </span>
            </div>
        </div>
        <div class="level-right is-hidden-mobile">
            <ol class="breadcrumb">
                <li><span class="active">Home</span></li>
            </ol>
        </div>
    </nav>

    <div class="content has-text-centered animated">
        <p><img width="200" src="{{ asset('img/logo@2x.png') }}" alt="Vue Admin Panel Framework"></p>
        <h1 class="is-title is-bold">Fleet Admin</h1>
        <p>
            <strong>Fleet Management System</strong>
        </p>
    </div>
@endsection
