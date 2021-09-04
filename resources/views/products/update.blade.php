<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Products') }}
        </h2>
    </x-slot>

    <div class="w-4/5 mx-auto my-12 bg-white rounded p-2">
        @if (session()->has('message'))
            <div class="bg-green-400 p-4 rounded">
                <p class="text-white text-lg font-semibold">
                    {{session()->get('message')}}
                </p>
            </div>
        @endif
        <div class="p-5">
            <x-auth-validation-errors  :errors="$errors" />
            <h1 class="text-2xl font-semibold my-2">Enter Product Details</h1>
            <form action="{{ route('admin.updateProduct',[$product->id]) }}" method="POST">
                @csrf
    
                <input type="text" name="name" placeholder="Product name" class="border rounded focus:ring-1 w-full my-2" value="{{$product->name}}">
                <textarea name="description" placeholder="Product description" class="border rounded focus:ring-1 w-full my-2">{{$product->description}}</textarea>
                <input type="number" name="price" class="border rounded focus:ring-1 w-full my-2" min="1" value="{{$product->price}}">

                <x-button>
                    {{__('Update')}}
                </x-button>

            </form>    
        </div>
    </div>

</x-app-layout>