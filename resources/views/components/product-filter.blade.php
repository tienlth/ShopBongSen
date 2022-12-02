<div class="row mb-3 d-flex align-items-center">
    <div class="col-1"><i class="fa-solid fa-filter"></i>Lọc</div>
    <div class="col-3">
        <form action="" id="type-filter-form">
            <select id="type-filter" name="type-filter" class="form-select w-100">
                <option>--Phân loại--</option>
                @foreach($producttypes as $type)
                    @if(isset(\Request::query()['type-filter']))
                    <option value={{$type->id}} @if($type->id==\Request::query()['type-filter']) selected @endif>{{$type->name}}</option>
                    @else
                    <option value={{$type->id}}>{{$type->name}}</option>
                    @endif
                    @endforeach
            </select>
        </form>
    </div>
    <div class="col-3">
        <form action="" id="style-filter-form">
            <select id="style-filter" name="style-filter" class="form-select w-100">
                <option>--Kiểu dáng--</option>
                @foreach($styles as $style)
                    @if(isset(\Request::query()['style-filter']))
                    <option value={{$style->id}} @if($style->id==\Request::query()['style-filter']) selected @endif>{{$style->name}}</option>
                    @else
                    <option value={{$style->id}}>{{$style->name}}</option>
                    @endif
                @endforeach
            </select>
        </form>
    </div>
    <div class="col-3">
        <form action="" id="ingredient-filter-form">
            <select id="ingredient-filter" name="ingredient-filter" class="form-select w-100">
                <option>--Loại hoa--</option>
                @foreach($ingredients as $ingredient)
                    @if(isset(\Request::query()['ingredient-filter']))
                    <option value={{$ingredient->id}} @if($ingredient->id==\Request::query()['ingredient-filter']) selected @endif>{{$ingredient->name}}</option>
                    @else
                    <option value={{$ingredient->id}}>{{$ingredient->name}}</option>
                    @endif
                @endforeach
            </select>
        </form>
    </div>
</div>

@push('script')
    <script>
        $('#type-filter').change((evt)=>{
            if($(evt.currentTarget).val()!=$(evt.currentTarget).find('option:first-child').text())
                $('#type-filter-form').submit()
        })

        $('#style-filter').change((evt)=>{
            if($(evt.currentTarget).val()!=$(evt.currentTarget).find('option:first-child').text())
                $('#style-filter-form').submit()
        })

        $('#ingredient-filter').change((evt)=>{
            if($(evt.currentTarget).val()!=$(evt.currentTarget).find('option:first-child').text())
                $('#ingredient-filter-form').submit()
        })
    </script>
@endpush