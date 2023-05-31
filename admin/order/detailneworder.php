<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?p=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Detail Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Detail Order</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="box box-info">
            <!-- /.box-header -->

           <div class="box-body">                    
       <?php
                  
                  include "../../config.php";
                  $d =$_GET['order_id'];
                  $data = mysqli_query($conn, "select * from orders where order_id='$d'");
                  while($da = mysqli_fetch_array($data)){
                ?>
        <form class="form-horizontal" method="POST" action="order/actionaddorder.php">
            <div class="box-body">  
                <?php 
                    include ('../../config.php');
                    $conn=mysqli_query($conn," SELECT * FROM users WhERE user_id='$da[user_id]'");
                    while($h=mysqli_fetch_array($conn)){
                   ?> 
                   <input type="hidden" name="order_id" value="<?=$da['order_id']; ?>">
                   <input type="hidden" name="products" value="<?=$da['products']; ?>">
                   <input type="hidden" name="payment" value="<?=$da['payment']; ?>">
                   <input type="hidden" name="bukti_pay" value="<?=$da['bukti_pay']; ?>">
                   <input type="hidden" name="user_id" value="<?=$da['user_id']; ?>">
                   <table class="table">
                  <tbody>
                    <tr>
                      <th scope="row">Items</th>
                      <td>:</td>
                      <td> <?=$da['products']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Total</th>
                      <td>:</td>
                      <td> <?="Rp ".number_format($da['payment']); ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Nama</th>
                      <td>:</td>
                      <td> <?=$h['nama']; ?></td>                      
                    </tr>
                    <tr>
                      <th scope="row">Email</th>
                      <td>:</td>
                      <td> <?=$h['email']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Telp</th>
                      <td>:</td>
                      <td> <?=$h['telp']; ?></td>
                    </tr><tr>
                      <th scope="row">Alamat</th>
                      <td>:</td>
                      <td> <?=$h['alamat']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Bukti Pembayaran</th>
                      <td>:</td>
                      <td> <img src="../assets/image/<?=$da['bukti_pay'];?>" alt="gambar" width="70" height="70"> </td>                      
                    </tr>
                    <tr>
                      <th scope="row">Tanggal</th>
                      <td>:</td>
                      <td> <?= $da['tgl']; ?></td>
                    </tr>
                    <tr>
                      <th scope="row">Status Pengiriman</th>
                      <td>:</td>
                      <td>
                      <select name="status_pengiriman">
                        <option value="Sedang dikemas">Sedang dikemas</option>
                        <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                      </select>
                      </td>                      
                    </tr>
                  </tbody>
                </table>
                 
            <!-- /.box-body -->
            
            <div class="box-footer">
            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save"> Selesai </i></button> 
            <a class="float-right"> &nbsp; &nbsp; </a> 
            <button type="submit" class="btn btn-success float-right"><i class="fa fa-print"> Print</i></button>
            </div>
            <!-- /.box-footer -->
        </form>
        <?php 
  }}
  ?>
            </div>
            <!-- /.card -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
