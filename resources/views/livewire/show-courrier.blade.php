<div class="form-group">
    {{-- data-select2-id="91" --}}
    <label>Nature</label>
    <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17"
        tabindex="-1" aria-hidden="true">
        <option selected="selected" data-select2-id="{{ $item->id }}">
            <font style="vertical-align: inherit;">
                <font style="vertical-align: inherit;">
                    @foreach ($listeNature as $item)
        <option value="{{ $item->id }}">{{ $item->nom }}</option>
        @endforeach
        </font>
        </font>
        </option>

    </select>
</div>
{{-- <span class="select2 select2-container select2-container--bootstrap4 select2-container--below"
        dir="ltr" data-select2-id="18" style="width: 100%;"><span class="selection"><span
                class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                aria-expanded="false" tabindex="0" aria-disabled="false"
                aria-labelledby="select2-towa-container"><span class="select2-selection__rendered"
                    id="select2-towa-container" role="textbox" aria-readonly="true" title="Alabama">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Alabama</font>
                    </font>
                </span><span class="select2-selection__arrow" role="presentation"><b
                        role="presentation"></b></span></span></span><span class="dropdown-wrapper"
            aria-hidden="true"></span></span> --}}
