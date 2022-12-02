@if(Session::has('message'))
<div id="message-modal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="color: #7281FB;">Shop Bông Sen thông báo:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{Session::get('message')}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif
@push('script')
    @if(Session::has('message'))
    <script>
        var modal = new bootstrap.Modal($('#message-modal')[0], {
        keyboard: false
        });

        modal.show();
    </script>
    <?php Session::forget('message'); ?>
    @endif
@endpush


