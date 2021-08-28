@extends('Admin/adminUI')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/assets/css/admin.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
@section('main')
<style>th,td,tr{white-space: nowrap;}</style>
<div class="main-content-inner">
	<table id="User" tblName="User" class="table table-striped table-dark table-bordered" style="width: 100%">
		<thead>
				<tr>
					<th scope="col" fname="id">ID</th>
					<th scope="col" fname="name">Անուն</th>
					<th scope="col" fname="surname">Ազգանուն</th>
					<th scope="col" fname="email">Էլ.փոստ</th>
					<th scope="col" fname="password">Գաղտնաբառ</th>
					<th scope="col" fname="created_at">Ավելացվել է</th>
					<th scope="col">Խմբագրել</th>
				</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr class='request_tr' trID="{{$user->id}}">
				<td fvalue="{{$user->id}}">{{$user->id}}</td>
				<td fvalue="{{$user->name}}">{{$user->name}}</td>
				<td fvalue="{{$user->surname}}">{{$user->surname}}</td>
				<td fvalue="{{$user->email}}">{{$user->email}}</td>
				<td fvalue="{{$user->password}}">{{$user->password}}</td>
				<td fvalue="{{$user->created_at}}">{{$user->created_at}}</td>
				<td class="item-buttons">
					<button type="button" class="edit-item" title="Փոփոխել" data-toggle="modal" data-target="#edititem"><img src="/assets/images/icon/edit.svg" width="30" alt=""></button>
					<button type="button" class="delete-item" title="Հեռացնել"><img src="/assets/images/icon/trash.svg" alt=""></button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<button type="button" class='add_admin_table' data-toggle="modal" data-target="#add_admin_table">Ավելացնել</button>
	<div class="row mt-5">
		<div class="col text-center">
			<div class="block-27">
				{{$users->links('pagination.default')}}
			</div>
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
			<input type="hidden" name="tblname" value="User">
			<div class="form-group"><input type="text" class="form-control" placeholder="Անուն" name="name"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Ազգանուն" name="surname"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Էլ.փոստ" name="email"></div>
			<div class="form-group"><input type="text" class="form-control" placeholder="Գաղտնաբառ" name="password"></div>
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
	$('#User').DataTable({
		"scrollX": true,
		"bPaginate": false,
		// scrollY: "300px",
		// scrollCollapse: true,
		// fixedColumns:   {
      //       heightMatch: 'none'
      //   }
	});
</script>
<script>
	$(window).on('load',function(){
		$('.breadcrumb_span').html('Օգտատերեր')
	})
</script>
@endsection('main')


