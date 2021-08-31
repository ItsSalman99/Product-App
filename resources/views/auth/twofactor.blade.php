<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-2">
            <h1 class="text-2xl">Two Factor Authentication</h1>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('You are signed in! Please enter your verification code we have sent you to your email.') }}
        </div>

        @if(session()->has('message'))
            <p class="bg-red-500 p-2 rounded">
                {{ session()->get('message') }}
            </p>
        @endif

        <div>

            <form action="{{ route('verify.store') }}" method="POST">
                @csrf

                @if($errors->has('two_factor_code'))
                    <div class="text-red-700 my-2">
                        {{ $errors->first('two_factor_code') }}
                    </div>
                @endif


                <input type="text" name="two_factor_code" placeholder="Verification Code" class="w-full p-2 ring ring-blue-400 rounded">

                <div class="flex my-2">
                    <div class="mr-2">
                        <x-button>
                            {{__('Verify')}}
                        </x-button>
                    </div>
                    <div>
                        <a href="{{ route('verify.resend') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Resend Email
                        </a>
                    </div>
                </div>

            </form>

        </div>
        
    </x-auth-card>
</x-guest-layout>