@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('sales/css/affiliate.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="affiliate-url-wrapper">
        <div class="container-fluid mt-lg-2 mb-2">
            <h4 class="page-title mb-3 statistic-title">Statistic</h4>
            <div class="row justify-content-center">
                <div class="card-box col-8">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-centered m-0">
                            <thead>
                                <tr>
                                    <th>Unpaid Referrals</th>
                                    <th>Paid Referrals</th>
                                    <th>Visits</th>
                                    <th>Conversation Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$affStats['unpaid_referrals']}}</td>
                                    <td>{{$affStats['paid_referrals']}}</td>
                                    <td>{{$affStats['visits']}}</td>
                                    <td>{{$affStats['conversion_rate']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-box col-8 mt-3">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-centered m-0">
                            <thead>
                                <tr>
                                    <th>Unpaid Earnings</th>
                                    <th>Paid Earnings</th>
                                    <th>Commission Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$affStats['unpaid_earnings']}}</td>
                                    <td>{{$affStats['paid_earnings']}}</td>
                                    <td>{{$affStats['commission_rate']}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-box col-8 mt-3">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-centered m-0">
                            <thead>
                                <tr>
                                    <th>Campaign</th>
                                    <th>Visits</th>
                                    <th>Unique Links</th>
                                    <th>Converted</th>
                                    <th>Conversation Rate</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
