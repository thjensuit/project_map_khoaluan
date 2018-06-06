             <div class="card">
                <div class="header">
                    <div class="tieude" style="text-align: center;margin-bottom:30px" >
                        <h3>Form dữ liệu quan trắc chất lượng môi trường nước</h3>
                    </div>
                </div>
                <div class="content table-responsive">
                    <table class="table table-bordered table-striped" id="form-wqi" style="height: 250px;">
                     <thead>
                        <tr class="warning">
                            <th>TenTram</th>
                            <th>X</th>
                            <th>Y</th>
                            <th>Thoigian</th>
                            <th>Nhietdo</th>
                            <th>BOD</th>
                            <th>COD</th>
                            <th>N-NH4+</th>
                            <th>P-PO3-</th>
                            <th>TSS</th>
                            <th>DO</th>
                            <th>PH</th>
                            <th>Coliform</th>
                            <th>Doduc</th>  
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
                            <td></td>
                            <td></td>
                        </tr>  
                    </tbody>
                </table>    
            </div>
        </div>
         <div style="text-align: center; margin-bottom: 20px">
                <button class="btn btn-primary" id="btn_downloadform">Tải về</button>
        </div> 
        <script type="text/javascript" src="js/jquery.table2excel.js"></script>
        <script type="text/javascript">
            $("#btn_downloadform").click(function(){
                    $("#form-wqi").table2excel({
                        exclude: ".noExl",
                        name: "Excel Document Name",
                        filename: "WQI_Ten_ThoiGian",
                        fileext: ".xls"
                    });
                });
        </script>