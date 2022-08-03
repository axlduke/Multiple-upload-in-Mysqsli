<?php 
session_start();
include '../auth/db.php';
$seller_id = $_SESSION['user_id'];
// echo $seller_id;
    if(isset($_POST['post_product_button'])){
        $location="../img/";
        $file1=$_FILES['img1']['name'];
        $file_tmp1=$_FILES['img1']['tmp_name'];
        $file2=$_FILES['img2']['name'];
        $file_tmp2=$_FILES['img2']['tmp_name'];
        $file3=$_FILES['img3']['name'];
        $file_tmp3=$_FILES['img3']['tmp_name'];
        $file4=$_FILES['img4']['name'];
        $file_tmp4=$_FILES['img4']['tmp_name'];
        $file5=$_FILES['img5']['name'];
        $file_tmp5=$_FILES['img5']['tmp_name'];
        $data=[]; //using this we will use to store everything here
        $data=[$file1,$file2,$file3,$file4,$file5]; //call every file name to mixed them up
        $image=implode(' ',$data); // this is the final call to transfare all files into mysqli 

        $product_name=$_POST['product_name'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		$product_description=$_POST['product_description'];
		$product_category=$_POST['product_category'];
		$shipping_fee= $_POST['shipping_fee'];

        $sql = "INSERT INTO products (seller_id, product_name, quantity,price,product_description, product_category, shipping_fee,image) values ('$seller_id', '$product_name','$quantity','$price','$product_description','$product_category','$shipping_fee','$image')" or die ("query incorrect");
        $result = mysqli_query($conn, $sql); // this is the sample query we use inorder to insert the following
        if($result){
            header('location: file-of-yours.php');
        }

    }
?>
