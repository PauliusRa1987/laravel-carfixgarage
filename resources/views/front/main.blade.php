@extends('layouts.app')
@section('content')
<div class="container front">
    <h1 class="card-title col-8 mt-3">Welcome to the CARFIXGARAGE home page</h1>
    <p class="card-text col-6 mt-3">You might have had bad experiences in the past with mechanics, car repair shops, second hand car dealers or car bodyshops and hence hold reservations about such businesses, but CARFIXGARAGE is different. Check our services!</p>
</div>
<div class="container div-btn-box1 mt-5">
    <div class="card-deck mb-3 text-center col-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Our WorkShops</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-muted">Top Locations</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>50+ years of trusted experience</li>
                    <li>Up to 50% cheaper than franchise dealers</li>
                    <li>No job too big or too small</li>
                    <li>Secure cashless payments</li>
                </ul>
                <a href="{{route('garage-index')}}" class="btn btn-lg btn-block btn-outline-primary">Check our WorkShops</a>
            </div>
        </div>
    </div>
    <div class="card-deck mb-3 text-center col-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Our Facilities</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">From $30 <small class="text-muted">/ ps</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Wheel Alignment</li>
                    <li>Suspecion check</li>
                    <li>Brake Services</li>
                    <li>Clutch Repair and meny others..</li>
                </ul>
                <a href="{{route('facility-index')}}" class="btn btn-lg btn-block btn-outline-primary">Check our Facilities</a>
            </div>
        </div>
    </div>
    <div class="card-deck mb-3 text-center col-3">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Our Mechanics</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><small class="text-muted">Get it done</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>50 Strong Men</li>
                    <li>Up to 50% no-problem</li>
                    <li>No job too big or too small</li>
                    <li>Like cash</li>
                </ul>
                <a href="{{route('mechanic-index')}}" class="btn btn-lg btn-block btn-outline-primary">Check our Mechanics bio</a>
            </div>
        </div>
    </div>
</div>
@endsection
