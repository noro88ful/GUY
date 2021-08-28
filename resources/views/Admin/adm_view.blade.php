@extends('Admin/adminUI')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="table.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
@section('main')
<div class="main-content-inner">
	<table id="Service" tblName="Service" class="table table-striped table-dark table-bordered" style="width: 100%">
		<thead>
				<tr>
					<th scope="col" fname="topic"><img src="/assets/images/icon/AM.svg" alt="" width="20"> Վերնագիր</th>
					<th scope="col" fname="topic_RU"><img src="/assets/images/icon/RU.svg" alt="" width="20"> Վերնագիր</th>
					<th scope="col" fname="topic_EN"><img src="/assets/images/icon/EN.svg" alt="" width="20"> Վերնագիր</th>
					<th scope="col" fname="text"><img src="/assets/images/icon/AM.svg" alt="" width="20"> Տեքստ</th>
					<th scope="col" fname="text_RU"><img src="/assets/images/icon/RU.svg" alt="" width="20"> Տեքստ</th>
					<th scope="col" fname="text_EN"><img src="/assets/images/icon/EN.svg" alt="" width="20"> Տեքստ</th>
					<th scope="col" fname="image">Նկար</th>
					<th scope="col">Խմբագրել</th>
				</tr>
		</thead>
		<tbody>
				@foreach($services as $slide)
				<tr class='request_tr' trID="{{$slide->id}}">
					<td fvalue="{{$slide->topic}}">{{$slide->topic}}</td>
					<td fvalue="{{$slide->topic_RU}}">{{$slide->topic_RU}}</td>
					<td fvalue="{{$slide->topic_EN}}">{{$slide->topic_EN}}</td>
					<td fvalue="{{$slide->text}}"><div class="maxhdiv">{{$slide->text}}</div></td>
					<td fvalue="{{$slide->text_RU}}"><div class="maxhdiv">{{$slide->text_RU}}</div></td>
					<td fvalue="{{$slide->text_EN}}"><div class="maxhdiv">{{$slide->text_EN}}</div></td>
					<td fvalue="{{$slide->image}}"><img src="/files/Service/{{$slide->image}}" width="50" alt=""></td>
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
			<input type="hidden" name="tblname" value="Service">
			<div class="form-group"><input type="text" class="form-control" placeholder="Վերնագիր_AM" name="topic"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Վերնագիր_RU" name="topic_RU"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Վերնագիր_EN" name="topic_EN"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Տեքստ_AM" name="text"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Տեքստ_RU" name="text_RU"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Տեքստ_EN" name="text_EN"></div>
			<div class="form-group"><input type="file" class="form-control" placeholder="Նկար" name="image"></div>
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
	$('#Service').DataTable({
		"scrollX": true,
	});
</script>
<script>
	$(window).on('load',function(){
		$('.breadcrumb_span').html('Ծառայություններ')
	})
</script>
@endsection('main')


