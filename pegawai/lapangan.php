<?php
// Ambil Id gedung yang dipegang penaggung jawab pada session ini $_SESSION[id_pengguna]

  $er2="SELECT id_gedung from pegawais where no_ktp='123456789'";
  $data2=mliSelect(mysqli_query($con,$er2));
 ?>
<div class="row no-m-t no-m-b">
      <div class="col s12 m12 l4">
          <div class="card stats-card">
              <div class="card-content">
                  <span class="card-title">LAPANGAN</span>
                  <a class="waves-effect waves-light material-icons modal-trigger" href="#modal1">library_add</a>
              </div>
              <div id="sparkline-line"></div>
          </div>
      </div>
      <!--div class="col s12 m12 l4">
          <div class="card stats-card">
              <div class="card-content">

                  <span class="card-title">FASILITAS</span>
				<a class="waves-effect waves-light material-icons modal-trigger" href="#modal2">library_add</a>
              </div>
              <div id="sparkline-line"></div>
          </div>
      </div-->


	<!--Modal 1-->
	<div id="modal1" class="modal modal-fixed-footer">
		<div class="modal-content">
      <div class="row">
        <h4>Lapangan</h4>
        <div class="input-field col s12">
            <input id="nama" type="text">
            <label class="active" for="nama">Nama Lapangan</label>
        </div>
        <div class="input-field col s12">
            <select class="js-states browser-default" tabindex="-1" style="width: 100%" id="jam1" name="jam_selesai">
              <option disabled selected>Pilih Jam Mulai Lapangan</option>
                <option value="07:00">07:00</option>
                <option value="08:00">08:00</option>
                <option value="09:00">09:00</option>
                <option value="10:00">10:00</option>
                <option value="11:00">11:00</option>
                <option value="12:00">12:00</option>
                <option value="13:00">13:00</option>
                <option value="14:00">14:00</option>
                <option value="15:00">15:00</option>
                <option value="16:00">16:00</option>
                <option value="17:00">17:00</option>
                <option value="18:00">18:00</option>
                <option value="19:00">19:00</option>
                <option value="20:00">20:00</option>
                <option value="21:00">21:00</option>
                <option value="22:00">22:00</option>
                <option value="23:00">23:00</option>
                <option value="24:00">24:00</option>
            </select>
          </div>
          <div class="input-field col s12">
              <select class="js-states browser-default" tabindex="-1" style="width: 100%" id="jam2" name="jam_selesai">
                <option disabled selected>Pilih Jam Selesai Lapangan</option>
                  <option value="07:00">07:00</option>
                  <option value="08:00">08:00</option>
                  <option value="09:00">09:00</option>
                  <option value="10:00">10:00</option>
                  <option value="11:00">11:00</option>
                  <option value="12:00">12:00</option>
                  <option value="13:00">13:00</option>
                  <option value="14:00">14:00</option>
                  <option value="15:00">15:00</option>
                  <option value="16:00">16:00</option>
                  <option value="17:00">17:00</option>
                  <option value="18:00">18:00</option>
                  <option value="19:00">19:00</option>
                  <option value="20:00">20:00</option>
                  <option value="21:00">21:00</option>
                  <option value="22:00">22:00</option>
                  <option value="23:00">23:00</option>
                  <option value="24:00">24:00</option>
              </select>
            </div>
        <div class="input-field col s12">
            <input id="harga" type="text">
            <label class="active" for="nama">Harga</label>
        </div>
      </div>
		</div>
		<div class="modal-footer">
		<a class=" modal-action modal-close waves-effect waves-green btn-flat submit" id="<?=$data2->id_gedung?>">Simpan</a>
		<a class=" modal-action modal-close waves-effect waves-red btn-flat">Close</a>

		</div>
	</div>

	<!--Modal 2>
	<div id="modal2" class="modal modal-fixed-footer">
		<div class="modal-content">
			<h4>Fasilitas</h4>
			<div class="input-field col s12">
			  <textarea id="textarea1" class="materialize-textarea"></textarea>
			  <label for="textarea1">Deskripsi</label>
			</div>
		</div>
		<div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
		<a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat">Close</a>
		</div>
	</div-->


      <div class="col s12">
          <p>Lapangan</p>
				<div class="card">
          <div class="card-content">
              <table class="bordered">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>Id Lapangan</th>
                      <th>Nama lapangan</th>
											<th>Jam Mulai</th>
											<th>Jam Selesai</th>
											<th>Harga</th>
											<th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                      $er=mysqli_query($con,"SELECT l.id_lapangan,l.nama,l.jam_lapangan,l.harga
                        from lapangans as l inner join gedungs on gedungs.id_gedung=l.id_gedung
                        where gedungs.id_gedung='$data2->id_gedung'");
                        $no=1;
                        while($r=mliSelect($er)){
                          $jam1 = substr($r->jam_lapangan, 0,5);
                          $jam2 = substr($r->jam_lapangan, 6,5);
                          ?>
                          <tr>
                            <td><input type="hidden"  value="<?=$no?>"><?=$no?></td>
                            <td><input type="hidden"  value="<?=$r->id_lapangan?>"><?=$r->id_lapangan?></td>
                            <td><input type="hidden"  value="<?=$r->nama?>"><?=$r->nama?></td>
                            <td><input type="hidden"  value="<?$jam1?>"><?=$jam1?></td>
                            <td><input type="hidden"  value="<?=$jam2?>"><?=$jam2?></td>
                            <td><input type="hidden"  value="<?=$r->harga?>"><?=$r->harga?></td>
                            <td><a class="small material-icons" href="#">edit</a><a class="small material-icons delete" href="#" id="id_lapangan">delete</a></td>
                          </tr>
                        <?php $no++;}?>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>

      </div>
	  <!--div class="col s5">
          <p>Fasilitas</p>
				<div class="card">
                            <div class="card-content">
                                <table class="bordered">
                                    <thead>
                                        <tr>
                                            <th>Deskripsi</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ini Deskripsi Fasilitas</td>
                                            <td><a class="small material-icons" href="#">edit</a><a class="small material-icons" href="#">delete</a></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

      </div>
        <hr></hr><br></br>
  </div-->

  <?php
//load setelah jquery telah diload di index.php
  $loadAfterJQuery='
  <script src="../assets/plugins/select2/js/select2.min.js"></script>
  <script src="../assets/js/pages/form-select2.js"></script>
  <script src="../assets/plugins/google-code-prettify/prettify.js"></script>
  <script src="../assets/js/pages/ui-modals.js"></script>
  <script src="../assets/plugins/google-code-prettify/prettify.js"></script>
  <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
  <script>
  $(".submit").click(function(){
    var nama = $("#nama").val();
    var jam1 = $("#jam1").val();
    var jam2 = $("#jam2").val();
    var harga = $("#harga").val();
    var id_ged= $(this).attr("id");;
    $.ajax({
           url : "submit.php",
           type: "post",
           data: "nama="+nama+"&jam1="+jam1+"&jam2="+jam2+"&harga="+harga+"&id_ged="+id_ged,
           success:function(data){
			     if(data == "ok"){
             swal({
                title: "SUKSES!",
                text: "Data Berhasil Di Submit!",
                type: "success",
                confirmButtonText: "OK",
                closeOnConfirm: false
            }, function(){
                window.location.reload();
            });
            }
            else
            {
              console.log("gagal");
            }
          }
         });
  });

  $(".delete").click(function(){
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this imaginary file!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
  }, function(isConfirm){
      if (isConfirm) {
          swal("Deleted!", "Your imaginary file has been deleted.", "success");
      } else {
          swal("Cancelled", "Your imaginary file is safe :)", "error");
      }
  });
});
  </script>';
  ?>
