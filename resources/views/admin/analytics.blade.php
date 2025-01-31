@extends('admin.default')

@section('content')
<div class="content">                <!-- Analytics Status -->
  <div class="row justify-content-between mb-5 ">
    <div class="col-lg-6">
      <div class="row">
        <div class="col-md-4">
          <div class="mini-status">
            <div class="text-content">
              <span class="title">my income</span>
              <span class="status text-primary"><i class="mdi mdi-currency-usd"></i>47,171</span>
            </div>
            <div class="chart-content">
              <div id="status-sm-chart-01"></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mini-status">
            <div class="text-content ">
              <span class="title">site traffic</span>
              <span class="status text-success"><i class="mdi mdi-progress-upload"></i>45%</span>
            </div>
            <div class="chart-content">
              <div id="status-sm-chart-02"></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="mini-status">
            <div class="text-content">
              <span class="title">site orders</span>
              <span class="status text-info"><i class="mdi mdi-cart"></i>2447</span>
            </div>
            <div class="chart-content">
              <div id="status-sm-chart-03"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 d-flex justify-content-xl-end flex-column flex-wrap align-items-lg-end">
      <div id="mini-status-range" class="date-range date-range-lg bg-white">
        <span class="date-holder text-dark"></span>
        <i class="mdi mdi-menu-down"></i>
      </div>
      <span class="time-zone">Timezone: (+06:00) Asia - Dhaka</span>
    </div>
  </div>


  <!-- User Sessions Bounce -->
  <div class="row">
    <div class="col-xl-4">
      
          <!-- User -->
          <div class="card card-default">
            <div class="card-header">
              <h2>Users</h2>
            </div>
            <div class="card-body">
              <div class="bg-primary d-flex justify-content-between flex-wrap p-5 text-white align-items-lg-end">
                <div class="d-flex flex-column">
                  <span class="h3 text-white">325,980</span>
                  <span>vs 275,900 (prev)</span>
                </div>
                <div>
                  <span>45%</span>
                  <i class="mdi mdi-arrow-up-bold"></i>
                </div>
              </div>
              <div id="line-chart-1"></div>
            </div>
          </div>

    </div>
    <div class="col-xl-4">
      
          <!-- Session -->
          <div class="card card-default">
            <div class="card-header">
              <h2>Sessions</h2>
            </div>
            <div class="card-body">
              <div class="bg-success d-flex justify-content-between flex-wrap p-5 text-white align-items-lg-end">
                <div class="d-flex flex-column">
                  <span class="h3 text-white">7,833</span>
                  <span>vs 7,012 (prev)</span>
                </div>
                <div>
                  <span>55%</span>
                  <i class="mdi mdi-arrow-up-bold"></i>
                </div>
              </div>
              <div id="line-chart-2"></div>
            </div>
          </div>

    </div>
    <div class="col-xl-4">
      
    <!-- Bounce Rate -->
    <div class="card card-default">
      <div class="card-header">
        <h2>Bounce Rate</h2>
      </div>
      <div class="card-body">
        <div class="bg-danger d-flex justify-content-between flex-wrap p-5 text-white align-items-lg-end">
          <div class="d-flex flex-column">
            <span class="h3 text-white">67.0%</span>
            <span>vs 65.21% (prev)</span>
          </div>
          <div>
            <span>7%</span>
            <i class="mdi mdi-arrow-down-bold"></i>
          </div>
        </div>
        <div id="line-chart-3"></div>
      </div>
    </div>

    </div>
  </div>

  <div class="row">
    <div class="col-xl-6">
      
      <!-- User Acquisition Statistics -->
      <div class="card card-default" id="user-acquisition">
        <div class="card-header border-bottom pb-0">
          <h2>User Acquisition</h2>
          <ul class="nav nav-underline-active-primary" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#traffic-channel" role="tab" aria-selected="true">Traffic
                Channel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#source-medium" role="tab" aria-selected="false">Source / Medium </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#referrals" role="tab" aria-selected="false">Referrals</a>
            </li>
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div id="barchartlg1"></div>
        </div>
        <div class="card-footer d-flex flex-wrap bg-white">
          <a href="#" class="text-uppercase py-3">Acquisition Report</a>
        </div>
      </div>

    </div>

    <!-- Sessions by Device -->
    <div class="col-xl-6">
      
        <!-- Sessions By Device -->
        <div class="card card-default">
          <div class="card-header border-bottom">
            <h2 class="mdi mdi-desktop-mac">Sessions by Device</h2>
          </div>
          <div class="card-body pt-6">
            <div class="row">
              <div class="col-lg-6">
                <div id="donut-chart-1"></div>
              </div>
              <div class="col-lg-6">
                <div class="media mb-4">
                  <i class="display-4 mdi mdi-remote-desktop text-primary mr-3"></i>
                  <div class="media-body">
                    <p>Desktop</p>
                    <p class="h4 my-1 text-dark">45% <span class="text-success">23.5% <i
                          class="mdi mdi-arrow-up-bold small"></i></span>
                    </p>
                    <p>vs 155,900 (prev)</p>
                  </div>
                </div>

                <div class="media mb-4">
                  <i class="display-4 mdi mdi-tablet-android text-primary mr-3"></i>
                  <div class="media-body">
                    <p>Tablet</p>
                    <p class="h4 my-1 text-dark">30% <span class="text-success">13.5% <i
                          class="mdi mdi-arrow-up-bold small"></i></span>
                    </p>
                    <p>vs 187,900 (prev)</p>
                  </div>
                </div>

                <div class="media mb-4">
                  <i class="display-4 mdi mdi-cellphone-iphone text-primary mr-3"></i>
                  <div class="media-body">
                    <p>Mobile</p>
                    <p class="h4 my-1 text-dark">25% <span class="text-success">35.5% <i
                          class="mdi mdi-arrow-up-bold small"></i></span>
                    </p>
                    <p>vs 309,900 (prev)</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

    </div>
  </div>

  <div class="row">
    <div class="col-xl-4">
      
      <!-- Us Vector Map -->
      <div class="card card-default">
        <div class="card-header">
          <h2>User Map</h2>
        </div>
        <div class="card-body">
          <div id="us-vector-map-marker"></div>
          <ul class="list-unstyled mt-4">
            <li class="d-flex flex-wrap justify-content-between border-top py-2 text-dark">
              Oregon
              <span class="text-primary">35</span>
            </li>
            <li class="d-flex flex-wrap justify-content-between border-top py-2 text-dark">
              Indiana
              <span class="text-success">10</span>
            </li>
            <li class="d-flex flex-wrap justify-content-between border-top py-2 text-dark">
              Colorado
              <span class="text-danger">25</span>
            </li>
          </ul>
        </div>
      </div>

    </div>
    <div class="col-xl-4">
      
      <!-- Page Views  -->
      <div class="card card-default" id="page-views">
        <div class="card-header">
          <h2>Page Views</h2>
        </div>
        <div class="card-body py-0" data-simplebar style="height: 392px;">
          <table class="table table-borderless table-thead-border">
            <thead>
              <tr>
                <th>Page</th>
                <th class="text-right px-3">Page Views</th>
                <th class="text-right">Avg Time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="text-primary"><a class="link" href="analytics.html">/analytics.html</a></td>
                <td class="text-right px-3">521</td>
                <td class="text-right">2m:14s</td>
              </tr>
              <tr>
                <td class="text-primary"><a class="link" href="email-inbox.html">/email-inbox.html</a></td>
                <td class="text-right px-3">356</td>
                <td class="text-right">2m:23s</td>
              </tr>
              <tr>
                <td class="text-primary"><a class="link" href="email-compose.html">/email-compose.html</a></td>
                <td class="text-right px-3">254</td>
                <td class="text-right">2m:2s</td>
              </tr>
              <tr>
                <td class="text-primary"><a class="link" href="charts-chartjs.html">/charts-chartjs.html</a></td>
                <td class="text-right px-3">126</td>
                <td class="text-right">1m:15s</td>
              </tr>
              <tr>
                <td class="text-primary"><a class="link" href="profile.html">/profile.html</a></td>
                <td class="text-right px-3">50</td>
                <td class="text-right">1m:7s</td>
              </tr>
              <tr>
                <td class="text-primary"><a class="link" href="general-widgets.html">/general-widgets.html</a></td>
                <td class="text-right px-3">50</td>
                <td class="text-right">2m:35s</td>
              </tr>
              <tr>
                <td class="text-primary"><a class="link" href="card.html">/card.html</a></td>
                <td class="text-right px-3">590</td>
                <td class="text-right">5m:55s</td>
              </tr>
              <tr>
                <td class="text-primary"><a class="link" href="email-inbox.html">/email-inbox.html</a></td>
                <td class="text-right px-3">29</td>
                <td class="text-right">8m:5s</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="card-footer bg-white py-4">
          <a href="#" class="text-uppercase">Audience Overview</a>
        </div>
      </div>

    </div>
    <div class="col-xl-4">
      <!-- Current Users  -->
      <div class="card card-default">
        <div class="card-header">
          <h2>Current Users</h2>
          <span>Realtime</span>
        </div>
        <div class="card-body">
          <div id="barchartlg2"></div>
        </div>
        <div class="card-footer bg-white py-4">
          <a href="#" class="text-uppercase">Current Users Overview</a>
        </div>
      </div>
    </div>
  </div>
</div>
    
@endsection