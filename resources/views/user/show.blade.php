@extends('layouts.app')

@section('content')
    <?php
        use App\Models\User;
        /** @var User $user */
    ?>
    <div>
        <table>
            <tbody>
                <tr>
                    <td>ID: </td>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>XP: </td>
                    <td>{{ $user->xp }}</td>
                </tr>
                <tr>
                    <td>Rank: </td>
                    <td>{{ $user->rank }}</td>
                </tr>
                <tr>
                    <td>Questions: </td>
                    <td><a href="#">{{ $user->questions()->count() }}</a></td>
                    {{-- TODO: Add route to user questions --}}
                </tr>
                <tr>
                    <td>Answers: </td>
                    <td><a href="#">{{ $user->answers()->count() }}</a></td>
                    {{-- TODO: Add route to user answers --}}
                </tr>
            </tbody>
        </table>
        @if(Auth::user()->isAdmin || Auth::user()->id === $user->id)
            <a href="{{ route('user.edit', [$user]) }}">Edit Profile</a>
        @endif
    </div>
@endsection
