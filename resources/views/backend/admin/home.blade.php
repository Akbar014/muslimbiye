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


        <div class="row">
            <div class="col-12">
                <div class="card p-2">

                    <div class="card-header">
                        <h4>Pending Biodata</h4>
                        <div class="card-header-form">
                            <a href="{{ route('admin.biodata.pending') }}" class="btn btn-sm btn-primary">View All</a>
                        </div>
                    </div>
                    @if ($pendingBiodata && $pendingBiodata->count() > 0)
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width:5%">#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Father's Name</th>
                                            <th>Mother's Name</th>
                                            <th>Date & Time</th>
                                            <th>Date of Birth</th>
                                            <th style="width:18%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pendingBiodata as $i => $pending)
                                            <tr>
                                                <td class="align-middle">{{ $i + 1 }}</td>

                                                <td class="align-middle">
                                                    @if ($pending->general()->bride_groom == 'groom')                           
                                                        {{ $pending->contact()->groom_name }}
                                                    @else                                    
                                                        {{ $pending->contact()->bride_name }}
                                                    @endif
                                                </td>

                                                <td>
                                                     <span class="badge {{ $statusClasses[$pending->status] ?? 'badge-secondary' }}">
                                                       {{ $statusLabels[$pending->status] ?? 'Unknown' }}
                                                    </span>
                                                </td>


                                                <td class="align-middle">{{ $pending->family()->fathers_name }}</td>
                                                <td class="align-middle">{{ $pending->family()->mothers_name }}</td>

                                                <td class="align-middle">
                                                    {{ $pending->postponed_at
                                                        ? \Carbon\Carbon::parse($pending->postponed_at)->format('d M, Y g:i a')
                                                        : \Carbon\Carbon::parse($pending->created_at)->format('d M, Y g:i a') }}
                                                </td>

                                                <td class="align-middle">
                                                    {{ \Carbon\Carbon::parse($pending->general()->birthdate)->format('d M Y') }}
                                                </td>

                                                {{-- ACTIONS: always inline --}}
                                                <td class="align-middle text-nowrap">
                                                    <div class="d-inline-flex align-items-center">

                                                        {{-- Edit --}}
                                                        <a href="{{ route('admin.backend.admin.biodata.edit', $pending->id) }}"
                                                            class="btn btn-sm btn-secondary mr-1" title="Edit">
                                                            <i class="fas fa-pen"></i>
                                                        </a>

                                                        {{-- Status dropdown (safe inside responsive table) --}}
                                                        <div class="dropdown position-static d-inline-block mr-1">
                                                            <button class="btn btn-sm btn-primary dropdown-toggle"
                                                                type="button" id="dd-{{ $pending->id }}"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                Status
                                                            </button>

                                                            <div class="dropdown-menu dropdown-menu-right shadow"
                                                                aria-labelledby="dd-{{ $pending->id }}"
                                                                data-display="static">

                                                                {{-- Pending (1) --}}
                                                                <form
                                                                    action="{{ route('admin.backend.admin.biodata.update', $pending->id) }}"
                                                                    method="POST" class="px-0 mx-0">
                                                                    @csrf @method('PUT')
                                                                    <input type="hidden" name="status" value="1">
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="far fa-clock mr-2 text-muted"></i> Pending
                                                                    </button>
                                                                </form>

                                                                {{-- Approved (2) --}}
                                                                <form
                                                                    action="{{ route('admin.backend.admin.biodata.approve', $pending->id) }}"
                                                                    method="POST" class="px-0 mx-0">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="dropdown-item text-success">
                                                                        <i class="fas fa-check mr-2"></i> Approved
                                                                    </button>
                                                                </form>

                                                                {{-- Suspected (3) --}}
                                                                <form
                                                                    action="{{ route('admin.backend.admin.biodata.update', $pending->id) }}"
                                                                    method="POST" class="px-0 mx-0">
                                                                    @csrf @method('PUT')
                                                                    <input type="hidden" name="status" value="3">
                                                                    <button type="submit"
                                                                        class="dropdown-item text-warning">
                                                                        <i class="fas fa-exclamation-triangle mr-2"></i>
                                                                        Suspected
                                                                    </button>
                                                                </form>

                                                                {{-- Married (4) --}}
                                                                <form
                                                                    action="{{ route('admin.backend.admin.biodata.update', $pending->id) }}"
                                                                    method="POST" class="px-0 mx-0">
                                                                    @csrf @method('PUT')
                                                                    <input type="hidden" name="status" value="4">
                                                                    <button type="submit" class="dropdown-item text-info">
                                                                        <i class="fas fa-ring mr-2"></i> Married
                                                                    </button>
                                                                </form>

                                                                {{-- Incomplete (0) --}}
                                                                <form
                                                                    action="{{ route('admin.backend.admin.biodata.update', $pending->id) }}"
                                                                    method="POST" class="px-0 mx-0">
                                                                    @csrf @method('PUT')
                                                                    <input type="hidden" name="status" value="0">
                                                                    <button type="submit"
                                                                        class="dropdown-item text-secondary">
                                                                        <i class="far fa-circle mr-2"></i> Incomplete
                                                                    </button>
                                                                </form>

                                                            {{-- Postpone (5) -> opens modal --}}
                                                            @php
                                                            $postponeUrl = route('admin.backend.admin.biodata.postpone', $pending->id);
                                                            $displayName = $pending->general()->bride_groom == 'groom'
                                                                ? $pending->contact()->groom_name
                                                                : $pending->contact()->bride_name;
                                                            @endphp

                                                            <button type="button"
                                                                    class="dropdown-item"
                                                                    data-toggle="modal"
                                                                    data-target="#postponeModal"
                                                                    onclick="setPostponeAction('{{ $postponeUrl }}', '{{ $pending->id }}')">
                                                            <i class="far fa-calendar-minus mr-2"></i> Postpone
                                                            </button>

                                                            </div>
                                                        </div>

                                                        {{-- Delete (keep inline) --}}
                                                        <form
                                                            action="{{ route('admin.backend.admin.biodata.delete', $pending->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure to delete this biodata?')"
                                                            class="d-inline-block mb-0">
                                                            @csrf @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="text-center text-muted">No Pending Biodata!</div>
                        </div>
                    @endif

                </div>
            </div>
        </div>


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
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="chart1"></div>
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
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <div class="modal fade" id="postponeModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" id="postponeForm" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Postpone Biodata</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>

                <div class="modal-body">
                    <input type="hidden" id="postponeBiodataId">
                    <div class="form-group">
                        <label>Note <span class="text-danger">*</span></label>
                        <textarea name="postponed_note" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Postponed Date & Time (optional)</label>
                        <input type="datetime-local" name="postponed_at" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">
                        <span class="js-save-text">Save</span>
                        <span class="spinner-border spinner-border-sm d-none js-save-spin" role="status"
                            aria-hidden="true"></span>
                    </button>
                </div>

            </form>
        </div>
    </div>

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

<script>
  function setPostponeAction(url, id) {
    // dropdown বন্ধ করে দিন
    $('.dropdown-menu.show').removeClass('show').parent().removeClass('show');

    console.log('Set postpone action:', url, id, name);

    // modal সবসময় body-তে আনি যাতে stacking/context সমস্যা না হয়
    $('#postponeModal').appendTo('body');

    // form action + fallback data attribute
    var $f = $('#postponeForm');
    $f.attr('action', url).data('action', url);

    // দরকার হলে নাম/আইডি ফিল্ড সেট করতে পারেন (আপনার modal-এ name ইনপুট না থাকলে এই লাইন স্কিপ)
    $('#postponeBiodataId').val(id);
    // $('#postponeName').val(name || '');

    // UI reset
    var $btn = $f.find('.btn.btn-primary');
    $btn.prop('disabled', false);
    var $note = $f.find('textarea[name="postponed_note"]');
    $note.prop('readonly', false).removeClass('is-invalid');
    $f.find('input[name="postponed_at"]').prop('readonly', false);
    $('.js-save-text').removeClass('d-none');
    $('.js-save-spin').addClass('d-none');
    $f.find('.invalid-feedback').remove();
  }
</script>
<script>
$(function () {
  $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } });

  $('#postponeForm').on('submit', function (e) {
    e.preventDefault();

    var $f  = $(this);
    var url = $f.attr('action') || $f.data('action'); // fallback

    if (!url) {
      alert('Postpone URL missing. Check setPostponeAction().');
      return;
    }

    var $note = $f.find('textarea[name="postponed_note"]');
    if (!$note.val().trim()) {
      $note.addClass('is-invalid');
      if (!$note.next('.invalid-feedback').length) {
        $note.after('<div class="invalid-feedback d-block">Note is required.</div>');
      }
      return;
    }

    // UI lock + spinner
    var $btn = $f.find('.btn.btn-primary');
    $btn.prop('disabled', true);
    $('.js-save-text').addClass('d-none');
    $('.js-save-spin').removeClass('d-none');
    $note.prop('readonly', true);
    $f.find('input[name="postponed_at"]').prop('readonly', true);

    // Actual POST
    $.post(url, $f.serialize())
      .done(function () { location.reload(); })
      .fail(function (xhr) {
        alert('Failed to postpone: ' + (xhr.responseText || xhr.statusText));
        $btn.prop('disabled', false);
        $('.js-save-text').removeClass('d-none');
        $('.js-save-spin').addClass('d-none');
        $note.prop('readonly', false);
        $f.find('input[name="postponed_at"]').prop('readonly', false);
      });
  });

  // Modal cleanups
  $('#postponeModal').on('hidden.bs.modal', function () {
    $('#postponeForm')[0].reset();
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
  });
});
</script>





@endsection
