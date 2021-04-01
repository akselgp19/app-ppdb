  <?php
include "config/koneksi.php";
include "fungsi.php";
if(isset($_POST['simpan'])){
  $sql = mysqli_query($con,"INSERT INTO datsis(nis,nama,jk,temp_lahir,tgl_lahir,alamat,asal_sklh,kls,jurusan) VALUES ('$_POST[nis]','$_POST[nama]','$_POST[jk]','$_POST[temp_lahir]','$_POST[tgl_lahir]','$_POST[alamat]','$_POST[asal_sklh]','$_POST[kls]','$_POST[jurusan]')");

  $eksekusi = mysqli_query($con, $sql);
  echo "<script>alert('Berhasil tersimpan');document.location.href='?menu=datsis'</script>";
}
  // ini untuk opsi delete hapus

        if(isset($_GET['edit'])){
            $sql = mysqli_query($con,"SELECT * FROM datsis WHERE nis ='$_GET[nis]'");
            $row_edit = mysqli_fetch_array($sql);
        }else{
            $row_edit=null;
        }
         if(isset($_POST['update'])){
             $sql = mysqli_query($con,"UPDATE datsis SET nis = '$_POST[nis]', nama = '$_POST[nama]', jk = '$_POST[jk]', temp_lahir = '$_POST[temp_lahir]', tgl_lahir = '$_POST[tgl_lahir]',alamat = '$_POST[alamat]', asal_sklh = '$_POST[asal_sklh]',kls = '$_POST[kls]', jurusan = '$_POST[jurusan]' WHERE nis = '$_GET[nis]'");
              if($sql){
                echo "<script>alert('data berhasil diupdate');
                document.location.href= '?menu=datsis'</script>";
            }
            else{
                echo "<script>alert('data gagal diupdate');
                document.location.href= '?menu=datsis'</script>";
            }
          }
?>        
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Pendaftaran Data Siswa</h6>
            </div>
            <div class="card-body">
            <form method="post" name="form">
            <div class="form-group">
                <div class="row">
                  
                  <input type="number" id="nis" name="nis"  value="<?php echo $row_edit['nis'];?>" class="form-control" placeholder="Masukan nis" required="required">

                  <input type="text" id="nama"  name="nama"  value="<?php echo $row_edit['nama'];?>" class="form-control" placeholder="Masukan Nama" required="required">

                  <select name="jk" class="form-control" required="required">
                        <option value="">-Pilih Jenis Kelamin-</option>
                        <option value=laki-laki>laki-laki</option>
                        <option value=perempuan>perempuan</option>
                    </select>
                    
                  <input type="text" id="temp_lahir" name="temp_lahir" value="<?php echo $row_edit['temp_lahir'];?>" class="form-control" placeholder="Masukan Tempat Lahir" required="required"> 

                  <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?php echo $row_edit['tgl_lahir'];?>" class="form-control" placeholder="Pilih Tanggal Lahir" required="required"> 

                  <input type="text" id="alamat" name="alamat" value="<?php echo $row_edit['alamat'];?>" class="form-control" placeholder="Masukan Alamat" required="required"> 

                  <input type="text" id="asal_sklh" name="asal_sklh" value="<?php echo $row_edit['asal_sklh'];?>" class="form-control" placeholder="asal Sekolah" required="required"> 

                  <select name="kls" class="form-control" required="required">
                        <option value="">-Pilih Kelas-</option>
                        <option value=9>IX</option>
                        <option value=8>VIII</option>
                        <option value=7>VII</option>
                    </select>

                  <input type="text" id="jurusan" name="jurusan" value="<?php echo $row_edit['jurusan'];?>" class="form-control" placeholder="Jurusan" required="required"> 
                </div>
            </div>
               <?php
          if(isset ($_GET['edit'])){
            ?>
            <button type="submit" name="update" class="btn btn-primary" value="update"> Update</button>
            <td><a href="?menu=datasatuan">Batal</a></td>
            <?php
          }else{
            ?>
            <td><a href="?menu=datsis&simpan&id=<?php echo $row_edit['id']?>"onClick="return confirm('Apakah data sudah benar? mohon di cek kembali')"><input type="submit" name="simpan" value="simpan"></a></td>
            <?php
          }
        ?>
            </form>
          </div>