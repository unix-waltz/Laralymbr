@extends('Admin.main')
@section('content')
<section class="bg-gray-50 ">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            @if ($errors->any())
            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 " role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Failed !</span>
                <div>
                  <span class="font-medium">Failed !Make sure you input Falid data:</span>
                    <ul class="mt-1.5 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach    
                    </ul>
                </div>
            </div>
@endif
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
               Edit your Category
                </h1>
                <form class="space-y-4 md:space-y-6" action="/admin/category/update/" method="post">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">New Category</label>
                        <input type="text" name="category_name" id="password" value="{{$data->category_name}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required="">
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                </form>
            </div>
        </div>
    </div>
  </section>
@endsection