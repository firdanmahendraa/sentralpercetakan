@extends('layouts.master')

@section('title', 'Data Kategori Terhapus')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
          @endif
          <div class="card card-primary card-outline">            
            <div class="card-body">
              <a href="javascript:void(0)" class="btn btn-info btn-sm selectedAll d-none" id="btnRestoreAll"></a>
              <a href="javascript:void(0)" class="btn btn-danger btn-sm selectedAll d-none" id="btnDeleteAll"></a>
              <a href="{{ route('data-kategori.index') }}" class="btn btn-secondary btn-sm float-right mb-2">
                <i class="fa fa-chevron-left"> Back</i>
              </a>
              <table class="table table-head-fixed text-nowrap data-table" style="width: 100%">
                <thead>
                  <tr>
                    <th style="width: 5%">
                      <input type="checkbox" name="main_checkbox"><label></label>
                    </th>
                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($category as $ctg)
                    <tr>
                      <td>
                        <input type="checkbox" name="kategori_checkbox" value="{{ $ctg->id }}">
                      </td>
                      <td>{{ $ctg->kode_kategori }}</td>
                      <td>{{ $ctg->nama_kategori }}</td>
                      <td>
                        <a href="{{ url('data-kategori/restore/'.$ctg->id) }}" class="btn btn-info btn-sm disabled btn-aksi">
                          <i class="fa fa-undo"> Restore</i>
                        </a>
                        <a href="{{ url('data-kategori/delete/'.$ctg->id) }}" class="btn btn-danger btn-sm disabled btn-aksi">
                          <i class="fa fa-trash"> Delete</i>
                        </a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center" style="font-weight: bold; background-color:rgb(236, 236, 236)">Data Kosong</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('js')
  <script>
    //SELECT ALL
    $(document).on('click','input[name="main_checkbox"]', function(){
      if(this.checked){
        $('input[name="kategori_checkbox"]').each(function(){
          this.checked = true;
        });
      }else{
        $('input[name="kategori_checkbox"]').each(function(){
          this.checked = false;
        });
      }
      toggleselectedAll()
    });

    //ACTIVE SELECT ALL WHEN ALL DATA CHACKED
    $(document).on('change','input[name="kategori_checkbox"]', function(){
      if($('input[name="kategori_checkbox"]').length == $('input[name="kategori_checkbox"]:checked').length){
         $('input[name="main_checkbox"]').prop('checked',true);
      }else{
         $('input[name="main_checkbox"]').prop('checked',false);
      }
      toggleselectedAll()
    });

    //SHOW DELETE AND RESTORE BUTTON WHEN CHECKBOX CHECKED
    function toggleselectedAll(){
      if ($('input[name="kategori_checkbox"]:checked').length > 1) {
          $('#btnDeleteAll').text('Delete ('+$('input[name="kategori_checkbox"]:checked').length+') data').removeClass('d-none');
          $('#btnRestoreAll').text('Restore ('+$('input[name="kategori_checkbox"]:checked').length+') data').removeClass('d-none');
      }else{
          $('.selectedAll').addClass('d-none');
      }
    }

    //REMOVE DISABLED CLASS BTN AKSI WHEN KATEGORI ID CHECKED
    $(document).on('click','input[name="kategori_checkbox"]', function(){
      if($('input[name="kategori_checkbox"]:checked').length == 1){
        $('.btn-aksi').removeClass('disabled');
      }else{
        $('.btn-aksi').addClass('disabled');
      }
          
    });

    //
    $(document).on('click','#btnDeleteAll, #btnRestoreAll', function(){
      var checkedCategories = [];
      $('input[name="kategori_checkbox"]:checked').each(function(){
        checkedCategories.push($(this).data('id'));
      });
      alert(checkedCategories);
    });


  </script>
@endsection