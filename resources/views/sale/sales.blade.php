@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('sales/css/sale.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="sale-wrapper">
        <div class="container-fluid mb-2">
            <h4 class="page-title mt-2">Last 30 days</h4>
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 mdi mdi-diamond"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-17">Referrals</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">{{$toSendData['lastRefferalCount']}}</h2>
                                                <div class="pl-2">
                                                    <i class="font-18 text-info dripicons-arrow-thin-down refferal-card-icon">
                                                        {{-$toSendData['rateOfRefferal']}}
                                                    </i>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 icon-user-follow"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-17">Vistors</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">{{$toSendData['lastVisitorCount']}}</h2>
                                                <div class="pl-2">
                                                    <i class="font-18 text-info dripicons-arrow-thin-down refferal-card-icon">
                                                        {{-$toSendData['rateOfVisotor']}}
                                                    </i>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 icon-graduation"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-15" style="width: max-content">Conversation Rate</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">{{$toSendData['lastConversationRate']}}%</h2>
                                                <div class="pl-2">
                                                    <i class="font-18 text-info dripicons-arrow-thin-up refferal-card-icon">11</i>
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="page-title mt-3">All-time</h4>
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 mdi mdi-diamond"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-17">Referrals</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">
                                                    {{$toSendData['totalRefferal']}}
                                                </h2>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 icon-user-follow"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-17">Vistors</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">
                                                    {{$toSendData['totalVisitor']}}
                                                </h2>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 icon-graduation"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-15" style="width: max-content">Conversation Rate</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">
                                                    {{$toSendData['totalConversationRate']}}%
                                                </h2>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 mdi mdi-diamond"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-15" style="width: max-content">Unpaid refferals</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">
                                                    {{$toSendData['totalUnpaidRefferal']}}
                                                </h2>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 mdi mdi-diamond"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-15" style="width: max-content">Paid Refferals</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">
                                                    {{$toSendData['paidRefferal']}}
                                                </h2>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 mdi mdi-diamond"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-15" style="width: max-content">Unpaid Earnings</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">
                                                    {{$toSendData['totalUnpaidEarning']}}
                                                </h2>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="refferal-card-wrapper col-3">
                                    <i class="font-24 mdi mdi-diamond"></i>
                                    <div class="refferal-card-content">
                                        <span class="font-15" style="width: max-content">Total Earnings</span>
                                        <div class="refferal-card-righter">
                                            <p class="refferal-card-footer">
                                                <h2 class="text-bold font-weight-bold">
                                                    {{$toSendData['totalEarning']}}
                                                </h2>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="page-title mt-3">Recent referral activity</h4>
            <div class="card-box">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover table-centered m-0">
                        <thead>
                            <tr>
                                <th>REFFERAL</th>
                                <th>AMOUNT</th>
                                <th>DESCRIPTION</th>
                                <th>STATUS</th>
                                <th>DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $toSendData['refferals'] as $index => $value)
                                <tr>
                                    <td>{{$value['reference']}}</td>
                                    <td>{{$value['amount']}}</td>
                                    <td>{{$value['description']}}</td>
                                    <td>{{$value['status']}}</td>
                                    <td>{{ \Carbon\Carbon::parse($value['date'])->format('F j, Y g:i a') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
