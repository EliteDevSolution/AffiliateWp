@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('sales/css/affiliate.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="affiliate-url-wrapper">
        <div class="container-fluid mt-lg-2 mb-2">
            <h4 class="page-title mb-3 statistic-title">Refferal & Visitors</h4>
            <div class="row justify-content-center">
                <div class="card-box col-8">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-centered m-0">
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Amount</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($referrals as $index => $value)
                                    <tr>
                                        <td>{{$value['reference']}}</td>
                                        <td>{{$value['amount']}}</td>
                                        <td>{{$value['description']}}</td>
                                        <td>{{$value['status']}}</td>
                                        <td>{{$value['date']}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-box col-8 mt-3">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-centered m-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Campaigin</th>
                                    <th>Url</th>
                                    <th>Referrer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitors as $index => $value)
                                    <tr>
                                        <td>{{$value['date']}}</td>
                                        <td>{{$value['campaign']}}</td>
                                        <td>{{$value['url']}}</td>
                                        <td>{{$value['referrer']}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
