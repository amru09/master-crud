<?php
    
    include 'config/connect-db.php';
    include 'config/base-url.php';
 
	$page    = $_GET['page'];
	$action  = $_GET['action'];

	if($page == "artikel" && $action == "insert")
	{
		  
		  $judul   = $_POST['judul'];
		  $content = $_POST['content'];
		  $tgl     = $_POST['tgl'];

		  if($_FILES["foto"]["name"] <> "")
		  {

		  	$type	       = $_FILES["foto"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-foto.jpg";
			$namaSementara = $_FILES['foto']['tmp_name'];
			$size          = $_FILES['foto']['size'];
			$dirUpload     = "assets/gambar/";

			$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

			$result = mysqli_query($mysqli, "INSERT INTO tb_artikel (id, judul, content, tgl, foto) 
			                                 VALUES(null, '$judul', '$content', '$tgl', 'assets/gambar/$namaFile')");
		   
		  }else{

			  $result = mysqli_query($mysqli, "INSERT INTO tb_artikel (id, judul, content, tgl) 
			                               VALUES(null, '$judul', '$content', '$tgl')");
		  
		  }

		  
		  if($result){ 
		      echo '<script language="javascript"> window.location.href = "'.$base_url_back.'/artikel.php" </script>';
		  }else{
		      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		  }

	
	}elseif($page == "artikel" && $action == "update")
	{

		  $ID      = $_POST['id'];
		  $judul   = $_POST['judul'];
		  $tgl     = $_POST['tgl'];
		  $content = $_POST['content'];


		  if($_FILES["foto"]["name"] <> "")
		  {

		  	$type	       = $_FILES["foto"]["type"];
		  	$namaFile      = "file-".date('Y-m-d H-i-s')."-foto.jpg";
			$namaSementara = $_FILES['foto']['tmp_name'];
			$size          = $_FILES['foto']['size'];
			$dirUpload     = "assets/gambar/";


			      $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

				  $result = mysqli_query($mysqli, "UPDATE tb_artikel
				  									SET 
				  									   judul   = '$judul',
				  									   tgl     = '$tgl',
				  									   content = '$content',
				  									   foto = 'assets/gambar/$namaFile'
				  									   WHERE id = $ID
				  									") or die(mysqli_error($mysqli));

		  
		  }else{

				  $result = mysqli_query($mysqli, "UPDATE tb_artikel
				  									SET 
				  									   judul   = '$judul',
				  									   tgl     = '$tgl',
				  									   content = '$content'
				  									   WHERE id = $ID
				  									") or die(mysqli_error($mysqli));
		  
		  }



		  
		  if(isset($result)){ 

		      		echo '<script language="javascript"> 
		      				window.location.href = "'.$base_url_back.'/artikel.php" 
		      			 </script>';

		  }else{

			      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  	  echo "<br><br><a href='artikel.php'>Kembali</a>";
			  
		  
		  }

	}elseif($page == "artikel" && $action == "delete")
	{

		  $ID = $_GET['id'];


				  $result = mysqli_query($mysqli, "DELETE FROM tb_artikel WHERE id = $ID
				  									") or die(mysqli_error($mysqli));

		  
		  if(isset($result)){ 

		      		echo '<script language="javascript"> 
		      				window.location.href = "'.$base_url_back.'/artikel.php" 
		      			 </script>';

		  }else{

			      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
			  	  echo "<br><br><a href='artikel.php'>Kembali</a>";
			  
		  
		  }

	}
	

?>