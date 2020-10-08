<?php
$vLabels = [];
$vHits = [];
$vTotals = [];

foreach ($hStatistics as $statistic) {
  $vLabels[] = indo_date($statistic['date'], 3);
}

foreach ($hStatistics as $statistic) {
  $vHits[] = $statistic['hits'];
}

foreach($vStatistics as $statistic){
  $vTotals[] = $statistic['visitors'];
}

?>
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <a class="card-icon bg-primary" href="#">
        <i class="fas fa-user-shield"></i>
      </a>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Total Admin</h4>
        </div>
        <div class="card-body">
          <?= $statistics['admin']; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <a class="card-icon bg-danger" href="#">
        <i class="fas fa-user"></i>
      </a>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pengguna</h4>
        </div>
        <div class="card-body">
          <?= $statistics['users']; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="fas fa-pencil-alt"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Pos</h4>
        </div>
        <div class="card-body">
          <?= $statistics['posts']; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="fas fa-circle"></i>
      </div>
      <div class="card-wrap">
        <div class="card-header">
          <h4>Online Users</h4>
        </div>
        <div class="card-body">
          47
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row mt-4">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4>Statistik Pengunjung</h4>
      </div>
      <div class="card-body">
        <canvas id="visitor-chart" width="100%" height="60%"></canvas>
      </div>
    </div>
  </div>
</div>

<script>
  const vLabels = <?= json_encode($vLabels); ?>;
  const vHits = <?= json_encode($vHits); ?>;
  const vTotals = <?= json_encode($vTotals); ?>;
</script>
