@extends('layouts.app')

@section('content')

    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>

                    @if(count($jobs))
                        @foreach ($jobs as $job)
                            <x-my-jobs :job="$job" />
                        @endforeach
                    @else
                        <p>No jobs found!</p>
                    @endif

                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8 ml-4 mr-4">{{ $jobs->links() }}</div>
    
@endsection