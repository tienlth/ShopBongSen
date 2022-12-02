<div class="modal fade" aria-modal="true" id="add-modify-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form @if(isset($currentElement) && isset($updateRouteName)){{'action='.route($updateRouteName, ['id'=>$currentElement['id']])}}@else{{'action'}}@endif method='POST' enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">@if(isset($currentElement)){{"Cập nhật"}}@else{{"Thêm mới"}}@endif</h1>
                    <a @if(isset($currentElement)){{'href='.route($indexRouteName)}}@endif><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                </div>
                <div class="modal-body">
                    @foreach($fields as $field)
                        @if($field['type']!='file')
                            @include('components.admin.form-input-data',[
                                'type'=>$field['type'],
                                'label'=>$field['label'],
                                'name'=>$field['name'],
                                'currentValueProp'=>$field['currentValueProp'],
                                'disabled'=>$field['disabled'],
                            ])
                        @else
                            @include('components.admin.form-input-data',[
                                'type'=>$field['type'],
                                'label'=>$field['label'],
                                'name'=>$field['name']
                            ])
                        @endif
                    @endforeach
                </div>
                <div class="modal-footer">
                    <a @if(isset($currentElement)){{'href='.route($indexRouteName)}}@endif><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button></a>
                    <button type="submit" class="btn btn-primary">@if(isset($currentElement)){{"Lưu lại"}}@else{{"Thêm"}}@endif</button>
                </div>
            </form>
        </div>
    </div>
</div>