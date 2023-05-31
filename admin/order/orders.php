<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?p=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
                <h3 class="card-title">Orders / Status / Sedang dikemas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="box box-info">
            <!-- /.box-header -->
       
           <div class="box-body">
              <div class="table-responsive">
                
                <table id="example" class="table table-striped table-bordered">
                 <form action="" method="GET">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Items</th>
                    <th>Payment</th>
                    <th>User ID</th>
                    <th>Status Pengiriman</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
        
                  <tbody>
                  <?php
                  
                  include "../../config.php";
                  
                  // $data = mysqli_query($conn, "select * from checkout ORDER BY order_id ASC");
                  $data = mysqli_query($conn, "select * from checkout where status_pengiriman ='Sedang dikemas' ORDER BY order_id DESC");
                  $no =1;
                  while($d = mysqli_fetch_array($data)){
                ?>
                  <tr> 
                    <td><?php echo $no++;?></td>
                    <td><p class="card-text m-1" style="white-space: pre-wrap;"><?=substr($d['products'], 0,90,); ?> ...</p></td>
                    <td><?= "Rp ".number_format($d['payment']); ?></td>
                    <td><?= $d['user_id']; ?></td>
                    <td><?= $d['status_pengiriman']; ?></td>
                    <td>
                      <a href="index.php?p=detailorder&order_id=<?=$d['order_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></a>
                    </td>
                  </tr>
                    
                  <?php
                  
                    }
                  ?>
                  </tbody>
                </table>
                </form>
                <script>
                  $(document).ready(function() {
                     $('#example').DataTable();
} );

                </script>
              </div>
              <!-- /.card-body -->
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
  
        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders / Status / Dalam perjalanan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="box box-info">
            <!-- /.box-header -->
       
           <div class="box-body">
              <div class="table-responsive">
                
                <table id="example" class="table table-striped table-bordered">
                 <form action="" method="GET">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Items</th>
                    <th>Payment</th>
                    <th>User ID</th>
                    <th>Status Pengiriman</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
        
                  <tbody>
                  <?php
                  
                  include "../../config.php";
                  $data = mysqli_query($conn, "select * from checkout where status_pengiriman ='Dalam Perjalanan' ORDER BY order_id DESC");
                  $no =1;
                  while($d = mysqli_fetch_array($data)){
                ?>
                  <tr> 
                    <td><?php echo $no++;?></td>
                    <td><p class="card-text m-1" style="white-space: pre-wrap;"><?=substr($d['products'], 0,90,); ?> ...</p></td>
                    <td><?php echo "Rp ".number_format($d['payment']); ?></td>
                    <td><?php echo $d['user_id']; ?></td>
                    <td><?php echo $d['status_pengiriman']; ?></td>
                    <td>
                      <a href="index.php?p=detailorder&order_id=<?=$d['order_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></a>
                    </td>
                  </tr>
                    
                  <?php
                  
                    }
                  ?>
                  </tbody>
                </table>
                </form>
                <script>
                  $(document).ready(function() {
                     $('#example').DataTable();
                } );

                </script>
              </div>
              <!-- /.card-body -->
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

         <!-- Main content -->
         <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders / Status / Sudah diterima</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="box box-info">
            <!-- /.box-header -->
       
           <div class="box-body">
              <div class="table-responsive">
                
                <table id="example" class="table table-striped table-bordered">
                 <form action="" method="GET">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Items</th>
                    <th>Payment</th>
                    <th>User ID</th>
                    <th>Status Pengiriman</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
        
                  <tbody>
                  <?php
                  
                  include "../../config.php";
                  $data = mysqli_query($conn, "select * from checkout where status_pengiriman ='diterima' ORDER BY order_id DESC");
                  $no =1;
                  while($d = mysqli_fetch_array($data)){
                ?>
                  <tr> 
                    <td><?php echo $no++;?></td>
                    <td><p class="card-text m-1" style="white-space: pre-wrap;"><?=substr($d['products'], 0,90,); ?> ...</p></td>
                    <td><?php echo "Rp ".number_format($d['payment']); ?></td>
                    <td><?php echo $d['user_id']; ?></td>
                    <td><?php echo $d['status_pengiriman']; ?></td>
                    <td>
                      <a href="index.php?p=detailorder&order_id=<?=$d['order_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></a>
                    </td>
                  </tr>
                    
                  <?php
                  
                    }
                  ?>
                  </tbody>
                </table>
                </form>
                <script>
                  $(document).ready(function() {
                     $('#example').DataTable();
} );

                </script>
              </div>
              <!-- /.card-body -->
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

    