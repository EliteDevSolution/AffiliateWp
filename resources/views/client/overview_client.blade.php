@extends('layouts.admin')
@section('styles')
@endsection

@section('content')
    <div class="table-responsive mt-lg-5 pt-lg-4 pl-5 pr-5">
        <table class="table table-dark mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $clientIndex => $clientValue )
                    <tr>
                        <th scope="row">{{$clientValue['id']}}</th>
                        <td>{{$clientValue['name']}}</td>
                        <td>{{$clientValue['email']}}</td>
                        <td>{{$clientValue['phone_number']}}</td>
                        <td>{{ \Carbon\Carbon::parse($clientValue['created_at'])->format('Y-m-d, H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    @parent
    @parent
    <script>
    </script>
@endsection
