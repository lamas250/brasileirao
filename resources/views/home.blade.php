@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h3>Tabela Brasileirão Serie A</h3>
                  <button class="btn btn-success" id="create_record">Inserir Confronto</button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" id="teams_table" style="width: 640px;">
                      <thead>
                        <tr>
                          <th width="6%">#</th>
                          <th width="44%">Posição</th>
                          <th width="8%">PTS</th>
                          <th width="6%">J</th>
                          <th width="6%">V</th>
                          <th width="6%">E</th>
                          <th width="6%">D</th>
                          <th width="6%">GP</th>
                          <th width="6%">GC</th>
                          <th width="6%">SG</th>
                        </tr>
                      </thead>
                    </table>                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" role="dialog" id="formModal">
  <div class="modal-dialog">
    <div class="modal-content" >
      <div class="modal-header">
        <h4 class="modal-title">Inserir Confronto</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <span id="form_result"></span>
        <form method="POST" id="modal_form">
          @csrf
          <div class="columns">
            <div class="form-group col-md-5">
              <label >
                Time da Casa
              </label>
              <select class="form-control" name="home_team">
                <option>Selecione ...</option>
              </select>
              <label></label>
              <input type="number" name="home_goals" class="form-group">
            </div>
            <div >
              <h3>X</h3>
              <label>Gols</label>
            </div>
            <div class="form-group col-md-5">
              <label>
                Time Visitante
              </label>
              <select class="form-control" name="guest_team">
                <option>Selecione ...</option>
              </select>
              <label></label>
              <input type="number" name="guest_goals" class="form-group">
            </div>
          </div>
          <div class="form-group text-right">
            <input type="submit" name="action_button" id="action_button" class="btn btn-danger" value="Fechar">
            <input type="submit" name="action_button" id="action_button" class="btn btn-info" value="Salvar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@section('script')
<script>
  $(document).ready(function(){
    $('#teams_table').DataTable({
      processing: true,
      serverSide: true,
      paging:   false,
      info:     false,
      searching: false,
      order: false,
      aoColumnDefs: [
        { bSortable: false, aTargets: [ "_all" ] }
      ],
      ajax: {
        url: "{{ route('home') }}"
      },
      columns: [
        {
          data: null,
          className: "tab-1",
          "render": function ( data, type, full, meta ) {
            return  meta.row + 1;
          }
        },
        {data: 'title' },
        {data: 'points'},
        {data: 'played'},
        {data: 'won'},
        {data: 'draw'},
        {data: 'lost'},
        {data: 'goals_for'},
        {data: 'goals_against'},
        {data: 'goal_difference'},
      ],
      createdRow: function( row, data, dataIndex){
          if( dataIndex >= 1 && dataIndex <= 6){
              $(row).css('background-color', 'rgb(224, 222, 153)');
          }
          else if( dataIndex >= 7 && dataIndex <= 13 ){
              $(row).css('background-color', 'rgb(198, 179, 237)');
          }
          else if( dataIndex>= 16){
              $(row).css('background-color', 'rgb(196, 137, 150)');
          }
      }
    });
  });

  $('#create_record').click(function(){
    $('#formModal').modal('show');
    $ajax({
      url: "{{ route('get.teams',) }}"
    })
  });

  $('modal_form').on('submit', function(event){
    event.preventDefault();

    // $.ajax({
    //   url: "{{ route('store.match') }}",
    //   method: "POST",
    //   data: new FormData(this),
    //   contentType: false,
    //   cache: false,
    //   processData: false,
    //   dataType: "json",
    //   success: function(data){
    //     var html = '';
    //     if(data.errors){
    //       html = '<div class="alrt alert-danger">';
    //       for(var count = 0; count < data.errors.length; count++){
    //         html += '<p>' + data.errors[count] + '</p>';
    //       }
    //       html += '</div>';
    //     }
    //     if(data.success){
    //       html = '<div class="alert alert-success">' + data.success + '</div>';
    //       $('#modal_form')[0].reset();
    //       $('#teams_table').DataTable().ajax.reload();
    //     }
    //     $('#form_result').html(html);
    //   }
    // })
  })
</script>
@endsection