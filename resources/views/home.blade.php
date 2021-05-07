@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Ajax TODO List</strong> <span class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#exampleModal">Add</span></div>

                <div class="card-body">
                  <ul class="list-group">
                    <li class="list-group-item ourItem" data-toggle="modal" data-target="#exampleModal">Lorem ipsum</li>
                    <li class="list-group-item ourItem" data-toggle="modal" data-target="#exampleModal">Heily Jenner</li>
                    <li class="list-group-item ourItem" data-toggle="modal" data-target="#exampleModal">Quiz baba lao</li>
                    <li class="list-group-item ourItem" data-toggle="modal" data-target="#exampleModal">Magufuli jembe lao</li>
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
          <input type="text" id="addItem" placeholder="Add Item Here" class="form-control">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" style="display: none" id="deleteButton">Delete</button>
          <button type="button" class="btn btn-primary" style="display: none" id="updateButton">Save changes</button>
          <button type="button" class="btn btn-primary" id="addButton">Add Item</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
    <script>
        $(document).ready(function(){
            $('.ourItem').each(function(){
              $(this).click(function(event){
                  var text = $(this).text();
                  $('#addItem').val(text);
                  $('#title').text('Edit Item');
                  $('#deleteButton').show();
                  $('#updateButton').show();
                  $('#addButton').hide();

              })
            })
        })
    </script>
@endsection
