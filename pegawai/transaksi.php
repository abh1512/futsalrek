<div class="row">
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">DATA MAHASISWA</span><br>
                                <table id="example" class="display responsive-table highlight">
                                    <thead>
                                        <tr>
                                            <th>ID Transaksi</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Lapangan</th>
                                            <th>Tanggal</th>
                                            <th>Jam Mulai</th>
                                            <th>Lama Sewa</th>
                                            <th>Biaya</th>
                                            <th>Bukti</th>
                                            <th>Verifikasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                    /*  $er=mysqli_query($con,"SELECT id_pengguna,nama_pengguna,email,nama_prodi,jurusan,jabatan,hak_akses,status
                                          from tbl_pendaftaran inner join tbl_pengguna on id_pengguna=nim inner join prodi on id=prodi where hak_akses=7");
                                      while($r=mliSelect($er)){
                                        ?>
                                        <tr>
                                            <td><input type="hidden" name='id_unesa' value="<?=$r->id_pengguna?>"><?=$r->id_pengguna?></td>
                                            <td><input type="hidden" name='nama' value="<?=$r->nama_pengguna?>"><?=$r->nama_pengguna?></td>
                                            <td><input type="hidden" name='prodi' value="<?=$r->nama_prodi?>"><?=$r->nama_prodi?></td>
                                            <td><input type="hidden" name='status' value="<?=$r->status?>"><?=$r->status?></td>
                                        </tr>
                                        <?php } */?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
<?php
//load setelah jquery telah diload di index.php
  $loadAfterJQuery='
  <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/pages/table-data.js"></script>
'?>
