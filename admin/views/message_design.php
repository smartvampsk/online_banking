<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }
  if (!isset($_SESSION['admin'])) {
        header('location:login');
    }
?>

<div class="card mb-3">
  <div class="card-header"><i class="fas fa-table"></i> View Messages </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Message</th>
            <th>Operations</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Message</th>
            <th>Operations</th>
          </tr>
        </tfoot>

        <tbody>
          <?php 
            foreach ($message as $msg) {
              echo '<tr>';
              echo '<td>'.$msg['name'].'</td>';
              echo '<td>'.$msg['contact'].'</td>';
              echo '<td>'.$msg['email'].'</td>';
              echo '<td>'.$msg['message'].'</td>';
              echo '
              <td>
                <a class="btn text-success" href="mailto:'.$msg['email'].'"><i class="fas fa-reply"></i></a>
                <button class="btn text-danger" data-toggle="modal" data-target="#"><i class="fas fa-trash"></i></button>
              </td>';
              echo '</tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>