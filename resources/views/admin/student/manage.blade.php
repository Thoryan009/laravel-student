@extends('admin.master')

@section('body')
    <Section>


        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">



            <div class=" flex gap-8 px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Basic Table 1
                </h3>
                <div>
                    <form action="{{ route('students.index') }}" method="GET">

                        @csrf
                        <input type="text" placeholder="Search Student name" id="search" name="student_name">
                        <button type="submit">Submit</button>
                    </form>
                    {{-- <a class=" items-center gap-2 px-4 py-3 text-sm font-medium  transition rounded-lg  shadow-theme-xs bg-brand-500" href="{{route('students.index')}}">Clear</a> --}}
                </div>
            </div>
            <p class="text-center decoration-green-500 text-2xl">{{ session('message') }}</p>
            <div class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
                <!-- ====== Table Six Start -->
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="max-w-full overflow-x-auto custom-scrollbar">
                        @if (isset($students))
                            <table class="w-full ">
                                <thead>
                                    <tr class="border-b border-gray-100 dark:border-gray-800">
                                        <th class="px-5 py-3 text-left sm:px-6">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Serial
                                            </p>
                                        </th>
                                        <th class="px-5 py-3 text-left sm:px-6">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Student Name
                                            </p>
                                        </th>
                                        <th class="px-5 py-3 text-left sm:px-6">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Email
                                            </p>
                                        </th>
                                        <th class="px-5 py-3 text-left sm:px-6">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Phone Number
                                            </p>
                                        </th>
                                        <th class="px-5 py-3 text-left sm:px-6">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Date of Birth
                                            </p>
                                        </th>
                                        <th class="px-5 py-3 text-left sm:px-6">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                              Created At
                                            </p>
                                        </th>
                                        <th class="px-5 py-3 text-left sm:px-6">
                                            <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                                Action
                                            </p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="student-data">
                                    @foreach ($students as $key => $student)
                                        <tr class="border-b border-gray-100 dark:border-gray-800">
                                            <td class="px-5 py-4 sm:px-6" colspan="1">
                                                <span
                                                    class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                    {{ $students->firstItem() + $key }}
                                                </span>
                                            </td>
                                            <td class="px-5 py-4 sm:px-6 ">
                                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                    {{ $student->name }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-4 sm:px-6">
                                                <p
                                                    class="bg-success-50 text-theme-xs text-success-700 dark:bg-success-500/15 dark:text-success-500 inline-block rounded-full px-2 py-0.5 font-medium">
                                                    {{ $student->email }}
                                                </p>
                                            </td>
                                            <td class="px-5 py-4 sm:px-6">
                                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                    {{ $student->phone }}</p>
                                            </td>
                                            <td class="px-5 py-4 sm:px-6">
                                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                    {{ $student->date_of_birth }}</p>
                                            </td>
                                            <td class="px-5 py-4 sm:px-6">
                                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                                    {{ $student->created_at->diffForHumans() }}</p>
                                            </td>
                                            
                                            <td class="px-5 py-4 sm:px-6">
                                                <div class="text-center">
                                                    <button
                                                        class="inline-flex items-center gap-2 px-2 py-2 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600"><a
                                                            href="{{route('students.edit', ['student' => $student->id, 'page' => request('page')]) }}">Edit</a></button>
                                                    <form class="inline" action="{{ route('students.destroy', $student) }}"
                                                        method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Are you sure to delete this???')"
                                                            class="inline-flex items-center gap-2 px-2 py-2 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">Delete</button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach

                                 </tbody>
                            </table>
                            <div class="text-center my-4 flex gap-10 justify-center">
                                <a  class=" {{ !request('page') || request('page') == 1 ? ' bg-gray-400' : 'bg-brand-500 hover:bg-brand-600'}}  items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg  shadow-theme-xs"
                                 href="{{$students->previousPageUrl()}}" >Previous Page</a>
                                <span class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 hover:bg-brand-600"
                                   >Current Page: {{!request('page') ? '1' : request('page')}}</span>

                                <a class="{{request('page') == $students->lastPage() ? 'bg-gray-400' : 'bg-brand-500' }} inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg  shadow-theme-xs "
                                    href="{{ $students->nextPageUrl() }}">Next Page</a>
                            </div>
                        @else
                            <p class="text-center uppercase">no data to show</p>
                        @endif
                    </div>
                </div>
                <!-- ====== Table Six End -->
            </div>
        </div>
    </Section>
@endsection
