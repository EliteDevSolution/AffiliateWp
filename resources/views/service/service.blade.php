@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('service_assests/css/service.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="service-container container-fluid">
    <h4 class="page-title mb-3">Base Url:
        {{ count($toSendData['affliate'])>0 ? $toSendData['affliate'][0]['base_url'] : ""}}</h4>

    <div class="table-responsive">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th>Rate</th>
                    <th>Rate Type</th>
                    <th>Earning</th>
                    <th>Unpaid earning</th>
                    <th>Referrals</th>
                    <th>Visitors</th>
                </tr>
            </thead>

            <tbody>
                @foreach ( $toSendData['affliate'] as $affliateIndex => $affliateValue )
                    <tr>
                        <th scope="row">{{$affliateValue['rate']}}</th>
                        <td>{{$affliateValue['rate']}}</td>
                        <td>{{$affliateValue['rate_type']}}</td>
                        <td>{{$affliateValue['earnings']}}</td>
                        <td>{{$affliateValue['unpaid_earnings']}}</td>
                        <td>{{$affliateValue['visits']}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@endsection
