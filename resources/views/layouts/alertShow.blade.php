{{-- phần in ra thông báo chung --}}
@if(Session()->has('msg') || Session()->has('success'))
<script>
  $(document).ready(function () {
    $("#myModal").modal('show');
  })
</script>

{{-- phần show thông báo --}}
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thông Báo</h4>
      </div>
      <div class="modal-body">
        @if(Session()->has('msg'))
        <p>{{Session('msg')}}</p>
        @endif
        @if(Session()->has('success'))
        <p>{{Session('success')}}</p>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endif