@php
    $time = date('H');
    $timezone = date('e');
    $greetings = '';
    if ($time < '12') {
        $greetings = 'Good morning';
    } elseif ($time >= '12' && $time < '17') {
        $greetings = 'Good afternoon';
    } elseif ($time >= '17' && $time < '19') {
        $greetings = 'Good evening';
    } elseif ($time >= '19') {
        $greetings = 'Good night';
    }
    $user = Auth::guard('admin')->user();
@endphp
@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <section class="section">
        <div class="row">
            <h4 class="col-md-12 text-center">Welcome To Muslim Bie</h4>
            <h6 class="col-12 mt-4">
                {{ $greetings }} {{ Auth::user()->name }}, Here is some things you can do.
            </h6>
            <div class="col-12">
                <div class="card shadow-sm mt-1">
                    <span class="flex px-3 py-2">
                        <i class="fa fa-pen mr-2"></i>
                        @if ($biodataCount)
                            {{ $biodataCount }} Biodata has been posted into MuslimBie.
                        @else
                            Didn't create new biodata yet? <a href="{{ route('admin.biodata.create') }}"
                                class="fw-bold">Create Now</a>
                        @endif
                    </span>
                </div>
            </div>
        </div>
        @if ($user->can('biodata-pending'))
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pending Biodata</h4>
                            <div class="card-header-form">
                                <a href="{{ route('admin.biodata.pending') }}" class="btn btn-sm btn-primary">View All</a>
                            </div>
                        </div>
                        <div class="card-body px-2">
                            <div class="table-responsive mx-4">
                                <table class="table table-striped">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Fathers Name</th>
                                        <th>Mothers Name</th>
                                        <th>Date of Birth</th>
                                        <th>Action</th>
                                    </tr>
                                    @if (count($pendingBiodata) > 0)
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($pendingBiodata as $pending)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>
                                                    @if ($pending->general()->bride_groom == 'groom')
                                                        {{ $pending->contact()->groom_name }}
                                                    @else
                                                        {{ $pending->contact()->bride_name }}
                                                    @endif
                                                </td>
                                                <td>{{ $pending->family()->fathers_name }}</td>
                                                <td>{{ $pending->family()->mothers_name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($pending->general()->birthdate)->format('d M Y') }}
                                                </td>
                                                <td><a href="{{ route('admin.biodata.edit_status', $pending->id) }}"
                                                        class="btn btn-sm btn-primary">Update Status</a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">No Pending Biodata!</td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <div class="card shadow-sm mt-1">
                    <div class="card-header">
                        <h4>Visitor Analysis</h4>
                    </div>
                    <canvas id="analyticsChart"></canvas>
                </div>
            </div>
            <div class="col-6">
                <div class="card shadow-sm mt-1">
                    <div class="card-header">
                        <h4>Monthwise Biodata Chart</h4>
                    </div>
                    <canvas id="biodataChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Biodata Analysis</h4>
                        {{-- <div class="card-header-action">
              <div class="dropdown">
                <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Options</a>
                <div class="dropdown-menu">
                  <a href="#" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                  <a href="#" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                  <div class="dropdown-divider"></div>
                  <a href="#" class="dropdown-item has-icon text-danger"><i class="far fa-trash-alt"></i>
                    Delete</a>
                </div>
              </div>
              <a href="#" class="btn btn-primary">View All</a>
            </div> --}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="chart1"></div>
                                <div class="row mb-0">
                                    <div class="col-lg-6">
                                        <div class="list-inline text-center">
                                            <div class="list-inline-item p-r-30">
                                              {{-- <i data-feather="arrow-up-circle"
                                                    class="col-green"></i> --}}
                                                <h3 class="m-b-0">{{ $totalUser }}</h3>
                                                <p class="text-muted font-14 m-b-0">Total Registration</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="list-inline text-center">
                                            <div class="list-inline-item p-r-30">
                                              {{-- <i data-feather="arrow-down-circle"
                                                    class="col-orange"></i> --}}
                                                <h3 class="m-b-0">{{ $totalCompletedBiodata }}</h3>
                                                <p class="text-muted font-14 m-b-0">Total Created Biodata</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="list-inline text-center">
                      <div class="list-inline-item p-r-30"><i data-feather="arrow-up-circle"
                          class="col-green"></i>
                        <h5 class="mb-0 m-b-0">$45,965</h5>
                        <p class="text-muted font-14 m-b-0">Incompleted Biodata</p>
                      </div>
                    </div>
                  </div> --}}
                                </div>
                            </div>
                            {{-- <div class="col-lg-3">
                <div class="row mt-5">
                  <div class="col-7 col-xl-7 mb-3">Total customers</div>
                  <div class="col-5 col-xl-5 mb-3">
                    <span class="text-big">8,257</span>
                    <sup class="col-green">+09%</sup>
                  </div>
                  <div class="col-7 col-xl-7 mb-3">Total Income</div>
                  <div class="col-5 col-xl-5 mb-3">
                    <span class="text-big">$9,857</span>
                    <sup class="text-danger">-18%</sup>
                  </div>
                  <div class="col-7 col-xl-7 mb-3">Project completed</div>
                  <div class="col-5 col-xl-5 mb-3">
                    <span class="text-big">28</span>
                    <sup class="col-green">+16%</sup>
                  </div>
                  <div class="col-7 col-xl-7 mb-3">Total expense</div>
                  <div class="col-5 col-xl-5 mb-3">
                    <span class="text-big">$6,287</span>
                    <sup class="col-green">+09%</sup>
                  </div>
                  <div class="col-7 col-xl-7 mb-3">New Customers</div>
                  <div class="col-5 col-xl-5 mb-3">
                    <span class="text-big">684</span>
                    <sup class="col-green">+22%</sup>
                  </div>
                </div>
              </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
      <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Chart</h4>
          </div>
          <div class="card-body">
            <div id="chart4" class="chartsh"></div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Chart</h4>
          </div>
          <div class="card-body">
            <div class="summary">
              <div class="summary-chart active" data-tab-group="summary-tab" id="summary-chart">
                <div id="chart3" class="chartsh"></div>
              </div>
              <div data-tab-group="summary-tab" id="summary-text">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
          <div class="card-header">
            <h4>Chart</h4>
          </div>
          <div class="card-body">
            <div id="chart2" class="chartsh"></div>
          </div>
        </div>
      </div>
    </div> --}}


        {{-- <div class="row">
      <div class="col-md-6 col-lg-12 col-xl-6">
        <!-- Support tickets -->
        <div class="card">
          <div class="card-header">
            <h4>Support Ticket</h4>
            <form class="card-header-form">
              <input type="text" name="search" class="form-control" placeholder="Search">
            </form>
          </div>
          <div class="card-body">
            <div class="support-ticket media pb-1 mb-3">
              <img src="{{asset('assets')}}/img/users/user-1.png" class="user-img mr-2" alt="">
              <div class="media-body ml-3">
                <div class="badge badge-pill badge-success mb-1 float-right">Feature</div>
                <span class="font-weight-bold">#89754</span>
                <a href="javascript:void(0)">Please add advance table</a>
                <p class="!my-1">Hi, can you please add new table for advan...</p>
                <small class="text-muted">Created by <span class="font-weight-bold font-13">John
                    Deo</span>
                  &nbsp;&nbsp; - 1 day ago</small>
              </div>
            </div>
            <div class="support-ticket media pb-1 mb-3">
              <img src="{{asset('assets')}}/img/users/user-2.png" class="user-img mr-2" alt="">
              <div class="media-body ml-3">
                <div class="badge badge-pill badge-warning mb-1 float-right">Bug</div>
                <span class="font-weight-bold">#57854</span>
                <a href="javascript:void(0)">Select item not working</a>
                <p class="!my-1">please check select item in advance form not work...</p>
                <small class="text-muted">Created by <span class="font-weight-bold font-13">Sarah
                    Smith</span>
                  &nbsp;&nbsp; - 2 day ago</small>
              </div>
            </div>
            <div class="support-ticket media pb-1 mb-3">
              <img src="{{asset('assets')}}/img/users/user-3.png" class="user-img mr-2" alt="">
              <div class="media-body ml-3">
                <div class="badge badge-pill badge-primary mb-1 float-right">Query</div>
                <span class="font-weight-bold">#85784</span>
                <a href="javascript:void(0)">Are you provide template in Angular?</a>
                <p class="!my-1">can you provide template in latest angular 8.</p>
                <small class="text-muted">Created by <span class="font-weight-bold font-13">Ashton Cox</span>
                  &nbsp;&nbsp; -2 day ago</small>
              </div>
            </div>
            <div class="support-ticket media pb-1 mb-3">
              <img src="{{asset('assets')}}/img/users/user-6.png" class="user-img mr-2" alt="">
              <div class="media-body ml-3">
                <div class="badge badge-pill badge-info mb-1 float-right">Enhancement</div>
                <span class="font-weight-bold">#25874</span>
                <a href="javascript:void(0)">About template page load speed</a>
                <p class="!my-1">Hi, John, can you work on increase page speed of template...</p>
                <small class="text-muted">Created by <span class="font-weight-bold font-13">Hasan
                    Basri</span>
                  &nbsp;&nbsp; -3 day ago</small>
              </div>
            </div>
          </div>
          <a href="javascript:void(0)" class="card-footer card-link text-center small ">View
            All</a>
        </div>
        <!-- Support tickets -->
      </div>
      <div class="col-md-6 col-lg-12 col-xl-6">
        <div class="card">
          <div class="card-header">
            <h4>Projects Payments</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover mb-0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Client Name</th>
                    <th>Date</th>
                    <th>Payment Method</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>John Doe </td>
                    <td>11-08-2018</td>
                    <td>NEFT</td>
                    <td>$258</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Cara Stevens
                    </td>
                    <td>15-07-2018</td>
                    <td>PayPal</td>
                    <td>$125</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>
                      Airi Satou
                    </td>
                    <td>25-08-2018</td>
                    <td>RTGS</td>
                    <td>$287</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>
                      Angelica Ramos
                    </td>
                    <td>01-05-2018</td>
                    <td>CASH</td>
                    <td>$170</td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>
                      Ashton Cox
                    </td>
                    <td>18-04-2018</td>
                    <td>NEFT</td>
                    <td>$970</td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>
                      John Deo
                    </td>
                    <td>22-11-2018</td>
                    <td>PayPal</td>
                    <td>$854</td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>
                      Hasan Basri
                    </td>
                    <td>07-09-2018</td>
                    <td>Cash</td>
                    <td>$128</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    </section>
@endsection
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let report = @json($report);

            let labels = report?.rows?.map(row => row.dimensionValues[0].value);
            let data = report?.rows?.map(row => row.metricValues[0].value);

            let ctx = document.getElementById("analyticsChart").getContext("2d");
            new Chart(ctx, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Active Users",
                        data: data,
                        borderColor: "blue",
                        borderWidth: 2,
                        fill: false
                    }]
                }
            });
        });
    </script>

    <script>
        fetch("{{ route('admin.biodata.stats') }}") // Adjust the route
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById("biodataChart").getContext("2d");

                const months = [...new Set(Object.keys(data.incomplete)
                    .concat(Object.keys(data.pending))
                    .concat(Object.keys(data.approved))
                    .concat(Object.keys(data.suspected))
                    .concat(Object.keys(data.married))
                )].sort();

                const chartData = {
                    labels: months,
                    datasets: [{
                            label: "Incomplete",
                            data: months.map(m => data.incomplete[m] || 0),
                            backgroundColor: "rgba(255, 99, 132, 0.5)",
                            borderColor: "rgba(255, 99, 132, 1)",
                            borderWidth: 1
                        },
                        {
                            label: "Pending",
                            data: months.map(m => data.pending[m] || 0),
                            backgroundColor: "rgba(54, 162, 235, 0.5)",
                            borderColor: "rgba(54, 162, 235, 1)",
                            borderWidth: 1
                        },
                        {
                            label: "Approved",
                            data: months.map(m => data.approved[m] || 0),
                            backgroundColor: "rgba(75, 192, 192, 0.5)",
                            borderColor: "rgba(75, 192, 192, 1)",
                            borderWidth: 1
                        },
                        {
                            label: "Suspected",
                            data: months.map(m => data.suspected[m] || 0),
                            backgroundColor: "rgba(255, 206, 86, 0.5)",
                            borderColor: "rgba(255, 206, 86, 1)",
                            borderWidth: 1
                        },
                        {
                            label: "Married",
                            data: months.map(m => data.married[m] || 0),
                            backgroundColor: "rgba(153, 102, 255, 0.5)",
                            borderColor: "rgba(153, 102, 255, 1)",
                            borderWidth: 1
                        }
                    ]
                };

                new Chart(ctx, {
                    type: "line",
                    data: chartData,
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: "Month"
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: "Count"
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
    </script>
@endsection
