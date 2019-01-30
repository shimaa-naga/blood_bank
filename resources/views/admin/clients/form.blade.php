

<form method="POST" action="{{ route('register') }}">
    @csrf
 
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Client Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

        <div class="col-md-6">
            <input id="email" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

            @if ($errors->has('phone'))
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('phone') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

        <div class="col-md-6">
            <input id="email" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required>

            @if ($errors->has('dob'))
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('dob') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Donation Last Date') }}</label>

        <div class="col-md-6">
            <input id="email" type="date" class="form-control{{ $errors->has('donation_last_date') ? ' is-invalid' : '' }}" name="donation_last_date" value="{{ old('donation_last_date') }}" required>

            @if ($errors->has('donation_last_date'))
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('donation_last_date') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Blood Type :') }}</label>

        <div class="col-md-6">

            <select  id="name" class="form-control{{ $errors->has('blood_type') ? ' is-invalid' : '' }}" name="blood_type"  required>
                <option {{old('blood_type','blood_type')=="A+"? 'selected':''}}  value="A+">A+</option>
                <option {{old('blood_type','blood_type')=="A-"? 'selected':''}}  value="A-">A-</option>
                <option {{old('blood_type','blood_type')=="B+"? 'selected':''}}  value="B+">B+</option>
                <option {{old('blood_type','blood_type')=="B-"? 'selected':''}}  value="B-">B-</option>
                <option {{old('blood_type','blood_type')=="O+"? 'selected':''}}  value="O+">O+</option>
                <option {{old('blood_type','blood_type')=="O-"? 'selected':''}}  value="O-">O-</option>
                <option {{old('blood_type','blood_type')=="AB+"? 'selected':''}}  value="AB+">AB+</option>
                <option {{old('blood_type','blood_type')=="AB-"? 'selected':''}}  value="AB-">AB-</option>

            </select>
            @if ($errors->has('blood_type'))
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('blood_type') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('City :') }}</label>

        <div class="col-md-6">

            <select  id="name" class="form-control{{ $errors->has('city_id') ? ' is-invalid' : '' }}" name="city_id"  required>
                <option {{old('city_id','city_id')=="1"? 'selected':''}}  value="1">����</option>
                <option {{old('city_id','city_id')=="2"? 'selected':''}}  value="2">��������</option>
                <option {{old('city_id','city_id')=="3"? 'selected':''}}  value="3">�����</option>
                <option {{old('city_id','city_id')=="4"? 'selected':''}}  value="4">����</option>
                <option {{old('city_id','city_id')=="5"? 'selected':''}}  value="5">���� ����</option>

            </select>
            @if ($errors->has('city_id'))
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('city_id') }}</strong>
                </span>
            @endif
        </div>
    </div>



    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="submit">

                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>