<div class="card">
	<div class="header">
		<div class="tieude" style="text-align: center;margin-bottom:30px" >
			<h3>Form dữ liệu quan trắc chất lượng môi trường Khí</h3>
		</div>
	</div>
	<div class="content table-responsive">
		<table id="form-aqi" class="table table-bordered table-striped" style="height: 250px;">
			<thead>
				<tr class="warning">
					<th>TenTram</th>
					<th>X</th>
					<th>Y</th>
					<th>Thoigian</th>
					<th>SO2</th>
					<th>CO</th>
					<th>NO2</th>
					<th>O3</th>
					<th>TSP</th>
					<th>PM10</th>
					<th>PM2.5</th>
					<th>Pb</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>   
			</tbody>
		</table>     
	</div>
	<div style="text-align: center; padding-bottom: 50px">
		<input class="btn btn-primary" type="submit" value="Tải về" name="btn-downloadform" id="btn-downloadform">
	</div>
</div>
<script type="text/javascript" src="js/jquery.table2excel.js"></script>
        <script type="text/javascript">
            $("#btn-downloadform").click(function(){
                    $("#form-aqi").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "AQI_Ten_ThoiGian",
                        fileext: ".xls"
                    });
                });
        </script>
            