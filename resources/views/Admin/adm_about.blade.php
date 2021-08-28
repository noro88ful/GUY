@extends('Admin/adminUI')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/assets/css/admin.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
@section('main')
<div class="main-content-inner">
	<table id="About" tblName="About" class="table table-striped table-dark table-bordered" style="width: 100%">
		<thead>
				<tr>
					<th scope="col" fname="topic">Վերնագիր</th>
					<th scope="col" fname="title">Ենթավերնագիր</th>
					<th scope="col" fname="image">Նկար</th>
					<th scope="col" fname="text" style="display:none">Տեքստ</th>
					<th scope="col">Խմբագրել</th>
				</tr>
		</thead>
		<tbody>
				@foreach($abouts as $index)
				<tr class='request_tr' trID="{{$index->id}}">
					<td fvalue="{{$index->topic}}">{{$index->topic}}</td>
					<td fvalue="{{$index->title}}">{{$index->title}}</td>
					<td fvalue="{{$index->image}}">
						<img src="/files/About/{{$index->image}}" width="200" alt="">
					</td>
					<td fvalue="{{$index->text}}" style="display:none"><div class="maxhdiv">{{$index->text}}</div></td>
					<td class="item-buttons">
						<button type="button" class="edit-item" title="Փոփոխել" data-toggle="modal" data-target="#edititem"><img src="/assets/images/icon/edit.svg" width="30" alt=""></button>
					</td>
				</tr>
				@endforeach
		</tbody>
	</table>
	<!-- <button type="button" class='add_admin_table' data-toggle="modal" data-target="#add_admin_table">Ավելացնել</button> -->
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="edititem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form method="post" action="/edititems" class="modal-content" enctype="multipart/form-data">
	 {{csrf_field()}}	
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Տվյալների փոփոխում</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body edit_body">
			
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Չեղարկել</button>
        <button type="submit" class="btn btn-primary">Փոփոխել</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add_admin_table" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form method="post" action="/add_table_field" class="modal-content" enctype="multipart/form-data">
	 {{csrf_field()}}	
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ավելացնել</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body forum_body">
			<input type="hidden" name="tblname" value="About">
			<div class="form-group"><input type="text" class="form-control" placeholder="Վերնագիր" name="topic"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Ենթավերնագիր" name="title"></div>
			<div class="form-group">
				<label>Ետնանկար</label>
				<input type="file" value="" class="form-control" name="image">
			</div>
			<div class="form-group">
				<label>Տեքստ</label>
				<textarea name="text" id="text" rows="10" cols="80"></textarea>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Չեղարկել</button>
        <button type="submit" class="btn btn-primary">Ավելացնել</button>
      </div>
    </form>
  </div>
</div>

<script src="/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace('text');
</script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script src="/assets/js/edititem.js"></script>
<script>
	$('#About').DataTable({
		"scrollX": true,
		// scrollY: "300px",
		// scrollCollapse: true,
		// fixedColumns:   {
      //       heightMatch: 'none'
      //   }
	});
</script>
<script>
	$(window).on('load',function(){
		$('.breadcrumb_span').html('Մեր մասին')
	})
</script>
@endsection('main')


