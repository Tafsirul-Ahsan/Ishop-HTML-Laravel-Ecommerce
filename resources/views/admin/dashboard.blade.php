@extends('admin.master')

@section('homeContent')

<div class="row">
            <div class="panel-body">
                <div class="col-md-12 w3ls-graph">
                    <!--agileinfo-grap-->
                        <div class="agileinfo-grap">
                            <div class="agileits-box">
                                <header class="agileits-box-header clearfix">
                                    <h3>Visitor Statistics</h3>
                                        <div class="toolbar">
                                            
                                            
                                        </div>
                                </header>
                                <!-- Chart 1 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-9 col-xl-8">
        <div class="card widget-card border-light shadow-sm">
          <div class="card-body p-4">
            <div class="d-block d-sm-flex align-items-center justify-content-between mb-3">
              <div class="mb-3 mb-sm-0">
                <h5 class="card-title widget-card-title">Sales Overview</h5>
              </div>
              <div>
                <select class="form-select text-secondary border-light-subtle">
                  <option value="1">March 2023</option>
                  <option value="2">April 2023</option>
                  <option value="3">May 2023</option>
                  <option value="4">June 2023</option>
                </select>
              </div>
            </div>
            <div id="bsb-chart-1"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
                            </div>
                        </div>
    <!--//agileinfo-grap-->

                </div>
            </div>
        </div>
        <div class="agil-info-calendar">
        <!-- calendar -->
        <div class="col-md-6 agile-calendar">
            <div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
                    <span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
                <!-- grids -->
                    <!-- Chart 4 - Bootstrap Brain Component -->
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-9 col-xl-8 col-xxl-7">
        <div class="card widget-card border-light shadow-sm">
          <div class="card-body p-4">
            <div class="d-block d-sm-flex align-items-center justify-content-between mb-3">
              <div class="mb-3 mb-sm-0">
                <h5 class="card-title widget-card-title">Department Sales</h5>
              </div>
              <div>
                <select class="form-select text-secondary border-light-subtle">
                  <option value="1">March 2023</option>
                  <option value="2">April 2023</option>
                  <option value="3">May 2023</option>
                  <option value="4">June 2023</option>
                </select>
              </div>
            </div>
            <div id="bsb-chart-4"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
                            
                            <div class="clearfix"> </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- //calendar -->
        <div class="col-md-6 w3agile-notifications">
            <div class="notifications">
                <!--notification start-->
                
                    <header class="panel-heading">
                        Notification 
                    </header>
                    <div class="notify-w3ls">
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
                                    <li class="pull-right notification-time">1 min ago</li>
                                </ul>
                                <p>
                                    Urgent meeting for next proposal
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-danger">
                            <span class="alert-icon"><i class="fa fa-facebook"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> mentioned you in a post </li>
                                    <li class="pull-right notification-time">7 Hours Ago</li>
                                </ul>
                                <p>
                                    Very cool photo jack
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-success ">
                            <span class="alert-icon"><i class="fa fa-comments-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender">You have 5 message unread</li>
                                    <li class="pull-right notification-time">1 min ago</li>
                                </ul>
                                <p>
                                    <a href="#">Anjelina Mewlo, Jack Flip</a> and <a href="#">3 others</a>
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-warning ">
                            <span class="alert-icon"><i class="fa fa-bell-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender">Domain Renew Deadline 7 days ahead</li>
                                    <li class="pull-right notification-time">5 Days Ago</li>
                                </ul>
                                <p>
                                    Next 5 July Thursday is the last day
                                </p>
                            </div>
                        </div>
                        <div class="alert alert-info clearfix">
                            <span class="alert-icon"><i class="fa fa-envelope-o"></i></span>
                            <div class="notification-info">
                                <ul class="clearfix notification-meta">
                                    <li class="pull-left notification-sender"><span><a href="#">Jonathan Smith</a></span> send you a mail </li>
                                    <li class="pull-right notification-time">1 min ago</li>
                                </ul>
                                <p>
                                    Urgent meeting for next proposal
                                </p>
                            </div>
                        </div>
                        
                    </div>
                
                <!--notification end-->
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
            <!-- tasks -->
            <div class="agile-last-grids">
                <div class="col-md-4 agile-last-left">
                    <div class="agile-last-grid">
                        <div class="area-grids-heading">
                            <h3>Monthly</h3>
                        </div>
                        <div id="graph7"></div>
                        <script>
                        // This crosses a DST boundary in the UK.
                        Morris.Area({
                          element: 'graph7',
                          data: [
                            {x: '2013-03-30 22:00:00', y: 3, z: 3},
                            {x: '2013-03-31 00:00:00', y: 2, z: 0},
                            {x: '2013-03-31 02:00:00', y: 0, z: 2},
                            {x: '2013-03-31 04:00:00', y: 4, z: 4}
                          ],
                          xkey: 'x',
                          ykeys: ['y', 'z'],
                          labels: ['Y', 'Z']
                        });
                        </script>

                    </div>
                </div>
                <div class="col-md-4 agile-last-left agile-last-middle">
                    <div class="agile-last-grid">
                        <div class="area-grids-heading">
                            <h3>Daily</h3>
                        </div>
                        <div id="graph8"></div>
                        <script>
                        /* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
                        var day_data = [
                          {"period": "2016-10-01", "licensed": 3407, "sorned": 660},
                          {"period": "2016-09-30", "licensed": 3351, "sorned": 629},
                          {"period": "2016-09-29", "licensed": 3269, "sorned": 618},
                          {"period": "2016-09-20", "licensed": 3246, "sorned": 661},
                          {"period": "2016-09-19", "licensed": 3257, "sorned": 667},
                          {"period": "2016-09-18", "licensed": 3248, "sorned": 627},
                          {"period": "2016-09-17", "licensed": 3171, "sorned": 660},
                          {"period": "2016-09-16", "licensed": 3171, "sorned": 676},
                          {"period": "2016-09-15", "licensed": 3201, "sorned": 656},
                          {"period": "2016-09-10", "licensed": 3215, "sorned": 622}
                        ];
                        Morris.Bar({
                          element: 'graph8',
                          data: day_data,
                          xkey: 'period',
                          ykeys: ['licensed', 'sorned'],
                          labels: ['Licensed', 'SORN'],
                          xLabelAngle: 60
                        });
                        </script>
                    </div>
                </div>
                <div class="col-md-4 agile-last-left agile-last-right">
                    <div class="agile-last-grid">
                        <div class="area-grids-heading">
                            <h3>Yearly</h3>
                        </div>
                        <div id="graph9"></div>
                        <script>
                        var day_data = [
                          {"elapsed": "I", "value": 34},
                          {"elapsed": "II", "value": 24},
                          {"elapsed": "III", "value": 3},
                          {"elapsed": "IV", "value": 12},
                          {"elapsed": "V", "value": 13},
                          {"elapsed": "VI", "value": 22},
                          {"elapsed": "VII", "value": 5},
                          {"elapsed": "VIII", "value": 26},
                          {"elapsed": "IX", "value": 12},
                          {"elapsed": "X", "value": 19}
                        ];
                        Morris.Line({
                          element: 'graph9',
                          data: day_data,
                          xkey: 'elapsed',
                          ykeys: ['value'],
                          labels: ['value'],
                          parseTime: false
                        });
                        </script>

                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        <!-- //tasks -->
        <div class="agileits-w3layouts-stats">
                    <div class="col-md-4 stats-info widget">
                        <div class="stats-info-agileits">
                            <div class="stats-title">
                                <h4 class="title">Browser Stats</h4>
                            </div>
                            <div class="stats-body">
                                <ul class="list-unstyled">
                                    <li>GoogleChrome <span class="pull-right">85%</span>  
                                        <div class="progress progress-striped active progress-right">
                                            <div class="bar green" style="width:85%;"></div> 
                                        </div>
                                    </li>
                                    <li>Firefox <span class="pull-right">35%</span>  
                                        <div class="progress progress-striped active progress-right">
                                            <div class="bar yellow" style="width:35%;"></div>
                                        </div>
                                    </li>
                                    <li>Internet Explorer <span class="pull-right">78%</span>  
                                        <div class="progress progress-striped active progress-right">
                                            <div class="bar red" style="width:78%;"></div>
                                        </div>
                                    </li>
                                    <li>Safari <span class="pull-right">50%</span>  
                                        <div class="progress progress-striped active progress-right">
                                            <div class="bar blue" style="width:50%;"></div>
                                        </div>
                                    </li>
                                    <li>Opera <span class="pull-right">80%</span>  
                                        <div class="progress progress-striped active progress-right">
                                            <div class="bar light-blue" style="width:80%;"></div>
                                        </div>
                                    </li>
                                    <li class="last">Others <span class="pull-right">60%</span>  
                                        <div class="progress progress-striped active progress-right">
                                            <div class="bar orange" style="width:60%;"></div>
                                        </div>
                                    </li> 
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 stats-info stats-last widget-shadow">
                        <div class="stats-last-agile">
                            <table class="table stats-table ">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>PRODUCT</th>
                                        <th>STATUS</th>
                                        <th>PROGRESS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Lorem ipsum</td>
                                        <td><span class="label label-success">In progress</span></td>
                                        <td><h5>85% <i class="fa fa-level-up"></i></h5></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Aliquam</td>
                                        <td><span class="label label-warning">New</span></td>
                                        <td><h5>35% <i class="fa fa-level-up"></i></h5></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Lorem ipsum</td>
                                        <td><span class="label label-danger">Overdue</span></td>
                                        <td><h5 class="down">40% <i class="fa fa-level-down"></i></h5></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Aliquam</td>
                                        <td><span class="label label-info">Out of stock</span></td>
                                        <td><h5>100% <i class="fa fa-level-up"></i></h5></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Lorem ipsum</td>
                                        <td><span class="label label-success">In progress</span></td>
                                        <td><h5 class="down">10% <i class="fa fa-level-down"></i></h5></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Aliquam</td>
                                        <td><span class="label label-warning">New</span></td>
                                        <td><h5>38% <i class="fa fa-level-up"></i></h5></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>

<div class="fd-heading">
        <div>
            <h2>Finance Dashboard</h2>
            <p>Sales, payments, expenses and business performance at a glance.</p>
        </div>
        <form method="GET" action="{{ url()->current() }}" class="fd-toolbar">
            <select name="period" aria-label="Chart period" onchange="this.form.submit()">
                <option value="7" {{ (string)($period ?? 30)==='7' ? 'selected' : '' }}>Last 7 days</option>
                <option value="30" {{ (string)($period ?? 30)==='30' ? 'selected' : '' }}>Last 30 days</option>
                <option value="90" {{ (string)($period ?? 30)==='90' ? 'selected' : '' }}>Last 90 days</option>
            </select>
            <a class="btn btn-outline-secondary btn-sm" href="{{ url()->current() }}">Reset</a>
        </form>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3"><div class="fd-card fd-metric">
            <div class="fd-metric-icon" style="background:#e8f8ef;color:#159653;">৳</div>
            <div class="fd-metric-label">Sales Revenue (period)</div>
            <div class="fd-metric-value">৳{{ number_format((float)($totalSales ?? 0), 2) }}</div>
        </div></div>
        <div class="col-12 col-sm-6 col-xl-3"><div class="fd-card fd-metric">
            <div class="fd-metric-icon" style="background:#eaf2ff;color:#2764d8;"><i class="fa fa-credit-card"></i></div>
            <div class="fd-metric-label">Payments Received</div>
            <div class="fd-metric-value">৳{{ number_format((float)($totalReceived ?? 0), 2) }}</div>
        </div></div>
        <div class="col-12 col-sm-6 col-xl-3"><div class="fd-card fd-metric">
            <div class="fd-metric-icon" style="background:#fff3df;color:#c77b12;"><i class="fa fa-receipt"></i></div>
            <div class="fd-metric-label">Business Expenses</div>
            <div class="fd-metric-value">৳{{ number_format((float)($totalExpenses ?? 0), 2) }}</div>
        </div></div>
        <div class="col-12 col-sm-6 col-xl-3"><div class="fd-card fd-metric">
            <div class="fd-metric-icon" style="background:{{ ($estimatedProfit ?? 0) >= 0 ? '#e8f8ef' : '#fdecec' }};color:{{ ($estimatedProfit ?? 0) >= 0 ? '#159653' : '#d93636' }};"><i class="fa fa-line-chart"></i></div>
            <div class="fd-metric-label">Estimated Profit*</div>
            <div class="fd-metric-value" style="color:{{ ($estimatedProfit ?? 0) >= 0 ? '#159653' : '#d93636' }}">৳{{ number_format((float)($estimatedProfit ?? 0), 2) }}</div>
        </div></div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-12 col-xl-8"><div class="fd-card fd-section">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div><h5>Sales vs Expenses</h5><div class="fd-subtitle">Daily totals for the selected period</div></div>
                <span class="text-secondary small">Currency: BDT (৳)</span>
            </div>
            <div class="fd-chart"><canvas id="salesExpenseChart"></canvas></div>
        </div></div>
        <div class="col-12 col-xl-4"><div class="fd-card fd-section">
            <div><h5>Invoice Payment Status</h5><div class="fd-subtitle">Sales records in the selected period</div></div>
            <div class="fd-chart fd-chart-sm"><canvas id="paymentStatusChart"></canvas></div>
        </div></div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-12 col-xl-7"><div class="fd-card fd-section">
            <div><h5>Monthly Performance</h5><div class="fd-subtitle">Sales and expenses across the last 12 months</div></div>
            <div class="fd-chart"><canvas id="monthlyChart"></canvas></div>
        </div></div>
        <div class="col-12 col-xl-5"><div class="fd-card fd-section">
            <div><h5>Expenses by Category</h5><div class="fd-subtitle">Distribution of expenses in the selected period</div></div>
            <div class="fd-chart"><canvas id="expenseCategoryChart"></canvas></div>
        </div></div>
    </div>

    <div class="fd-card fd-section">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div><h5>Recent Sales</h5><div class="fd-subtitle">Latest invoices within the selected period</div></div>
            <a href="{{ route('finance.sales.index') }}" class="btn btn-sm btn-outline-primary">View all sales</a>
        </div>
        <div class="table-responsive">
            <table class="fd-table">
                <thead><tr><th>Invoice</th><th>Date</th><th>Customer</th><th>Total</th><th>Paid</th><th>Due</th><th>Status</th></tr></thead>
                <tbody>
                @forelse(($recentSales ?? collect()) as $sale)
                    <tr>
                        <td class="fw-semibold">{{ $sale->invoice_no ?? ('Sale #'.$sale->id) }}</td>
                        <td>{{ $sale->sale_date ? \Carbon\Carbon::parse($sale->sale_date)->format('d M Y') : '—' }}</td>
                        <td>{{ $sale->customer->name ?? 'Walk-in' }}</td>
                        <td>৳{{ number_format((float)$sale->total, 2) }}</td>
                        <td class="text-success">৳{{ number_format((float)$sale->paid_amount, 2) }}</td>
                        <td class="text-danger">৳{{ number_format((float)$sale->due_amount, 2) }}</td>
                        <td>
                            @php($status = strtolower($sale->status ?? 'unknown'))
                            <span class="fd-pill" style="background:{{ $status==='paid'?'#e8f8ef':($status==='partial'?'#fff3df':'#edf0f5') }};color:{{ $status==='paid'?'#16864a':($status==='partial'?'#a86708':'#667386') }};">{{ ucfirst($status) }}</span>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center text-secondary py-4">No sales found for this period.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <p class="text-secondary small mt-3 mb-0">* Estimated Profit = Sales Revenue − Business Expenses. This dashboard figure does not deduct product cost of goods sold (COGS).</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof Chart === 'undefined') return;

    const labels = @json($dailyLabels ?? []);
    const sales = @json($dailySales ?? []);
    const expenses = @json($dailyExpenses ?? []);
    const statusLabels = @json($statusLabels ?? []);
    const statusValues = @json($statusValues ?? []);
    const monthlyLabels = @json($monthlyLabels ?? []);
    const monthlySales = @json($monthlySales ?? []);
    const monthlyExpenses = @json($monthlyExpenses ?? []);
    const categoryLabels = @json($expenseCategoryLabels ?? []);
    const categoryValues = @json($expenseCategoryValues ?? []);

    Chart.defaults.font.family = 'Inter, system-ui, -apple-system, "Segoe UI", sans-serif';
    Chart.defaults.color = '#788497';
    Chart.defaults.plugins.legend.labels.usePointStyle = true;
    Chart.defaults.plugins.legend.labels.boxWidth = 8;

    const money = value => '৳' + Number(value || 0).toLocaleString('en-BD', {maximumFractionDigits: 0});
    const commonScales = {
        x: { grid: { display:false }, ticks: { maxRotation:0, autoSkip:true } },
        y: { beginAtZero:true, grid:{ color:'rgba(130,145,165,.13)' }, ticks:{ callback: value => money(value) } }
    };

    const salesExpenseEl = document.getElementById('salesExpenseChart');
    if (salesExpenseEl) new Chart(salesExpenseEl, {
        type:'line',
        data:{ labels, datasets:[
            { label:'Sales', data:sales, borderColor:'#21885b', backgroundColor:'rgba(33,136,91,.10)', fill:true, tension:.35, borderWidth:2.5, pointRadius:2 },
            { label:'Expenses', data:expenses, borderColor:'#e05a5a', backgroundColor:'rgba(224,90,90,.07)', fill:true, tension:.35, borderWidth:2.5, pointRadius:2 }
        ]},
        options:{ responsive:true, maintainAspectRatio:false, interaction:{mode:'index',intersect:false}, plugins:{tooltip:{callbacks:{label:ctx=>ctx.dataset.label+': '+money(ctx.raw)}}}, scales:commonScales }
    });

    const statusEl = document.getElementById('paymentStatusChart');
    if (statusEl) new Chart(statusEl, {
        type:'doughnut',
        data:{ labels:statusLabels, datasets:[{ data:statusValues, backgroundColor:['#21885b','#e8a23a','#8290a5','#4b82dc'], borderWidth:0, hoverOffset:5 }]},
        options:{ responsive:true, maintainAspectRatio:false, cutout:'68%', plugins:{legend:{position:'bottom'}, tooltip:{callbacks:{label:ctx=>ctx.label+': '+ctx.raw+' invoice(s)'}}} }
    });

    const monthlyEl = document.getElementById('monthlyChart');
    if (monthlyEl) new Chart(monthlyEl, {
        type:'bar',
        data:{ labels:monthlyLabels, datasets:[
            { label:'Sales', data:monthlySales, backgroundColor:'rgba(33,136,91,.82)', borderRadius:5, maxBarThickness:24 },
            { label:'Expenses', data:monthlyExpenses, backgroundColor:'rgba(224,90,90,.78)', borderRadius:5, maxBarThickness:24 }
        ]},
        options:{ responsive:true, maintainAspectRatio:false, interaction:{mode:'index',intersect:false}, plugins:{tooltip:{callbacks:{label:ctx=>ctx.dataset.label+': '+money(ctx.raw)}}}, scales:commonScales }
    });

    const categoryEl = document.getElementById('expenseCategoryChart');
    if (categoryEl) new Chart(categoryEl, {
        type:'doughnut',
        data:{ labels:categoryLabels.length ? categoryLabels : ['No expense data'], datasets:[{ data:categoryValues.length ? categoryValues : [1], backgroundColor:['#3b73d1','#e8a23a','#21885b','#8c69cf','#e05a5a','#36a6b5','#8b98a9','#d17d45'], borderWidth:0, hoverOffset:5 }]},
        options:{ responsive:true, maintainAspectRatio:false, cutout:'62%', plugins:{legend:{position:'bottom'}, tooltip:{callbacks:{label:ctx=>categoryValues.length ? ctx.label+': '+money(ctx.raw) : 'No expense data'}}} }
    });
});
</script>
@endsection


