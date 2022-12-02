<div class="modal fade" tabindex="-1" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Cảnh báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Bạn thực sự muốn xóa</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <form id="single-delete-form" action={{route($singleDeleteRouteName, ['id'=>'id'])}} method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </form>

                <form method="post" id="multi-delete-form" action={{route($multiDeleteRouteName)}} class="collapse">
                    @csrf
                    <div class="contain"></div>
                </form>
            </div>
        </div>
    </div>
</div>