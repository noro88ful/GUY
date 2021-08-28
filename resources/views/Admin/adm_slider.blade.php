@extends('Admin/adminUI')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="table.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
@section('main')
<div class="main-content-inner">
	<table id="Slider" tblName="Slider" class="table table-striped table-dark table-bordered" style="width: 100%">
		<thead>
				<tr>
					<th scope="col" fname="topic">Մեծ վերնագիր</th>
					<th scope="col" fname="title">Փոքր Վերնագիր</th>
					<th scope="col" fname="image">Սլայդերի Նկար</th>
					<th scope="col" fname="smallimage">Սլայդերի վրայի Նկար</th>
					<th scope="col">Խմբագրել</th>
				</tr>
		</thead>
		<tbody>
				@foreach($sliders as $slide)
				<tr class='request_tr' trID="{{$slide->id}}">
					<td fvalue="{{$slide->topic}}">{{$slide->topic}}</td>
					<td fvalue="{{$slide->title}}">{{$slide->title}}</td>
					<td fvalue="{{$slide->image}}"><img src="/files/Slider/{{$slide->image}}" width="200" alt=""></td>
					<td fvalue="{{$slide->smallimage}}">
						@if(!empty($slide->smallimage))
							<img src="/files/Slider/{{$slide->smallimage}}" width="200" alt="">
						@endif
					</td>
					<td class="item-buttons">
						<button type="button" class="edit-item" title="Փոփոխել" data-toggle="modal" data-target="#edititem"><img src="/assets/images/icon/edit.svg" width="30" alt=""></button>
						<button type="button" class="delete-item" title="Հեռացնել"><img src="/assets/images/icon/trash.svg" alt=""></button>
					</td>
				</tr>
				@endforeach
		</tbody>
	</table>
	<button type="button" class='add_admin_table' data-toggle="modal" data-target="#add_admin_table">Ավելացնել</button>
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
			<input type="hidden" name="tblname" value="Slider">
			<div class="form-group"><input type="text" class="form-control" placeholder="Մեծ վերնագիր" name="topic"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Փոքր վերնագիր" name="title"></div>
			<div class="form-group">
				<label>Սլայդերի Նկար</label>
				<input type="file" class="form-control" name="image"></div>
			<div class="form-group">
				<label>Սլայդերի վրայի Նկար</label>
				<input type="file" class="form-control" name="smallimage"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Չեղարկել</button>
        <button type="submit" class="btn btn-primary">Ավելացնել</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script src="/assets/js/edititem.js"></script>
<script>
	$('#Slider').DataTable({
		"scrollX": true,
	});
</script>
<script>
	$(window).on('load',function(){
		$('.breadcrumb_span').html('Գլխավոր սլայդեր')
	})
</script>
@endsection('main')


