<input type="hidden" name="users_id" id="users_id" value="{{ Auth::id();}}">
<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="parliamentarians_id" class="col-md-3 col-form-label">Parlamentar</label>
            <div class="col-md-9">

                <select id="parliamentarians_id" name="parliamentarians_id" class="custom-select">
                    @foreach ($parliamentarians as $id => $parliamentary)
                        <option value="{{ $id }}" @selected($amendment->parliamentarians_id == $id)>{{ $parliamentary->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="form-group row">
            <label for="amendment" class="col-md-3 col-form-label">Emendas</label>
            <div class="col-md-9">
                <input type="text" name="amendment" placeholder="ex:00000.00"
                    id="amendment" value="{{ old('amendment', $amendment->amendment) }}"
                    class="form-control @error('amendment')
                        is-invalid
                        @enderror">
                @error('amendment')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="caption" class="col-md-3 col-form-label">Subtítulo</label>
            <div class="col-md-9">
                <textarea name="caption" id="caption" cols="60" rows="5" maxlength="200" oninput="this.value = this.value.toUpperCase()"
                    class="form-control @error('caption') is-invalid @enderror">{{ $amendment->caption}}</textarea>
                @error('caption')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="work_program" class="col-md-3 col-form-label">Programa de Trabalho</label>
            <div class="col-md-9">
                <input type="text" name="work_program"
                    value="{{ old('amendment', $amendment->work_program) }}"
                    id="work_program"
                    class="form-control @error('work_program')
                        is-invalid
                        @enderror">
                @error('work_program ')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="nature_of_expense" class="col-md-3 col-form-label">Natureza da Despesa</label>
            <div class="col-md-9">
                <input type="text" name="nature_of_expense"
                    value="{{ old('amendment', $amendment->nature_of_expense) }}"
                    id="nature_of_expense"
                    class="form-control @error('nature_of_expense')
                        is-invalid
                        @enderror">
                @error('nature_of_expense')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-md-3 col-form-label">Valor</label>
            <div class="col-md-9">
                <input type="text" name="price"
                    value="{{ old('amendment', $amendment->price) }}" id="price"
                    class="form-control @error('price')
                        is-invalid
                        @enderror">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="progress_id" class="col-md-3 col-form-label">Progresso</label>
            <div class="col-md-9">
                <select id="progress_id" name="progress_id" class="custom-select">
                    @foreach ($progress as $id => $p)
                        <option value="{{ $id }}" @selected($amendment->progress_id == $id)>{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="viability" class="col-md-3 col-form-label">Viabilidade</label>
            <div class="col-md-9">
                <select id="viability_id" name="viability_id" class="custom-select">
                    @foreach ($viability as $id => $v)
                        <option value="{{ $id }}" @selected($amendment->viability_id == $id)>{{ $v->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit"
                    class="btn btn-primary">{{ $amendment->exists ? 'Atualizar' : 'Salvar' }}</button>
                <a href="{{ route('amendments.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </div>
    </div>
</div>
