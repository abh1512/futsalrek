<!--?php
/* Ambil Id gedung yang dipegang penaggung jawab pada session ini

  $er2="SELECT id_gedung from pegawais where no_ktp='$_SESSION[id_pengguna]'";
  $data2=mliSelect(mysqli_query($con,$er2));*/
 ?-->
<div class="row no-m-t no-m-b">
      <div class="col s12 m12 l4">
          <div class="card stats-card">
              <div class="card-content">
                  <!--?php/* mengambil jumlah row pada tabel lapangan
                  $er="SELECT COUNT(*) as jumlah from lapangan where id_gedung='$data2->id_gedung'";
                  $data=mliSelect(mysqli_query($con,$er));*/
                   ?-->
                  <span class="card-title">Lapangan</span>
                  <span class="stats-counter"><!--?//=$data->jumlah?--></span>
              </div>
              <div id="sparkline-bar"></div>
          </div>
      </div>
          <div class="col s12 m12 l4">
          <div class="card stats-card">
              <div class="card-content">
                  <span class="card-title">Pelanggan</span>
                  <span class="stats-counter"><span class="counter">83710</span><small>This month</small></span>
              </div>
              <div id="sparkline-line"></div>
          </div>
      </div>
      <div class="col s12 m12 l4">
        <!--?php/* mengambil jumlah row pada tabel lapangan
        $er3="SELECT COUNT(*) as jumlah FROM gedungs as g inner JOIN lapangans s on s.id_gedung=g.id_gedung
        INNER JOIN detil_transaksis d on d.id_lapangan=s.id_lapangan WHERE g.id_gedung='$data2->id_gedung'";
        $data3=mliSelect(mysqli_query($con,$er3));*/
         ?-->
          <div class="card stats-card">
              <div class="card-content">
                  <span class="card-title">Transaksi</span>
                  <span class="stats-counter"><!--?//=$data3->jumlah?--></span>
              </div>
              <div id="sparkline-bar"></div>
          </div>
      </div>
  </div>
