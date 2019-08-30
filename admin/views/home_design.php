<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }
  if (!isset($_SESSION['admin'])) {
        header('location:login');
    }
?>

<!-- Icon Cards-->
<div class="row">
  <div class="col-lg-8">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-area"></i> Area Chart Example
      </div>
      <div class="card-body">
        <canvas id="myAreaChart" width="100%" height="40%"></canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-pie"></i> Pie Chart</div>
      <div class="card-body">
        <canvas id="myPieChart" width="100%" height="86%"></canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>
</div>



<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Customers</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Firstname</th>
            <th>Surname</th>
            <th>Gender</th>
            <th>Username</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Firstname</th>
            <th>Surname</th>
            <th>Gender</th>
            <th>Username</th>
          </tr>
        </tfoot>

        <tbody>
          <?php 
            foreach ($customer as $cus) {
              echo '<tr>';
              echo '<td>'.$cus['firstname'].'</td>';
              echo '<td>'.$cus['surname'].'</td>';
              echo '<td>'.$cus['gender'].'</td>';
              echo '<td>'.$cus['username'].'</td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
