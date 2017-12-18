<?php
require_once "../lib/settings.php";
require_once "../lib/function.php";


$nama = anti_sql_injection($con,$_POST['nama']);
$jam1 = $_POST['jam1'];
$jam2 = $_POST['jam2'];
$harga = anti_sql_injection($con,$_POST['harga']);
$id_ged = $_POST['id_ged'];
$index=0;
 $jam=$jam1."-".$jam2;
         $id_lap = $id_ged.$index;
          while(mliNumR($con,"*","lapangans","where id_lapangan='$id_lap'") === 1){
            $index++;
            $id_lap = $id_ged.$index;
          }
if(mliNumR($con,"*","lapangans","where nama='$nama'")===0){
        if(mliInsert($con,"lapangans",
            "id_lapangan, id_gedung, nama,jam_lapangan, harga",
            "'$id_lap', '$id_ged', '$nama','$jam',$harga")){

             echo "ok";
                 //header('location:login.php');
        }else{
          echo "gagal";
        }
      }else {
        echo "gagal";
      }
