<!-- 
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>  -->

      <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
      <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script> -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php?p=dashboard">Home</a></li>
              <li class="breadcrumb-item active">Data Product</li>
            </ol>
          </div>
        </div>
      </div>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product </h3><br>
                <a href="index.php?p=addproduct" class="btn btn-info float-right"><i class="fa fa-plus"> Add Product</i></a> 
              </div>
              
              <div class="card-body">                 
                <div class="box-body">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for name products.." autocomplete="off">
                      <div class="table-responsive">   
                          <table id="myTable" class="table table-striped table-hover">
                              <tr class="header">
                                <th>Id</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                              </tr>
                                
                              <?php
                              $data = mysqli_query($conn, "select * from products ORDER BY product ASC");
                              $no =1;
                              while($d = mysqli_fetch_array($data)){
                            ?>
                              <tr> 
                                <td><?php echo $no++;?></td>
                                <td><img src="../assets/image/<?=$d['img'];?>" alt="gambar" width="70" height="70"> </td>
                                <td><p class="card-text m-1" style="white-space: pre-wrap;"><?=substr($d['product'], 0,20,); ?> ..</p></td>
                                <td><?php echo $d['stok']; ?></td>
                                <td><?php echo $d['category']; ?></td>
                                <td><p class="card-text m-1" style="white-space: pre-wrap;"><?=substr($d['descriptions'], 0,25,); ?> ..</p></td>
                                <td><?="Rp ".number_format($d['price']); ?></td>
                                <td>
                                <a href="index.php?p=editproduct&product_id=<?=$d['product_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>&nbsp;
                                <a onclick="return confirm('apakah anda yakin? ');" href="index.php?p=actiondelete&product_id=<?=$d['product_id'] ?>" class="btn btn-danger btn-sm"><i class= "fa fa-trash">&nbsp;</i></a>
                                </td>
                              </tr>
                                
                              <?php
                                }
                              ?>
                              
                            </table>
                           
                    </div>
                     <!-- /.card-body -->
                  </div>
               </div>      
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
  </script>