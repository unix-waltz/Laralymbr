@extends('Officer.main')
@section('content')
<div class="m-10 p-6 sm:p-10 space-y-6">
    <div class="flex flex-col space-y-6 md:space-y-0 md:flex-row justify-between">
        <div class="mr-6">
          <h1 class="text-4xl font-semibold mb-2">All Users</h1>
          <h2 class="text-gray-600 ml-0.5"></h2>
        </div>
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
    
      </div>

      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Officer Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Adress
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Opsion
                  </th>
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $of )
                <tr class="odd:bg-white  even:bg-gray-50 ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                       {{$of->fullname}}
                    </th>
                    <td class="px-6 py-4">
                      {{$of->address}}
                    </td>
                    <td class="px-6 py-4">
                      {{$of->email}}
                    </td>
                    <td class="px-6 py-4">
                      {{$of->username}}
                    </td>
                    <td class="px-6 py-4">
                      <a href="/officer/user/register/del/{{$of->id}}">
                       &nbsp; Delete User</a>
                  </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection