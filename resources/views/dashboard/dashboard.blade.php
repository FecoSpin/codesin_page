@extends('dashboard.master')
@section('header')
<div class="breadcrumb">
    <h1>Dashboard</h1>
</div>
@stop
@section('content')
<div class="separator-breadcrumb border-top"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body text-center">
                <div class="mt-5 mb-5"><h1>bienvenido</h1></div>
                <figure class="mb-lg-5">
                    <img src="{{ asset('dashboard/images/logo/logo.png')}}" alt="">
                </figure>
            </div>
        </div>
    </div>
</div>
@stop