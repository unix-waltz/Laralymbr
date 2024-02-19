@extends('Admin.main')
@section('content')

@foreach ($data->reverse() as $d )
<div class="max-w-4xl p-6 m-8 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z" />
      </svg>
      
    <a href="#">
        <h5 class="mb-1 mt-1 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$d->subject}}</h5>
    </a> 
     <span class="inline-flex font-medium items-center  hover:underline">
        {{$d->name}}
    </span><br>
     <a href="#" class="inline-flex font-medium text-sm items-center text-blue-600 hover:underline">
        {{$d->email}}
        <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
        </svg> &nbsp; &nbsp; &nbsp;
    </a>
    @if ($d->status == 'report')
            <span class="my-1 inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
              <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
              User Report
          </span>
          @else
          <span class="my-1 inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
            <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
            User Feed-Back
        </span>
            @endif
    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">{{$d->message}}</p>
   
</div>

@endforeach
@endsection