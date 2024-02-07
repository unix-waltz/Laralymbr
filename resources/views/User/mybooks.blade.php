@extends('User.main')

@section('content')

<div class="grid grid-cols-4 w-[90%] mx-auto mt-11 gap-3">
  @foreach ($user->borrowedBooks as $b )
  @if ($b->status == 'borrowed' &&  $b->book->status == 'borrowed')
    

        <a href="/product/book/detail/{{$b->book->title}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
              <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{asset('storage/'.$b->book->thumbnail)}}" alt="">
              <div class="flex flex-col justify-between p-4 leading-normal">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$b->book->title}}</h5>
                  <p class="mb-3 font-normal text-xs text-gray-700 dark:text-gray-400">{{$b->book->excerpt}}</p>
                 <div class="flex item-center">
                  <svg class="w-4 h-4 ms-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                      <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                  </svg>
                  <p class="ms-2 text-sm font-bold text-gray-900 dark:text-white">4.95</p>
                  <span class="px-2 pb-3">
                    <span class="inline-block bg-gray-200 rounded-full px-2 py-1 text-xs font-thin text-gray-700 mr-2 mb-2">#{{ $b->book->category->category_name}}</span>
                </span>
                 </div>
              </div>
              
          </a>
          @endif
  @endforeach
        
                                                         
        </div>
@endsection
