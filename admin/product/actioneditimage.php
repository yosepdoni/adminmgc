<?php 
include '../../config.php';

//   if (isset($_POST['simpan'])){
// 	$fileName = $_FILES['gambar']['name'];
//     $product_id =$_POST['product_id'];
// 	$sql = "update products set (product, stok, category, descriptions, price, img)  (
// 		'".$_POST['product']."', 
// 		'".$_POST['stok']."', 
// 		'".$_POST['category']."', 
// 		'".$_POST['descriptions']."', 
// 		'".$_POST['price']."', 
// 		'".$fileName['gambar']."') where product_id='".$product_id."'";

// 	//  $sql = "UPDATE 'products' SET  img='$fileName' WHERE product_id='".$product_id."'";
// 	 mysqli_query($conn, $sql);
// 	 // Simpan di Folder Gambar
// 	 move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/image/".$_FILES['gambar']['name']);
// 	 echo "<script>alert('Gambar berhasil diupdate');window.location.href='../index.php?p=addproduct'</script>";
// 	} 

	if(isset($_POST['simpan']))
{
    $id=$_POST['product_id'];   
    // $n=$_POST['product'];
    // $f=$_POST['stok'];
    // $m=$_POST['category'];
    // $d=$_POST['descriptions'];
    // $p=$_POST['price'];
    $i=$_FILES['gambar']['name'];
    $target_dir = "../../assets/image/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
	
    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) 
    {
        $sql="Update `products` set img='$i' where product_id='".$id."'";
        if(mysqli_query($conn,$sql))
        {
		 echo "<script>alert('Gambar berhasil diupdate');window.location.href='../index.php?p=products'</script>";
          
        }
        else 
        {
            echo 'not updated';
        }
    }
}
   ?>