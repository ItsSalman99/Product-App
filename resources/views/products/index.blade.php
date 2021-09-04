<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
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
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Description
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Price
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Created
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Update</span>
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($products as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <h1>{{$item->name}}</h1>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <h1>{{$item->description}}</h1>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <h1>{{$item->price}}</h1>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm">{{date("F j, Y, g:i a", strtotime($item->created_at))}}</span>
                            </td>
                            @if (auth()->user()->is_admin)
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.showProduct',$item->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Update
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form action="{{ route('admin.deleteProduct', $item->id) }}" method="post">
                                    @csrf
                                    <x-button>
                                        {{__('Delete')}}
                                    </x-button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
  
    </div>
    

</x-app-layout>