<div style='position:relative;'  id="size{{$index}}">
    {{-- @dump($size) --}}
    <div class="row" >
        <div class="col-xl-4 col-sm-7">
            <input class="form-control" name="size[{{$index}}][size_id]" id="validationCustomUsername" placeholder="Size ID" type="text"  value="{{ $size['size_id'] != '' ? $size['size_id'] : '' }}">
            @if (isset($errors['size.'.$index.'.size_id']))
            <small class="text-danger">{{ $errors['size.'.$index.'.size_id'][0] }}</small>
            @endif
        </div>
        <div class="col-xl-4 col-sm-7">
            <input class="form-control" name="size[{{$index}}][size_en]" id="validationCustomUsername" placeholder="Size EN" type="text"  value="{{ $size['size_en'] != '' ? $size['size_en'] : '' }}">
            @if (isset($errors['size.'.$index.'.size_en']))
            <small class="text-danger">{{ $errors['size.'.$index.'.size_en'][0] }}</small>
            @endif
        </div>
        <div class="col-xl-4 col-sm-7">
            <select class="form-control" name="size[{{$index}}][status_size]" id="validationCustomUsername" type="text" >
                <option value="Aktif" {{ $size['status_size'] == 'Aktif' ? 'selected' : '' }}>Active</option>
                <option value="Tidak Aktif" {{ $size['status_size'] == 'Tidak Aktif' ? 'selected' : '' }}>Inactive</option>
            </select>
            @if (isset($errors['size.'.$index.'.status_size']))
            <small class="text-danger">{{ $errors['size.'.$index.'.status_size'][0] }}</small>
            @endif
        </div>
        <div style="margin-bottom:10px; display: block; width: 100%;"></div>
    </div>
    @if($index!=0)<i onclick="removeWarna('warna{{$index}}')" style='position:absolute; right: -20px; top: 8px; cursor: pointer;' class='fa fa-times remove_button'></i>
    @endif
    <script type="text/javascript">
        function removeWarna(size){
            document.getElementById(size).remove();
        }
    </script>
</div>