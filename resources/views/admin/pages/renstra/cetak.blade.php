<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12"> 
            <div class="box">
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead style="background-color: #428bca;" id="thead">
                            <tr>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">No</th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">Tujuan</th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">Sasaran</th>
                                <th style="color: #ffffff; text-align: center;" rowspan="2">Indikator Kinerja</th>
                                <th style="color: #ffffff; text-align: center; border-bottom: solid #fff 0px; border-right: solid #fff 0px;" colspan="5">Target</th>
                            </tr>
                            <tr id="head-target">
                                
                            </tr>
                        </thead>
                        <tbody id="tabeldata">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- jQuery 3 -->
<script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>

<script>
    $(document).ready(function() {

        showData();

        function showData() {
            $.ajax({
                url: 'http://esakip.test/input/cetakPreviewRenstra/?tahun_awal=' +tahun_awal+ '&tahun_akhir=' +tahun_akhir+ '&opd='+opd,
                type: 'GET',
                dataType: 'json',
                success: function(response) {                    
                    $.each(response.data, function(i, value){
                        var tr = "<tr></tr>";
                            tr += "<td>" + parseInt(i + 1) + "</td>";
                            tr += "<td>" + value.deskripsi + "</td>";

                        var sasaran = '';
                        
                        $.each(value.data_layout, function(i, value_layout) {
                            // console.log(value_layout.id); 
                            if(sasaran == value_layout.sasaran_id) {
                                tr += "<td></td>";
                            } else {
                                tr += "<td>" + value_layout.data_sasaran.deskripsi + "</td>";
                            }                          
                            
                            tr += "<td>" + value_layout.data_indikator.deskripsi + "</td>";
                            
                            var isLastElement = i == value.data_layout.length -1;

                            if (isLastElement) {                                
                                for(a = 0; a < value_layout.data_target.length; a++) {
                                    var b = value_layout.data_target[a];
                                    tr += "<td>" + b.nilai + "</td>";
                                }
                                tr +=   "</tr>";
                            } else {
                                for(a = 0; a < value_layout.data_target.length; a++) {
                                    var b = value_layout.data_target[a];
                                    tr += "<td>" + b.nilai + "</td>";
                                }
                                tr +=   "</tr><td></td><td></td>";
                            }

                            sasaran = value_layout.sasaran_id;
                        });

                        $('#tabeldata').append(tr);
                    });
                }
            });
        }
    });
</script>