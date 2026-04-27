@extends('layouts.app-new')

@section('content')

<section class="py-12" x-data="{ showAddModal: false }">
<div class="max-w-7xl mx-auto px-6">

<!-- Header -->
<div class="flex items-center justify-between mb-8 fade-in mt-8">
    <div>
        <h1 class="text-4xl font-bold">
            Identity <span class="gradient-text">Registry</span>
        </h1>

        <p class="text-gray-400">
            System governance & access control
        </p>
    </div>

    <button @click="showAddModal = true" class="btn-primary">
        <i class="fas fa-user-plus mr-2"></i> New User
    </button>
</div>


<!-- Users Card -->
<div class="glass rounded-2xl p-6 card-hover">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-white">
            All Operators
        </h2>

        <span class="text-gray-400 text-sm">
            {{ count($users) }} users
        </span>
    </div>


    <div class="space-y-4">

    @foreach($users as $user)

    <div class="flex items-center justify-between
                p-4
                bg-gray-800/40
                rounded-xl
                border border-gray-700
                hover:border-indigo-500/40
                transition-all">

        <!-- LEFT -->
        <div class="flex items-center space-x-4">

            <div class="w-10 h-10
                        bg-indigo-500/20
                        rounded-lg
                        flex items-center justify-center
                        text-indigo-400
                        font-bold">

                {{ substr($user->name,0,1) }}
            </div>

            <div>
                <h4 class="text-white font-medium">
                    {{ $user->name }}
                </h4>

                <p class="text-gray-400 text-sm">
                    {{ $user->email }}
                </p>
            </div>

        </div>


        <!-- RIGHT -->
        <div class="flex items-center space-x-4">

            <!-- ROLE -->
            <span class="
                px-3 py-1
                text-xs
                rounded-full
                bg-indigo-500/20
                text-indigo-400
            ">
                {{ $user->role->name }}
            </span>


            <!-- UPDATE ROLE -->
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PATCH')

                <select name="role_id"
                    onchange="this.form.submit()"
                    class="bg-gray-900 border border-gray-700
                           rounded-lg
                           text-gray-400
                           text-sm
                           p-2">

                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"
                        {{ $user->role_id == $role->id ? 'selected' : '' }}>
                            {{ ucfirst($role->name) }}
                        </option>
                    @endforeach

                </select>
            </form>


            <!-- DELETE -->
            <form action="{{ route('admin.users.destroy',$user) }}"
                  method="POST"
                  onsubmit="return confirm('Delete user ?')">

                @csrf
                @method('DELETE')

                <button class="text-gray-400 hover:text-red-500 transition">
                    <i class="fas fa-trash"></i>
                </button>

            </form>

        </div>

    </div>

    @endforeach

    </div>

</div>

</div>
<!-- MODAL D'AJOUT -->
<div x-show="showAddModal" 
     class="fixed inset-0 z-50 flex items-center justify-center bg-black/80 backdrop-blur-sm p-4"
     x-transition>
    
    <div @click.away="showAddModal = false" class="glass w-full max-w-lg rounded-[2rem] p-10 border border-gray-800 shadow-2xl">
        <h2 class="text-2xl font-bold text-white mb-6">Provision New <span class="gradient-text">Operator</span></h2>
        
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="text-xs text-gray-500 uppercase mono mb-2 block">Full Name</label>
                <input type="text" name="name" required class="w-full bg-gray-900 border border-gray-700 rounded-xl p-3 text-white outline-none focus:border-indigo-500">
            </div>
            
            <div>
                <label class="text-xs text-gray-500 uppercase mono mb-2 block">Email Address</label>
                <input type="email" name="email" required class="w-full bg-gray-900 border border-gray-700 rounded-xl p-3 text-white outline-none focus:border-indigo-500">
            </div>

            <div>
                <label class="text-xs text-gray-500 uppercase mono mb-2 block">Initial Password</label>
                <input type="password" name="password" required class="w-full bg-gray-900 border border-gray-700 rounded-xl p-3 text-white outline-none focus:border-indigo-500">
            </div>

            <div>
                <label class="text-xs text-gray-500 uppercase mono mb-2 block">Assigned Role</label>
                <select name="role_id" class="w-full bg-gray-900 border border-gray-700 rounded-xl p-3 text-white outline-none focus:border-indigo-500">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-3 pt-6">
                <button type="button" @click="showAddModal = false" class="flex-1 py-3 text-gray-400 hover:text-white transition font-bold uppercase text-xs">Cancel</button>
                <button type="submit" class="flex-1 btn-primary text-xs uppercase font-bold">Execute</button>
            </div>
        </form>
    </div>
</div>
</section>


@endsection
