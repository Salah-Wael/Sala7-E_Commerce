@extends('layouts.master')

@section('content')
<!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h2>Verify Your Email Address</h2>
                        <p>We sale fresh fruits</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end breadcrumb section -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <p><input type="submit" value="click here to request another"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
