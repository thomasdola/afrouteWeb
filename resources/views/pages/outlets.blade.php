@extends('master')


@section('content')

        <div class="bg-holder" style="background: #ed8323;">
            {{-- <div class="bg-mask"></div> --}}
            <div class="bg-holder-content">
                <div class="container">
                    <div class="gap gap-big text-white">
                        <div class="row">
                            <div class="col-md-10">
                                <h2>Our CashCard Vending Points</h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="gap"></div>
            <h2></h2>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <table class="table text-center table-hover table-bordered">
                        {{-- <caption><h2>List of Voucher Outlets</h2></caption> --}}
                        <thead>
                            <tr>
                                <th class="text-center">Name</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Operator</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($outlets as $o)
                                <tr>
                                    <td>{{ $o -> name }}</td>
                                    <td>{{ $o -> location }}</td>
                                    <td>{{ $o -> type }}</td>
                                    <td>{{ $o -> operator }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection