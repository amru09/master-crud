<?php include ('template/top.php') ?>

      <div class="container">
        <a href="tambah_artikel.php" class="btn btn-outline-secondary" style="margin-bottom: 50px;"><i class="fa fa-plus small"></i>Tambah Artikel</a>
        <div class="row">

          <table class="table table-striped" >
                              <thead>
                                <tr>
                                  <th scope="col">No</th>
                                  <th scope="col">Foto</th>
                                  <th scope="col">Judul</th>
                                  <th scope="col">Tanggal Post</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>

                              <tbody>
                              <?php
                                $no=1;
                                $qry = mysqli_query($mysqli, "SELECT * FROM tb_artikel");
                                while($data = mysqli_fetch_array($qry)){ 

                              ?>
                                <tr>
                                  <td data-label="No" scope="row" ><?php echo $no; ?></td>
                                  <td data-label="Foto"><img src="<?php echo $data['foto']; ?>" width=100></img></td>
                                  <td data-label="Judul"><?php echo $data['judul']; ?></td>
                                  <td data-label="Tanggal Post"><?php echo TanggalIndo($data['tgl']); ?></td>
                                  
                                  <td data-label="Aksi">
                                    <a href="edit_artikel.php?id=<?php echo $data['id']; ?>" class="btn btn-success">Edit</a>
                                    <a href="controller.php?page=artikel&action=delete&id=<?php echo $data['id']; ?>" class="btn btn-danger confirmation">Hapus</a>
                                  </td>
                                </tr>
                              <?php $no++; } ?>
                              
                              </tbody>

                            </table>
          </div>
        </div>
   

    <script type="text/javascript">
    $('.confirmation').on('click', function(e) {
       return confirm('Anda Yakin Menghapus Data Ini?');
    });
</script>

<?php 

    function TanggalIndo($date){
    
          $BulanIndo = array( 
                            "Januari", 
                            "Februari", 
                            "Maret", 
                            "April", 
                            "Mei", 
                            "Juni", 
                            "Juli", 
                            "Agustus", 
                            "September", 
                            "Oktober", 
                            "November", 
                            "Desember"
                            );

          $tahun = substr($date, 0, 4);
          $bulan = substr($date, 5, 2);
          $tgl   = substr($date, 8, 2);

          $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
          return($result);
    
    }

    function tampilhari($date){
        $day = date('D', strtotime($date));
        switch($day){
        case 'Sun':
            $hari_ini = "Minggu";
        break;

        case 'Mon':         
            $hari_ini = "Senin";
        break;

        case 'Tue':
            $hari_ini = "Selasa";
        break;

        case 'Wed':
            $hari_ini = "Rabu";
        break;

        case 'Thu':
            $hari_ini = "Kamis";
        break;

        case 'Fri':
            $hari_ini = "Jumat";
        break;

        case 'Sat':
            $hari_ini = "Sabtu";
        break;
        
        default:
            $hari_ini = "Tidak di ketahui";     
        break;
        }

        return $hari_ini;
    }

?>


<?php include ('template/bottom.php') ?> 