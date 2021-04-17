@extends('layouts.app')

@section('content')
    <?php
        use Illuminate\Pagination\LengthAwarePaginator;
        use App\Models\User;
        /** @var LengthAwarePaginator $users */
        /** @var User $user */
    ?>
    <table>
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Registered At</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @switch($user->auth)
                            @case(0) User @break
                            @case(1) Moderator @break
                            @case(9) Admin @break
                        @endswitch
                    </td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        <a href="{{ route('user.show', [$user]) }}">Edit</a>
                        <form action="{{ route('user.destroy', [$user]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        Showing {{ $users->firstItem() }}-{{ $users->lastItem() }} of {{ $users->total() }}
    </div>
    <div>
        <a href="{{ $users->previousPageUrl() }}">&lt;&lt;</a>
        {{ $users->currentPage() }}
        <a href="{{ $users->nextPageUrl() }}">&gt;&gt;</a>
    </div>
@endsection
