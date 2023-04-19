<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="first_name" class="col-md-3 col-form-label">Nome Parlamentar</label>
            <div class="col-md-9">
                <input type="text" name="parliamentary" value="{{ $parliamentary->name}}" id="amendment"
                    class="form-control @error('amendment')
                        is-invalid
                        @enderror">
                {{-- @error('amendment')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror --}}

            </div>
        </div>

        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit"
                    class="btn btn-primary">Atualizar</button>
                <a href="{{ route('parliamentarians.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </div>
    </div>
</div>
