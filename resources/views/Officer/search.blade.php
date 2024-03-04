@extends('Officer.main')
@section('content')
{{-- @dd($results,$search) --}}
<main class="p-6 sm:p-10 space-y-6">
     Results for :    {{$search}}

      <section class="">
        <div class="grid grid-cols-4 mt-11 gap-3">
    @foreach ($results as $b)
      
    
          <a href="/officer/book/detail/{{$b->id}}" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 ">
              <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="{{ asset('storage/' . $b->thumbnail) }}" alt="">
              <div class="flex flex-col justify-between p-4 leading-normal">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{$b->title}}</h5>
                  <p class="mb-3 font-normal text-sm text-gray-700 ">{{$b->excerpt}}</p>
              </div>
          </a>
          @endforeach
                                                            
        </div>
      </section>
      @if ($results->count() < 1)
          No Data Records For {{$search}}
      @endif
  </main>
@endsection