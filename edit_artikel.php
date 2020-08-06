<?php include('template/top.php') ?>
    

<link rel="stylesheet" type="text/css" href="assets/datepicker/bootstrap-datetimepicker.min.css">


<script src="ckeditor/ckeditor.js"></script>


<form action="controller.php?page=artikel&action=update" id="form_proposal" enctype="multipart/form-data" method="post">

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">


            <?php
                $id = $_GET['id'];
                $dt = mysqli_query($mysqli, "SELECT * FROM tb_artikel WHERE id = $id");
                $data = mysqli_fetch_array($dt);
            ?>

            <div class="container">


                            
                <div class="row">

                    <div class="mbr-section col-md-12 col-lg-offset-4 col-lg-8 col-xl-offset-0 col-xl-12" id="ringkasan" style="padding-bottom: 0px !important;">
                        <h4 class="mbr-section-title display-3">EDIT ARTIKEL</h4>

                        <hr>

                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Judul Artikel:</label>
                                        <input type="text" class="form-control" name="judul" placeholder="Judul Artikel.." value="<?php echo $data['judul']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <br>




                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Tanggal Artikel:</label>
                                        <input type="date" class="form-control tanggal" name="tgl" placeholder="Tanggal Artikel.."  data-link-format="yyyy-mm-dd" value="<?php echo $data['tgl']; ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <br>


                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Upload Ulang Foto Utama Artikel (Kosongkan Jika Tidak Di Ubah):</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                            </div>
                        </div>
                         <br>

                        <div class="mbr-section-text">

                            <div class="form-group">

                            <textarea name="content" id="input_1" required><?php echo $data['content']; ?></textarea>

                            </div>
                            <script>
                                var editor = CKEDITOR.replace( 'input_1', {
                                        height: 400,
                                        wordcount: {
                                            maxWordCount: 1300,
                                        },
                                        title: 'Rich Text Editor'
                                    } );    
                                editor.on( 'change', function( evt ) { $('#input_1').val(evt.editor.getData()); }); 
                            </script>
                            


                            <div class="row">
                                <div class="col-lg-12 text-xs-right">
                                    <a class="btn btn-lg btn-info-outline" href="artikel.php"><span class="fa fa-backward"></span> KEMBALI </a>
                                    <button type="submit" name="simpan" class="btn btn-lg btn-primary">Simpan&nbsp;<span class="fa fa-save"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    





                </div>
            </div>
        </div>
    </section>
</form>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="assets/datepicker/bootstrap-datetimepicker.min.js"></script>

<script type="text/javascript">


    $('.tanggal').datetimepicker({
         Default:false,
         language:  'fr',
         viewMode: 'months',
         todayBtn:  1,
         autoclose: 1,
         todayHighlight: 1,
         startView: 4,
         minView: 2,
         forceParse: 0,
        format: 'yyyy-mm-dd'
    });
    
</script>

<?php include('template/bottom.php'); ?>