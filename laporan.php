  <?php
include "config/koneksi.php";
include "fungsi.php";
?>       
           <br><br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>Nis</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Asal Sekolah</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                    $sql = mysqli_query($con,"SELECT * FROM datsis");
                    while ($row_edit = mysqli_fetch_array($sql)){
                   ?>
                    <tr>
                      <td><?php echo $row_edit['nis']?></td>
                      <td><?php echo $row_edit['nama']?></td>
                      <td><?php echo $row_edit['jk']?></td>
                      <td><?php echo $row_edit['temp_lahir']?></td>
                      <td><?php echo $row_edit['tgl_lahir']?></td>
                      <td><?php echo $row_edit['alamat']?></td>
                      <td><?php echo $row_edit['asal_sklh']?></td>
                      <td><?php echo $row_edit['kls']?></td>
                      <td><?php echo $row_edit['jurusan']?></td>
                      <td>
                        <td><a href="?menu=datsis&edit&nis=<?php echo $row_edit['nis']?>">EDIT</a></td>
                        <td><a href="?menu=datsis&delete&nis=<?php echo $row_edit['nis']?>"onClick="return confirm('Apakah anda yakin akan menghapus ini?')">HAPUS</a></td>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>