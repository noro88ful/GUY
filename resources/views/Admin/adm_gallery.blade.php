@extends('Admin/adminUI')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/assets/css/admin.css">
<link rel="stylesheet" href="/assets/css/pond.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
@section('main')
<div class="main-content-inner">
	<table id="Gallery" tblName="Gallery" class="table table-striped table-dark table-bordered" style="width: 100%">
		<thead>
			<tr>
					<th scope="col" fname="topic">Վերնագիր</th>
					<th scope="col" fname="description">Նկարագրություն</th>
					<th scope="col" fname="select" foname="filter" 
					fsvalue="@foreach ($works as $v){{$v->id.','}}@endforeach" 
					fsnames="@foreach ($works as $v){{$v->filter.','}}@endforeach">
					Ֆիլտր</th>
					<th scope="col" fname="0">Այլ Նկարներ</th>
					<th scope="col" fname="image">Նկար</th>
					<th scope="col">Խմբագրել</th>
				</tr>
		</thead>
		<tbody>
				@foreach($galleries as $index)
				<tr class='request_tr' trID="{{$index->id}}">
					<td fvalue="{{$index->topic}}">{{$index->topic}}</td>
					<td fvalue="{{$index->description}}"><?php echo($index->description) ?></td>
					<td fvalue="{{$index->id}}" actvalue="{{$index->id}}">
						@if(!empty($index->work->filter))
							{{$index->work->filter}}
						@else
							Ընտրված չէ
						@endif
					</td>
					<td>
						@if($index->check == 1)
							<a href="/admin/adm_galleries_images/{{$index->id}}" target='_blank'>Այլ նկարներ</a>
						@else
							<p>Չկան այլ նկարներ</p>
						@endif
					</td>
					<td fvalue="{{$index->image}}">
						<img src="/files/Gallery/{{$index->image}}" style="width: 120px; height: 120px; object-fit:cover" alt="">
					</td>
					<td class="item-buttons">
						<button type="button" class="edit-item" title="Փոփոխել" data-toggle="modal" data-target="#edititem"><img src="/assets/images/icon/edit.svg" width="30" alt=""></button>
						<button type="button" class="delete-item" title="Հեռացնել"><img src="/assets/images/icon/trash.svg" alt=""></button>
					</td>
				</tr>
				@endforeach
		</tbody>
	</table>
	<button type="button" class='add_admin_table' data-toggle="modal" data-target="#add_gallery">Ավելացնել</button> <br>
	<div class="col-lg-12">
		<div class="pagination__number blog__pagination">
			{{$galleries->links('pagination.default')}}
		</div>
	</div>
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
<div class="modal fade bd-example-modal-lg" id="add_gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form method="post" action="/add_gallery" class="modal-content" enctype="multipart/form-data">
	 {{csrf_field()}}	
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ավելացնել</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body forum_body">
			<input type="hidden" name="tblname" value="Gallery">
			<div class="form-group"><input type="text" class="form-control" placeholder="Վերնագիր" name="topic"></div>
			<div class="form-group">
				<label for="">Աշխատանքի տիպը</label>
				<select name="filter" class="admin-select">
					<option value="">Ընտրված չէ</option>
					@foreach($works as $work)
						<option value="{{$work->id}}">{{$work->filter}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label>Նկարագրություն</label>
				<textarea name="text" id="text" rows="10" cols="80"></textarea>
			</div>
			<div class="form-group">
				<br>
				<div class="upload">
					<div class="upload-files">
						<header class="triggerFile">
							<p>
								<i class="fa fa-cloud-upload" aria-hidden="true"></i>
								<span class="up">Guy </span>
								<span class="load">Ghazanchyan</span>
							</p>
						</header>
					<div class="body" id="drop">
					<i class="fa fa-file-text-o pointer-none" aria-hidden="true"></i>
					<p class="pointer-none"><b>Տեղադրեք</b> կամ ներբեռնեք <br /> աշխատանքի նկարները <br> <span>.webp .jpg .png<span> <br> <span>~100MB &nbsp; ~10<i class="fas fa-images image-pieces"></i><span></p>
						<input id="image_input" name="filenames[]" type="file" multiple />
					</div>
					<footer>
					<div class="divider">
						<span><AR>FILES</AR></span>
					</div>
					<div class="list-files">
					</div>
					</footer>
					</div>
				</div>
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

	$(".edit-item").click(function() {
		setTimeout(function() {
			var textareas = document.getElementById('edititem').getElementsByTagName("textarea")
			for (let i = 0; i < textareas.length; i++) {
				CKEDITOR.replace(textareas[i].id);
			}
		}, 50);
	});
</script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script src="/assets/js/edititem.js"></script>
<script src="/assets/js/pond.js"></script>
<script src="/assets/js/pondcheck.js"></script>
<script>
	$('#Gallery').DataTable({
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
		$('.breadcrumb_span').html('Բոլոր աշխատանքները')
	})
</script>
@endsection('main')


