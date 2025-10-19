@php
    use Carbon\Carbon;

    $now = Carbon::now();
    $H = (int) $now->format('H');

    $greetings = match(true) {
        $H < 12        => 'Good morning',
        $H < 17        => 'Good afternoon',
        $H < 19        => 'Good evening',
        default        => 'Good night',
    };

    $user = Auth::guard('admin')->user();

    // GA response -> rows normalize for Blade
    $gaRows = [];
    if (!empty($report) && is_object($report) && method_exists($report, 'getRows')) {
        $rows = $report->getRows() ?? [];
        foreach ($rows as $r) {
            $dateRaw = optional($r->getDimensionValues())[0]->getValue() ?? null; // Ymd
            if ($dateRaw && preg_match('/^\d{8}$/', $dateRaw)) {
                $dateFmt = substr($dateRaw, 0, 4) . '-' . substr($dateRaw, 4, 2) . '-' . substr($dateRaw, 6, 2);
            } else {
                $dateFmt = $dateRaw;
            }
            $active = (int) (optional($r->getMetricValues())[0]->getValue() ?? 0);
            $gaRows[] = ['date' => $dateFmt, 'active' => $active];
        }
    }
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
                        Didn't create new biodata yet?
                        <a href="{{ route('admin.biodata.create') }}" class="fw-bold">Create Now</a>
                    @endif
                </span>
            </div>
        </div>
    </div>

    @if ($user->can('biodata-pending'))
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Pending Biodata</h4>
                    <div class="card-header-form">
                        <a href="{{ route('admin.biodata.pending') }}" class="btn btn-sm btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body px-2">
                    <div class="table-responsive mx-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Fathers Name</th>
                                    <th>Mothers Name</th>
                                    <th>Date of Birth</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if (!empty($pendingBiodata) && count($pendingBiodata) > 0)
                                @php $i = 0; @endphp
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
                                        <td>{{ \Carbon\Carbon::parse($pending->general()->birthdate)->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.biodata.edit_status', $pending->id) }}"
                                               class="btn btn-sm btn-primary">Update Status</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="text-center">No Pending Biodata!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        {{-- Visitor Analysis (GA4) --}}
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm mt-1">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Visitor Analysis</h4>
                    <small class="text-muted">Last 30 days</small>
                </div>

                @if(count($gaRows) > 0)
                    <div class="card-body">
                        <div style="height:320px">
                            <canvas id="analyticsChart"></canvas>
                        </div>
                    </div>
                @else
                    <div class="card-body">
                        <div class="text-muted">Analytics data unavailable (no access or API error).</div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Monthwise Biodata --}}
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm mt-1">
                <div class="card-header">
                    <h4 class="mb-0">Monthwise Biodata Chart</h4>
                </div>
                <div class="card-body">
                    <div style="height:320px">
                        <canvas id="biodataChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Biodata Analysis KPIs --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Biodata Analysis</h4>
                </div>
                <div class="card-body">
                    <div class="row mb-0">
                        <div class="col-lg-6">
                            <div class="list-inline text-center">
                                <div class="list-inline-item p-r-30">
                                    <h3 class="m-b-0">{{ $totalUser }}</h3>
                                    <p class="text-muted font-14 m-b-0">Total Registration</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="list-inline text-center">
                                <div class="list-inline-item p-r-30">
                                    <h3 class="m-b-0">{{ $totalCompletedBiodata }}</h3>
                                    <p class="text-muted font-14 m-b-0">Total Created Biodata</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- more widgets can go here --}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
{{-- যদি আগে থেকে Chart.js লোড না করা থাকে, তাহলে নিচের CDN রাখো --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // GA rows from PHP
    const gaRows = @json($gaRows);

    if (Array.isArray(gaRows) && gaRows.length > 0) {
        const labels = gaRows.map(r => r.date || '');
        const data   = gaRows.map(r => r.active || 0);

        const el = document.getElementById("analyticsChart");
        if (el) {
            new Chart(el.getContext("2d"), {
                type: "line",
                data: {
                    labels,
                    datasets: [{
                        label: "Active Users",
                        data,
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: { beginAtZero: true, title: { display: true, text: "Users" } },
                        x: { title: { display: true, text: "Date" } }
                    }
                }
            });
        }
    }
});
</script>

<script>
fetch("{{ route('admin.biodata.stats') }}")
  .then(r => r.json())
  .then(data => {
    const ctxEl = document.getElementById("biodataChart");
    if (!ctxEl) return;

    const safe = (obj) => (obj && typeof obj === 'object') ? obj : {};
    const d = {
        incomplete: safe(data.incomplete),
        pending:    safe(data.pending),
        approved:   safe(data.approved),
        suspected:  safe(data.suspected),
        married:    safe(data.married),
    };

    const months = [...new Set(
        Object.keys(d.incomplete)
        .concat(Object.keys(d.pending))
        .concat(Object.keys(d.approved))
        .concat(Object.keys(d.suspected))
        .concat(Object.keys(d.married))
    )].sort();

    const pick = key => months.map(m => (d[key][m] ?? 0));

    new Chart(ctxEl.getContext("2d"), {
        type: "line",
        data: {
            labels: months,
            datasets: [
                { label: "Incomplete", data: pick('incomplete'), borderWidth: 2, fill: false },
                { label: "Pending",    data: pick('pending'),    borderWidth: 2, fill: false },
                { label: "Approved",   data: pick('approved'),   borderWidth: 2, fill: false },
                { label: "Suspected",  data: pick('suspected'),  borderWidth: 2, fill: false },
                { label: "Married",    data: pick('married'),    borderWidth: 2, fill: false },
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true, title: { display: true, text: "Count" } },
                x: { title: { display: true, text: "Month" } }
            }
        }
    });
  })
  .catch(() => {/* ignore */});
</script>
@endsection