<div class="col-sm-9 col-xs-offset-3">  
	<h2 class="text-center">DETAIL PENILAIAN PEGAWAI</h2> 
	<div class="panel-group" >
		<div class="panel panel-default" style="padding:10px" >
            <br/>
			<?php
        //$id_jabatan=$_GET['id_jabatan'];
		$sql_data="SELECT A.no_pegawai, A.nama, B.jabatan, C.nama_toko, D.tgl_penilaian, E.bagian
				FROM pegawai A, jabatan_pegawai B, toko C, penilaian D, bagian E
				WHERE A.no_pegawai=B.id_pegawai
				AND C.id_toko=B.id_toko
				AND B.id_jabatan=D.id_jabatan
				AND E.id_bagian=B.id_bagian
				AND B.id_jabatan='5'";
		$hasil_data=mysqli_query($db_link,$sql_data);
		$data=mysqli_fetch_assoc($hasil_data);
			?>
		<table>
			<tr>
				<td width="100">No Pegawai</td>
				<td width="20">:</td>
				<td><?php echo $data['no_pegawai']; ?></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td><?php echo $data['nama']; ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo $data['jabatan']; ?></td>
			</tr>
			<tr>
				<td>Jabatan</td>
				<td>:</td>
				<td><?php echo $data['bagian']; ?></td>
			</tr>
			<tr>
				<td>Toko</td>
				<td>:</td>
				<td><?php echo $data['nama_toko']; ?></td>
			</tr>
			<tr>
				<td>Periode</td>
				<td>:</td>
				<td><?php echo $data['tgl_penilaian']; ?></td>
			</tr>
		</table>
<?php

$sql_kriteria="SELECT id_kriteria,nama_kriteria FROM kriteria ORDER BY id_kriteria";
$hasil_kriteria=mysqli_query($db_link,$sql_kriteria);

//$id_jabatan=$_GET['id_jabatan'];
$sql_penilaian="SELECT B.id_jabatan, A.nilai FROM penilaian A 
				INNER JOIN jabatan_pegawai B ON A.id_jabatan=B.id_jabatan
				WHERE B.id_jabatan='5' ";
$hasil_nilai=mysqli_query($db_link,$sql_penilaian);

        echo '<table class="table table-bordered table-hover text-center panel panel-primary" >
                    
                <thead class="panel-heading">
                <tr>
                    <th class="text-center col-sm-1" style="vertical-align: middle;">NO</th>
                    <th class="text-center col-sm-5" style="vertical-align: middle;">KRITERIA</th>
                    <th class="text-center col-sm-4" style="vertical-align: middle;">NILAI</th>
					
                </tr>';
				 echo '  </thead>
				<tbody> ';
		$s=1;
        $kriteriaarray=array();
            while($data_kriteria=mysqli_fetch_assoc($hasil_kriteria)){
                echo "
                <tr>
					<td>".$s++."</td>
					<td>".$data_kriteria['nama_kriteria']."</td>";
			            
				$data_nilai=mysqli_fetch_assoc($hasil_nilai);
					echo "<td>".$data_nilai['nilai']."</td>";
					
				echo"</tr>";
            }
			
 echo "</tbody></table>";
?>