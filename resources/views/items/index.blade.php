@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <strong>Ajax TODO List</strong> <span class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModal" id="addItem">Add</span>
                </div>

                <div class="card-body">
                  <ul class="list-group" id="items">
                    @foreach ($items as $item)
                      <li class="list-group-item ourItem" data-toggle="modal" data-target="#exampleModal" data-id="{{$item->id}}">{{$item->name}}</li>
                    @endforeach
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @csrf
          <input type="text" id="itemInput" placeholder="Add Item Here" class="form-control">
        </div>
        <div class="modal-footer">
          <input type="hidden" id="itemId">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="display: none" id="deleteButton">Delete</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" style="display: none" id="updateButton">Update changes</button>
          <button type="button" class="btn btn-success" id="addButton" data-dismiss="modal">Add Item</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $(document).on('click','.ourItem',function(){
                  var text = $(this).text();
                  var id = $(this).attr('data-id');
                  $('#itemInput').val(text);
                  $('#title').text('Edit Item');
                  $('#deleteButton').show();
                  $('#updateButton').show();
                  $('#addButton').hide();
                  $('#itemId').val(id);
            })

             $(document).on('click', '#addItem', function(event) {
                  $('#itemInput').val("");
                  $('#title').text('Add New Item');
                  $('#deleteButton').hide();
                  $('#updateButton').hide();
                  $('#addButton').show();
             });
             
             //add Item
              $(document).on('click','#addButton',function(event){
                  var text = $('#itemInput').val();
                  console.log(text);
                  $.post('/save-items', {'text': text,'_token':$('input[name=_token]').val()}, function(data) {
                   console.log(data);
                   $('#items').load(location.href + ' #items');
                  });
              })
              
              //delete Item
              $(document).on('click', '#deleteButton', function(event) {
                var id = $('#itemId').val();
                console.log(id);
                $.post('/delete-item', {'id':id,'_token': $('input[name=_token]').val()}, function(data) {
                  console.log(data);
                  $('#items').load(location.href + ' #items');
                });
              });

              //update Item
              $(document).on('click', '#updateButton', function(event) {
                var id = $('#itemId').val();
                var text = $('#itemInput').val();
                console.log(id);
                $.post('/update-item', {'id':id,'_token':$('input[name=_token]').val()}, function(data) {
                  console.log(data);
                  $('#items').load(location.href + ' #items');
                });
              });
        })
    </script>
@endsection
