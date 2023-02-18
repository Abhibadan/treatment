@extends('layout.main')

@section('main_container')
<form method="post" action="{{route('patient_register')}}">
    @csrf   
    <div class="mb-3">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <x-upload_image lable='Choose Profile photo' name='profile' />
            </div>
            <div class="col-md-8 col-sm-12">
                <x-inputs lable='Name' type='text' name='name' holder='Enter your name'/>
               
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <label for="gender" class="col-form-label">Gender</label>
                <select name="gender" class="form-control">
                    <option value="">--select gender--</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                </select>
                <span class="text-danger" style="font-size:12px">
                    @error('gender')
                        *{{$message}}
                    @enderror
                </span>
            </div>
            <div class="col-md-6 col-sm-12">
                <x-inputs lable='Date of birth' type='date' name='dob' holder='dd-mm-yyyy'/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <x-inputs lable='Phone No' type='text' name='mno' holder='Enter valid mobile number'/>
            </div>
            <div class="col-md-6 col-sm-12">
                <x-inputs lable='Email' type='email' name='email' holder='Enter valid email'/>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 col-sm-12">
                <x-inputs lable='Village/city' type='text' name='city' holder='e:City'/>
            </div>
            <div class="col-md-4 col-sm-12">
                <x-inputs lable='District' type='text' name='distrct' holder='e:District'/>
            </div>
            <div class="col-md-4 col-sm-12">
                <x-inputs lable='Zip Code' type='text' name='distrct' holder='e:District'/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <x-inputs lable='State' type='text' name='state' holder='e:State'/>
            </div>
            <div class="col-md-6 col-sm-12">
                <x-inputs lable='Country' type='text' name='country' holder='e:Country'/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <x-inputs lable='Password' type='password' name='password' holder='enter valid password'/>
            </div>
            <div class="col-md-6 col-sm-12">
                <x-inputs lable='Confirm password' type='password' name='password_confirmation' holder='re-enter password'/>
            </div>
        </div>
        <div class="row" style="display: flex;justify-content:center">
            <button
            type="submit"
            name="button_submit"
            id="submit_button"
            class="btn btn-primary"
            style="background-color: rgb(58, 62, 124); border: none;width:inherit"
          >
          Sign Up
          </button>
        </div>
   </div>
</form>
@endsection