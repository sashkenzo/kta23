@extends('layouts.master')

@section('content')
<div class="container">
<div class="row col-12">
        <div class="col-sm-8 items-center">
    @include("dashboard.layouts.bannercarousel.carousel")
        </div>
            <div class="col-sm-4">
    @include("dashboard.layouts.banner.banner")
            </div>
    </div>
</div>

    @include("dashboard.layouts.cards.cards")


@endsection
