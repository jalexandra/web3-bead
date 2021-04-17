@extends('layouts.app')

@section('content')
    <?php
        use App\Models\User;
        /** @var User|null $user */
        $user = $user ?? null;
    ?>
    <div>
        <form action="{{ $user ? route('user.update', [$user]) : route('user.store') }}" method="post">
            @method($user ? 'PUT' : 'POST')
            @csrf

            @if($user)
                <input type="hidden" name="id" value="{{ $user?->id }}">
            @endif

            <x-forms.input codedName="username" label="Username" :defaultValue="$user?->username" :required="true"></x-forms.input>
            <x-forms.input codedName="email" label="Valid Email" :defaultValue="$user?->email" type="email" :required="true"></x-forms.input>

            @if(Auth::user()->id === $user?->id)
                <x-forms.input codedName="password" label="New Password" defaultValue="" type="password"></x-forms.input>
                <x-forms.input codedName="password_confirmation" label="New Password Confirmation" defaultValue="" type="password"></x-forms.input>
            @elseif(!$user)
                <x-forms.input codedName="password" label="New Password" defaultValue="" type="password"></x-forms.input>
                <x-forms.input codedName="password_confirmation" label="New Password Confirmation" defaultValue="" type="password"></x-forms.input>
            @endif

            @if($user)
            <x-forms.input codedName="current_password" label="Current Password" defaultValue="" type="password" :required="true"></x-forms.input>
            @endif

            @error('_')
                {{ $message }}
            @enderror

            <input type="submit" value="Save">
        </form>
    </div>
@endsection
