@extends('app')

@section('title', 'Product List')

@section("content")
    <div class="container mx-auto p-6">
        <div class="flex flex-col h-full">
            <div class="grow">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                    <h2 class="text-2xl font-semibold text-white-800 dark:text-dark-200">Product List</h2>


                </div>
                <div class="my-3">
                    <div>
                        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                            <table class="table" >
                                <thead class="text-white-800 dark:text-dark-700">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Type</th>
                                    <th class="text-center"></th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
