@extends('layout.app')
@section('content')
<h2 class="text-primary">Employee Form</h2>
<div class="card">
    <div class="card-body">
        <form action="{{url('/employee/store')}}" method="post">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label">Name : </label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?: '' }}"  oninput="validateName(this);" placeholder="Enter a name">
                      <span id="nameError"></span>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email : </label>
                <div class="col-md-9">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter a Email" value="{{ old('email') ?: '' }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                    <div class="col-md-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" name="male" value="male" @if(old('gender')==='male' ) checked @endif required>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" name="female" value="female" @if(old('gender')==='female' ) checked @endif required>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="others" name="others" value="others" @if(old('gender')==='others' ) checked @endif required>
                            <label class="form-check-label" for="others">
                                Others
                            </label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address : </label>
                <div class="col-md-9">
                    <textarea name="address" id="address" cols="30" rows="5" class="form-control  @error('address') is-invalid @enderror">{{ old('address') ?: '' }}</textarea>
                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="dob" class="col-md-2 col-form-label">DOB: </label>
                <div class="col-md-9">
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{ old('dob') ?: '' }}">
                    <span class="error" id="errorDate"></span>
                    @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="age" class="col-sm-2 col-form-label">Age : </label>
                <div class="col-md-9">
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age') ?: '' }}" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="salary" class="col-md-2 col-form-label">salary : </label>
                <div class="col-md-9">
                    <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ old('salary') ?: '' }}">
                    @error('salary')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">submit</button>
                    <a href="{{url('/employee')}}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection