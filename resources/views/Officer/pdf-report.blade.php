<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Officer Dashboard</title>
  @vite('resources/css/app.css')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css"  rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

<div class="w-[90%] mx-auto mt-10">


    <h1 class="mb-4 text-sm font-bold leading-none tracking-tight text-gray-900  dark:text-white"> <span class="underline underline-offset-1 decoration-8 decoration-blue-400 dark:decoration-blue-600">  {{ now()->format('Y-m-d') }}</span></h1>
    
    
    <h1 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white"><mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500 ">{{$by}}</mark> &nbsp;PDF Report.</h1>
    <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">This report includes: Book data, officers, users.</p>
    
    </div>
    
    <div class="relative overflow-x-auto w-[90%] mx-auto pt-5">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                  <th scope="col" class="px-6 py-3">
                      OPtion
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Quantity
                  </th>
                  <th scope="col" class="px-6 py-3">
                      Status
                  </th>
              </tr>
          </thead>
          <tbody>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Total Book
                  </th>
                  <td class="px-6 py-4">
                    {{$book}}
                  </td>
                  <td class="px-6 py-4">
                      OK
                  </td>
              
              </tr>
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Total Category
                  </th>
                  <td class="px-6 py-4">
                      {{$category}}
                  </td>
                  <td class="px-6 py-4">
                     OK
                  </td>
                
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Total User
                  </th>
                  <td class="px-6 py-4">
                     {{$user}}
                  </td>
                  <td class="px-6 py-4">
                     OK
                  </td>
             
              </tr>
              <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  Books Can Borrowed
                </th>
                <td class="px-6 py-4">
                   {{$totalBorrowedBooks}}
                </td>
                <td class="px-6 py-4">
                   OK
                </td>
           
            </tr>

            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   Books in Borrowed
                </th>
                <td class="px-6 py-4">
                   {{$totalQueuedBooks}}
                </td>
                <td class="px-6 py-4">
                   OK
                </td>
           
            </tr>
                </tbody>
      </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</div>
</body>
</html>    