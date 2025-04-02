@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12"></div>
    @include("dashboard.layouts.bannercarousel.carousel")

    @include("dashboard.layouts.banner.banner")
</div>


    @include("dashboard.layouts.cards.cards")


@endsection
