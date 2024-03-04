@extends('Officer.main')
@section('content')

    <section class="bg-white">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            @if ($errors->any())
            <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
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
        
            <h2 class="mb-4 text-xl font-bold text-gray-900 ">Update Profile</h2>
            <form action="/officer/dashboard/setting" method="post" enctype="multipart/form-data">
                @method('POST')
                @csrf
                <input type="hidden" name="oldphoto" value="{{Auth()->user()->profilephoto}}">
                <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Full Name</label>
                        <input type="text" name="fullname" value="{{Auth()->user()->fullname}}" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="Apple iMac 27&ldquo;" placeholder="Type product name" required="">
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 ">username</label>
                        <input type="text" name="username" value="{{Auth()->user()->username}}" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="Apple" placeholder="Product brand" required="">
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 ">email</label>
                        <input type="email" value="{{Auth()->user()->email}}" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " value="2999" placeholder="$299" required="">
                    </div>


                    <label class="block mb-2 text-sm font-medium text-gray-900 " for="file_input">Upload Profile Photo</label>
                    <input name='profilephoto' class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 " id="file_input" type="file">
                    

                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Address</label>
                        <textarea id="description" name='address' rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Write a product description here...">{{Auth()->user()->address}}</textarea>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
      </section>

@endsection