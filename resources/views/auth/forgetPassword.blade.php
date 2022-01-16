@extends('layouts.app')

@section('content')

<div class="wrapper">
    <div class="logo"> 
        <img src="{{asset('/images/ppm-large.jpg')}}" alt=""> 
    </div>
    <div class="text-center mt-4 name"> 
        Reset Password
     </div>
     @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <form class="p-3 mt-3" method="POST" action="{{ route('forget.password.post')}}">
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
             placeholder="Enter email address"
             >
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="btn mt-3" type="submit">Send Password Reset Link</button>
    </form>
    <div class="text-center fs-6">  
         <a href="{{ route('login') }}">Go to Login?</a>  
    </div>
</div>
@endsection
