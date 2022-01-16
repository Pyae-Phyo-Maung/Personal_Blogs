@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="logo"> 
        <img src="{{asset('/images/ppm-large.jpg')}}" alt=""> 
    </div>
    <div class="text-center mt-4 name"> 
        Login
     </div>
    <form class="p-3 mt-3" method="POST" action="{{ route('login') }}">
    @csrf
        <div class="form-field d-flex align-items-center"> 
            <span class="fas fa-envelope-square"></span>
            <input 
            id="email" 
            type="email" 
            class="form-control @error('email') is-invalid @enderror" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            autocomplete="email" 
            autofocus
            placeholder="Enter email address">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-field d-flex align-items-center"> 
            <span class="fas fa-key"></span> 
            <input
             id="pwd"
             type="password" 
             name="password"  
             class="form-control @error('password') is-invalid @enderror" 
             required 
             autocomplete="current-password"
             placeholder="Enter password"> 
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> 
        <button class="btn mt-3" type="submit">Login</button>
    </form>
    <div class="text-center fs-6">
         @if (Route::has('forget.password.get'))
            <a  href="{{ route('forget.password.get') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif 
        or <a href="{{ route('register') }}">Sign up</a> 
    </div>      
</div>
        
@endsection
