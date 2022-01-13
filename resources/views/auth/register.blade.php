@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="logo"> 
        <img src="{{asset('/images/ppm-large.jpg')}}" alt=""> 
    </div>
    <div class="text-center mt-4 name"> 
        Registeration
     </div>
    <form class="p-3 mt-3" method="POST" action="{{ route('register') }}">
    @csrf
       
        <div class="form-field d-flex align-items-center"> 
            <span class="fas fa-signature"></span>
            <input 
            id="name" 
            type="text" 
            class="form-control @error('name') is-invalid @enderror"
            name="name" 
            value="{{ old('name') }}" 
            required 
            autocomplete="name" 
            autofocus
            placeholder="Enter name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
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
        <div class="form-field d-flex align-items-center">
             <span class="fas fa-key"></span>
            <input 
            id="password-confirm" 
            type="password" 
            class="form-control" 
            name="password_confirmation" 
            required 
            autocomplete="new-password"
            placeholder="Enter confirm password">
        </div> 
        <button class="btn mt-3" type="submit">Register</button>

    </form>
    <div class="text-center fs-6">  
         <a href="{{ route('login') }}">  Already have an account?Login</a>  
    </div>
</div>
@endsection
