<?php include('template/top.php') ?>
    

<link rel="stylesheet" type="text/css" href="assets/datepicker/bootstrap-datetimepicker.min.css">


<script src="https://sinovik.menpan.go.id/library/ckeditor/ckeditor.js"></script>


<form action="controller.php?page=artikel&action=insert" id="form_proposal" enctype="multipart/form-data" method="post">

    <section class="mbr-section mbr-section-hero mbr-section-full mbr-after-navbar" id="header1-1" style="background-color: rgb(255, 255, 255);">
        <div class="mbr-table-cell">



            <div class="container">


                            
                <div class="row">

                    <div class="mbr-section col-md-12 col-lg-offset-4 col-lg-8 col-xl-offset-0 col-xl-12" id="ringkasan" style="padding-bottom: 0px !important;">
                        <h4 class="mbr-section-title display-3">TAMBAH ARTIKEL</h4>

                        <hr>



                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Judul Artikel:</label>
                                        <input type="text" class="form-control" name="judul" placeholder="Judul Artikel.." required>
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
                                        <input type="date" class="form-control tanggal" name="tgl" placeholder="Tanggal Artikel.."  data-link-format="yyyy-mm-dd" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <br>

                        <div class="mbr-section-text">
                            <div class='row'>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label style="font-weight: bold;">Foto Utama Artikel:</label>
                                        <input type="file" class="form-control" name="foto" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <br>

                        <div class="mbr-section-text">

                            <div class="form-group">

                            <textarea name="content" id="input_1" required></textarea>

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