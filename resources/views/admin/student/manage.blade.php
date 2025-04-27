@extends('admin.master')

@section('body')
    <Section>


        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">



            <div class=" flex gap-8 px-5 py-4 sm:px-6 sm:py-5">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Basic Table 1
                </h3>
                <div>
                    <form action="{{route('student.search')}}" method="post">

                        @csrf
                        <input type="text" placeholder="Search Student name" name="student_name">
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <p class="text-center text-green-500 text-2xl">{{session('message')}}</p>
            <div class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
                <!-- ====== Table Six Start -->
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="max-w-full overflow-x-auto custom-scrollbar">
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
                                            Action
                                        </p>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($student))
                                @foreach ($student as $student )
                                
                                    
                              
                                <tr class="border-b border-gray-100 dark:border-gray-800">
                                    <td class="px-5 py-4 sm:px-6" colspan="1">
                                        <span
                                        class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                        {{$loop->iteration}}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                            {{$student->name}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <p
                                            class="bg-success-50 text-theme-xs text-success-700 dark:bg-success-500/15 dark:text-success-500 inline-block rounded-full px-2 py-0.5 font-medium">
                                            {{$student->email}}
                                        </p>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400"> {{$student->phone}}</p>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <p class="text-gray-500 text-theme-sm dark:text-gray-400"> {{$student->date_of_birth}}</p>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <div class="text-center">
                                            <button class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600"><a href="{{route('students.edit', $student)}}">Edit</a></button>
                                            <form class="inline" action="{{route('students.destroy', $student)}}" method="post">
                                                @method('delete')
                                            @csrf
                                            <button type="submit" onclick="return confirm('Are you sure to delete this???')" class="inline-flex items-center gap-2 px-4 py-3 text-sm font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">Delete</button>
                                           </form>
                                        </div>
                                    </td>
                                    
                                </tr>
                              


@endforeach
@endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ====== Table Six End -->
            </div>
        </div>





    </Section>
@endsection
