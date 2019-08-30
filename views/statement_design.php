

<div class="card mb-3">
  <div class="card-header"><i class="fas fa-table"></i> Statement</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>S.N</th>
            <th>Date</th>
            <th>Time</th>
            <th>Description</th>
            <th>Dr.</th>
            <th>Cr.</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>S.N</th>
            <th>Date</th>
            <th>Time</th>
            <th>Description</th>
            <th>Dr.</th>
            <th>Cr.</th>
          </tr>
        </tfoot>

        <tbody>
          <?php
            $sn = 1;

            foreach ($statement as $key) {
              require '../db/db.php';
              $receive = $pdo->query("SELECT * FROM customer c JOIN transact t ON c.customer_id = t.receiver_id WHERE c.customer_id=t.receiver_id ")->fetch();
              $send = $pdo->query("SELECT * FROM customer c JOIN transact t ON c.customer_id = t.customer_id")->fetch();

              $date = new DateTime($key['submitted_on']);
              $total = $key['total'];

              echo '<tr>';
              echo '<td>'.$sn++.'</td>';
              echo '<td>'.$date->format('Y-m-d').'</td>';
              echo '<td>'.$date->format('H:i:s').'</td>';
              if ($key['action_id'] == '1') {
                echo '<td> <u><i>Deposited</i></u> <br>'.$key['description'].'</td>';
                echo '<td>-</td>';
                echo '<td>'.$key['amount'].'</td>';
              }
              else if ($key['action_id'] == '2'){
                echo '<td> <u><i>Withdrawal</i></u> <br>'.$key['description'].'</td>';
                echo '<td>'.$key['amount'].'</td>';
                echo '<td>-</td>';
              }
              else if ($key['action_id'] == '3'){
                if ($key['receiver_id'] == $user_id) {
                  echo '<td><i class="fas fa-fw fa-exchange-alt"></i> <u><i>Received From: </i> <b><i>'.$send['username'].'</i></b></u>';
                  echo '<br>'.$key['description'].'</td>';
                  echo '<td>-</td>';
                  echo '<td>'.$key['amount'].'</td>';
                }
                else{
                  echo '<td><i class="fas fa-fw fa-exchange-alt"></i> <u><i>Transferred to: </i> <b><i>'.$receive['username'].'</i></b></u>';
                  echo '<br>'.$key['description'].'</td>';
                  echo '<td>'.$key['amount'].'</td>';
                  echo '<td>-</td>';
                }
              }
              echo '</tr>';
            }
          ?>
          <tr class="text-center"><?php echo 'Total Balance: $'.$total; ?></tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>