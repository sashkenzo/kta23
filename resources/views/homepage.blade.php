@extends('layouts.master')

@section('content')

    @include("dashboard.layouts.bannercarousel.carousel")

    @include("layouts.latest")
    @include("dashboard.layouts.cards.cards")
    @include("dashboard.layouts.banner.banner")

@endsection
