<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Laravel 8 CRUD </h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-success" href="{{ route('members.create') }}"> Create New Member</a>
                                </div>
                            </div>
                        </div>
                       
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                       
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>User ID</th>
                                <th>Status</th>
                                <th>Position</th>
                                <th width="280px">DateTime</th>
                            </tr>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                            @endforeach
                        </table>
                      
                        {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
