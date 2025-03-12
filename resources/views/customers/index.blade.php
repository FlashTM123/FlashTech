@extends('app')

@section('title', 'Customers List')

@section("content")
    <div class="container mx-auto p-6">
        <div class="flex flex-col h-full">
            <div class="grow">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
                    <h2 class="text-2xl font-semibold text-white-800 dark:text-dark-200">Customer List</h2>


                </div>
                <div class="my-3">
                    <div>
                        <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100">
                            <table class="table" >
                                <thead class="text-white-800 dark:text-dark-700">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Address</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $index => $customer)
                                    <tr class="hover:bg-base-200/50">
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td class="text-center">{{ $customer->name }}</td>
                                        <td class="text-center">{{ $customer->email }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse( $customer->date_of_birth)->format('d/m/Y')}}</td>
                                        <td class="text-center">{{ $customer->gender }}</td>
                                        <td class="text-center">{{ $customer->phone }}</td>
                                        <td class="text-center">{{$customer->address}}</td>


                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
