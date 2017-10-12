@extends('layouts.app')

@section('title', 'Home Index')

@section('content')
<div class="container">
    <div class="row">
        <router-view></router-view>
    </div>
</div>
@endsection

