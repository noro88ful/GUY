@extends('Admin/adminUI')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="/assets/css/admin.css">
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
@section('main')
<div class="main-content-inner">
	<table id="index_1" tblName="index_1" class="table table-striped table-dark table-bordered" style="width: 100%">
		<thead>
				<tr>
					<th scope="col" fname="title"><img src="/assets/images/icon/AM.svg" alt="" width="20"> Փոքր վերնագիր</th>
					<th scope="col" fname="title_RU"><img src="/assets/images/icon/RU.svg" alt="" width="20"> Փոքր վերնագիր</th>
					<th scope="col" fname="title_EN"><img src="/assets/images/icon/EN.svg" alt="" width="20"> Փոքր վերնագիր</th>
					<th scope="col" fname="topic"><img src="/assets/images/icon/AM.svg" alt="" width="20"> Վերնագիր</th>
					<th scope="col" fname="topic_RU"><img src="/assets/images/icon/RU.svg" alt="" width="20"> Վերնագիր</th>
					<th scope="col" fname="topic_EN"><img src="/assets/images/icon/EN.svg" alt="" width="20"> Վերնագիր</th>
					<th scope="col" fname="text"><img src="/assets/images/icon/AM.svg" alt="" width="20"> Տեքստ</th>
					<th scope="col" fname="text_RU"><img src="/assets/images/icon/RU.svg" alt="" width="20"> Տեքստ</th>
					<th scope="col" fname="text_EN"><img src="/assets/images/icon/EN.svg" alt="" width="20"> Տեքստ</th>
					<th scope="col" fname="fullhelp">Թիվ</th>
					<th scope="col" fname="image">Նկար</th>
					<th scope="col">Խմբագրել</th>
				</tr>
		</thead>
		<tbody>
				@foreach($index1 as $index)
				<tr class='request_tr' trID="{{$index->id}}">
					<td fvalue="{{$index->title}}">{{$index->title}}</td>
					<td fvalue="{{$index->title_RU}}">{{$index->title_RU}}</td>
					<td fvalue="{{$index->title_EN}}">{{$index->title_EN}}</td>
					<td fvalue="{{$index->topic}}">{{$index->topic}}</td>
					<td fvalue="{{$index->topic_RU}}">{{$index->topic_RU}}</td>
					<td fvalue="{{$index->topic_EN}}">{{$index->topic_EN}}</td>
					<td fvalue="{{$index->text}}"><div class="maxhdiv">{{$index->text}}</div></td>
					<td fvalue="{{$index->text_RU}}"><div class="maxhdiv">{{$index->text_RU}}</div></td>
					<td fvalue="{{$index->text_EN}}"><div class="maxhdiv">{{$index->text_EN}}</div></td>
					<td fvalue="{{$index->fullhelp}}">{{$index->fullhelp}}</td>
					<td fvalue="{{$index->image}}">
						<img src="/files/index_1/{{$index->image}}" width="50" alt="">
					</td>
					<td class="item-buttons">
						<button type="button" class="edit-item" title="Փոփոխել" data-toggle="modal" data-target="#edititem"><img src="/assets/images/icon/edit.svg" width="30" alt=""></button>
					</td>
				</tr>
				@endforeach
		</tbody>
	</table>
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


<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>
<script src="/assets/js/edititem.js"></script>
<script>
	$('#index_1').DataTable({
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
		$('.breadcrumb_span').html('Հատված I')
	})
</script>
@endsection('main')


