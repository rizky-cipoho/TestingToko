<div style='position:relative;' id="warna{{$index}}">
    <div class="row" >
        <div class="col-xl-4 col-sm-7">
            <input class="form-control" name="{{'warna['.$index.'][warna]'}}" id="validationCustomUsername" placeholder="Judul Warna" type="text"  value="{{ $warna['warna'] != '' ? $warna['warna'] : '' }}">
            @if (isset($errors['warna.'.$index.'.warna']))
            <small class="text-danger">{{ $errors['warna.'.$index.'.warna'][0] }}</small>
            @endif
        </div>
        <div class="col-xl-3 col-sm-7">
            <input class="form-control" name="{{'warna['.$index.'][kode_warna]'}}" id="validationCustomUsername" placeholder="Kode Warna" type="text" value="{{ $warna['kode_warna'] != '' ? $warna['kode_warna'] : '' }}">
            @if (isset($errors['warna.'.$index.'.kode_warna']))
            <small class="text-danger">{{ $errors['warna.'.$index.'.kode_warna'][0] }}</small>
            @endif
        </div>
        <div class="col-xl-3 col-sm-7">
            <input class="form-control" name="{{'warna['.$index.'][gambar_warna]'}}" id="validationCustomUsername" type="file" accept="image/*" @if(!isset($produk))  @endif>
            @if (isset($errors['warna.'.$index.'.gambar_warna']))
            <small class="text-danger">{{ $errors['warna.'.$index.'.gambar_warna'][0] }}</small>
            @endif
        </div>
        <div class="col-xl-2 col-sm-7">
            <select class="form-control" name="{{'warna['.$index.'][status_warna]'}}" id="validationCustomUsername" type="text" >
                <option value="Ready" {{ $warna['status_warna'] == 'Ready' ? 'selected' : '' }}>Ready</option>
                <option value="Sold Out" {{ $warna['status_warna']  == 'Sold Out' ? 'selected' : '' }}>Sold Out</option>
            </select>
            @if (isset($errors['warna.'.$index.'.status_warna']))
            <small class="text-danger">{{ $errors['warna.'.$index.'.status_warna'][0] }}</small>
            @endif
        </div>
        <div style="margin-bottom:10px; display: block; width: 100%;"></div>

    </div>
    @if($index!=0)<i onclick="removeWarna('warna{{$index}}')" style='position:absolute; right: -20px; top: 8px; cursor: pointer;' class='fa fa-times remove_button'></i>
    @endif
    <script type="text/javascript">
        function removeWarna(warna){
            document.getElementById(warna).remove();
        }
    </script>
</div>
