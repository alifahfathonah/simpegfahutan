<section class="page container">
        <div class="row">
            <div class="span6">
                <div class="box">
                    <div class="box-header">
                        <i class="icon-list"></i>
                        <h5>Form Isi Pengumuman</h5>
                    </div>
                    <div class="box-content">
                        <form class="form-inline" action="<?php echo base_url('pengumuman/add'); ?>" method="POST">                      
                            <p>Judul Pengumuman</p>
                            <div class="input-prepend">
                                <textarea name="judulpengumuman" class="form-control span5" rows="3"></textarea>
                            </div>
                            <p>Kategori Pengumuman</p>
                            <div class="input-prepend"> 
                                <select name="kategori">
                                    <option value="">-- Pilih Salah Satu --</option>
                                    <option value="peraturan">Peraturan</option>
                                    <option value="umum">Umum</option>
                                </select>
                            </div>
                            <p>File Pengumuman</p>
                            <div class="input-prepend">
                            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone/dropzone.min.css') ?>">
                            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dropzone/basic.min.css') ?>">

                            <script type="text/javascript" src="<?php echo base_url('assets/dropzone/jquery.js') ?>"></script>
                            <script type="text/javascript" src="<?php echo base_url('assets/dropzone/dropzone.min.js') ?>"></script>
                            <div class="dropzone">
                                <div class="dz-message">
                                    <h4> Klik atau Drop File disini</h4><h6>Maksimal 2 MB</h6>
                                </div>
                            </div>
                            <script type="text/javascript">
                                Dropzone.autoDiscover = false;
                                var foto_upload= new Dropzone(".dropzone",{
                                url: "<?php echo base_url('pengumuman/upload/')?>",
                                method:"post",
                                acceptedFiles:"image/jpeg, image/png, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                                paramName:"userfile",
                                dictInvalidFileType:"Type file ini tidak dizinkan",
                                addRemoveLinks:true,
                                });
                               
                            </script>
                            <div class="input-prepend">
                                <br>
                                <button name="btnSave" type="submit" class="btn btn-success">
                                <i class="icon-save"></i>
                                    Simpan
                                </button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="span10">
                <div class="box">
                    <div class="box-header">
                        <i class="icon-list"></i>
                        <h5>Tabel Pengumuman</h5>
                    </div>
                    <div class="box-content">
                        <table class="table table-hover tablesorter">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul</th>
                                    <th>URL</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1;
                            foreach($pengumuman as $r_pengumuman){ ?>
                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $r_pengumuman['judul']; ?></td>
                                    <td><?php echo $r_pengumuman['url']; ?></td>
                                    <td class="td-actions">
                                        <a href="" data-id="<?php echo $r_pengumuman['id'];?>" class="hapus btn btn-small btn-danger">
                                            <i class="btn-icon-only icon-remove"> </i>
                                        </a>
                                        
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                        <div class="box-footer">
                            <?php echo $this->pagination->create_links(); ?>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $(".hapus").click(function() {
        var jawab = confirm("Apakah anda yakin akan menghapus ?");
        if (jawab === true){
            var hapus = false;
            if (!hapus) {
                hapus = true;
                $.post('<?php echo base_url('pengumuman/delete/')?>',{id: $(this).attr('data-id')},
                function(data){
                    alert(data);
                });
                hapus = false;
            }
        } else {
            return false;
        }
    })
</script>