@extends('layout.main')

@section('main_container')
<div class="signup">
    <h1>Welcome User</h1>
    <a href="{{route('patient_signupgit')}}">
        <button>
            I am a patient
        </button>
    </a>
    <br/>
    <a href="#">
        <button>
            I am a Doctor
        </button>
        
    </a>
    <br/>
    <a href="#">
        <button>
            I am a Receptionist
        </button>
    </a>
</div>
@endsection
