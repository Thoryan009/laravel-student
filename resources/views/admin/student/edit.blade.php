@extends('admin.master')

@section('body')

<section class="mx-4">
    <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="px-5 py-4 sm:px-6 sm:py-5">
            <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
              Add Edit Info
            </h3>
            
        </div>
        
        <form action="{{route('students.update', $student)}}" method="post">
            @method('put')
            @csrf
            <div class="space-y-6 border-t border-gray-100 p-5 sm:p-6 dark:border-gray-800">
                <!-- Elements -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Name
                    </label>
                    <input type="text"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" name="name" value="{{$student->name}}"/>
                </div>
    
              
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Email
                    </label>
                    <input type="email"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" name="email" value="{{$student->email}}"/>
                </div>
    
              
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Phone
                    </label>
                    <input type="text"
                        class="dark:bg-dark-900 shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full rounded-lg border border-gray-300 bg-transparent px-4 py-2.5 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" name="number"
                        value="{{$student->phone}}"/>
                </div>
    
            
                <input type="hidden" name="page" value="{{request('page')}}">
                <!-- Elementsgggg -->
                <div>
                    <label class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-400">
                        Date Picker Input
                    </label>
                    <div class="relative">
                        <input type="date" placeholder="Select date"
                            class="dark:bg-dark-900 datepickerTwo shadow-theme-xs focus:border-brand-300 focus:ring-brand-500/10 dark:focus:border-brand-800 h-11 w-full appearance-none rounded-lg border border-gray-300 bg-transparent bg-none px-4 py-2.5 pr-11 pl-4 text-sm text-gray-800 placeholder:text-gray-400 focus:ring-3 focus:outline-hidden dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30" name="date_of_birth"
                            value="{{ old('date_of_birth', \Carbon\Carbon::parse($student->date_of_birth)->format('Y-m-d')) }}"/>
                       
                    </div>
                </div>

                <div class="text-center">
                    <button class="inline-flex items-center gap-2 px-4 py-3 text-2xl font-medium text-white transition rounded-lg bg-brand-500 shadow-theme-xs hover:bg-brand-600">Submit</button>
                </div>
              
            </div>
        </form>
    </div>
</section>
  

@endsection
