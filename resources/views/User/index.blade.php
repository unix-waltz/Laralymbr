@extends('User.main')
@section('content')
      {{-- cards --}}
      <div class="w-[85%] mt-10 mx-auto" >


<div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-64 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{asset('assets/img/main-banner.png')}}" class="absolute h-full block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://source.unsplash.com/bAQH53VquTc" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://source.unsplash.com/McX3XuJRsUM" class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://source.unsplash.com/Oaqk7qqNh_c" class="absolute h-full block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 5 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://source.unsplash.com/eWpBNXRHfTI" class="absolute h-full block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="sm:w-3 w-2 h-1 sm:h-3  rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="sm:w-3 w-2 h-1 sm:h-3  rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="sm:w-3 w-2 h-1 sm:h-3  rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="sm:w-3 w-2 h-1 sm:h-3  rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="sm:w-3 w-2 h-1 sm:h-3  rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>

</div>


      </div>
      <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 w-[85%] mx-auto mt-11 gap-3 ">
@foreach ($books as $b )

      <a href="/product/book/detail/{{$b->title}}" class=" flex flex-col items-center bg-white border overflow-hidden border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 ">
            <img class=" object-cover w-full rounded-t-lg  md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{asset('storage/'.$b->thumbnail)}}" alt="">
            <div class="flex flex-col  justify-between p-4 leading-normal">
                <h5 class="mb-2 sm:text-2xl text-base font-bold tracking-tight text-gray-900">{{$b->title}}</h5>
                <p class="mb-3 font-normal hidden sm:block text-xs text-gray-700  ">{{$b->excerpt}}</p>
               <div class="flex item-center">
                
                <svg class="w-4 h-4 ms-1 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                </svg>
                <p class="ms-2 sm:text-sm text-xs font-bold text-gray-900">{{number_format($b->comments->avg('rating'),1)}}</p>
    <span class="w-1 h-1 mx-1.5 bg-gray-500 rounded-full "></span>
    <p class="text-xs sm:text-sm font-medium text-gray-900 underline hover:no-underline"> {{$b->comments->count()}} reviews</p>

               </div>
            </div>
            
        </a>
@endforeach
      </div>
    @endsection