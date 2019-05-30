@php
    $prev_tujuan = '';
    $prev_sasaran = '';
@endphp
@foreach ($rpjmds as $key => $value)
    <tr>
        <td>
            @if ($prev_tujuan == $value->tujuan)
                
            @else
                {{ $value->tujuan }}
            @endif
        </td>
        <td>
            @if ($prev_sasaran == $value->sasaran)
                
            @else
                {{ $value->sasaran }}
            @endif
        </td>
        <td>{{ $value->indikator_kinerja }}</td>
        @foreach ($value->data_target as $item)
            <td style="text-align: right">{{ $item->nilai }} %</td>
        @endforeach
        <td style="width: 80px;">
            <div class="col-xs-6" style="padding-right: 5px; padding-left: 0;">
                    <a
                    href="{{ route('rpjmd.edit', ['id' => $value->id]) }}"
                    class="btn btn-info btn-sm btn-block"
                    > <i class="fa fa-edit"></i> </a>
            </div>
            <div class="col-xs-6" style="padding-right: 5px; padding-left: 0;">
                <button
                    data-id="{{ $value->id }}"
                    class="btn btn-danger btn-sm btn-block btn-delete">
                    <i class="fa fa-trash"></i>
                </button>                               
            </div>
        </td>
    </tr>
    {{ $prev_tujuan = $value->tujuan }}
    {{ $prev_sasaran = $value->sasaran }}
@endforeach

        <!-- jQuery 3 -->
        <script src="{{ asset('adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script>
    $(".btn-delete").click(function(){
        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
    
        $.ajax(
        {
            url: "rpjmd/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (){
                $.get("{{ URL::to('input/rpjmd/show') }}", function(data) {
                    // console.log(data);
                    $('#tabeldata').empty().html(data); 
                });
            }
        });
    });
</script>