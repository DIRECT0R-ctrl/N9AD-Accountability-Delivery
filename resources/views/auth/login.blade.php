<x-guest-layout>

<div class="space-y-6">

    <!-- Title -->
    <div class="text-center">
        <h1 class="text-2xl tracking-widest text-[#C9A646] font-semibold">
            N9AD ACCESS
        </h1>

        <p class="text-gray-500 text-xs mt-1 tracking-wide">
            Accountability & Delivery System
        </p>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <label class="text-xs text-gray-500 tracking-widest">
                EMAIL
            </label>

            <x-text-input
                id="email"
                class="mt-2 block w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
            />
        </div>

        <!-- Password -->
        <div>
            <label class="text-xs text-gray-500 tracking-widest">
                PASSWORD
            </label>

            <x-text-input
                id="password"
                class="mt-2 block w-full"
                type="password"
                name="password"
                required
            />
        </div>

        <!-- Remember -->
        <div class="flex items-center justify-between text-xs">

            <label class="flex items-center space-x-2 text-gray-500">
                <input type="checkbox"
                       name="remember"
                       class="bg-black border-[#C9A646]/30 text-[#C9A646]">
                <span>Remember</span>
            </label>

            <a href="{{ route('password.request') }}"
               class="text-gray-500 hover:text-[#C9A646]">
                Forgot?
            </a>

        </div>

        <!-- Button -->
        <div class="pt-2">
            <x-primary-button class="w-full justify-center">
                LOGIN
            </x-primary-button>
        </div>

    </form>

</div>

</x-guest-layout>