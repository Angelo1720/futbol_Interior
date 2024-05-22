<x-app-layout>
    <div class="card card-custom">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('equipos.update', $equipo->id) }}" class="p-4 border rounded-lg" 
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div class="mb-3">
                            <label for="nameEquipo" class="form-label label-custom">{{ __('Nombre equipo') }}</label>
                            <input id="nameEquipo" class="form-control input-custom" type="text" name="nameEquipo"
                                value="{{ $equipo->nombre }}" required autofocus autocomplete="nameEquipo" />
                            @error('nameEquipo')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha fundacion -->
                        <div class="mb-3">
                            <label for="fechaFundacion"
                                class="form-label label-custom">{{ __('Fecha de fundación') }}</label>
                            <input id="fechaFundacion" class="form-control input-custom" type="date"
                                name="fechaFundacion" value="{{ $equipo->fechaFundacion }}" required
                                autocomplete="fechaFundacion" />
                            @error('fechaFundacion')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Nombre cancha -->
                        <div class="mb-3">
                            <label for="nameCancha" class="form-label label-custom">{{ __('Nombre cancha') }}</label>
                            <input id="nameCancha" class="form-control input-custom" type="text" name="nameCancha"
                                value="{{ $equipo->nomCancha == 'NO' ? '' : $equipo->nomCancha }}" autofocus autocomplete="nameCancha"
                                placeholder ="Si queda vacío signfica que NO posee una." />
                            @error('nameCancha')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Divisional -->
                        <div id="comboBoxs">
                            <div class="contenedoresListas">
                                <label for="divisional" class="col-form-label label-custom">Divisional</label>
                                <select name="divisional" id="divisional" class="form-select mb-3">
                                    <option value="DivA" {{ $equipo->divisional == 'Primera "A"' ? 'selected' : '' }}>
                                        Primera 'A'</option>
                                    <option value="DivB" {{ $equipo->divisional == 'Segunda "B"' ? 'selected' : '' }}>
                                        Segunda 'B'</option>
                                    <option value="DivC" {{ $equipo->divisional == 'Tercera "C"' ? 'selected' : '' }}>
                                        Tercera 'C'</option>
                                </select>
                            </div>
                        </div>

                        <!-- Cantidad Titulos -->
                        <div class="mb-3">
                            <label for="cantidadTitulos"
                                class="form-label label-custom">{{ __('Cantidad de titulos') }}</label>
                            <input id="cantidadTitulos" class="form-control input-custom" type="text"
                                name="cantidadTitulos" value="{{ $equipo->cantidadTitulos }}" required autofocus
                                autocomplete="cantidadTitulos" />
                            @error('cantidadTitulos')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bool participa -->
                        <div class="mb-3 form-check form-switch">
                            <label for="participa"
                                class="form-label form-check-label">{{ __('¿Actualmente está en competencia?') }}</label>
                            <input id="participa" class="form-check-input" type="checkbox" name="participa"
                                {{ $equipo->participa ? 'checked' : '' }} autofocus autocomplete="participa" />
                        </div>
                        
                        <!-- Escudo y cancha actual -->
                        @if ($equipo->imagen()->first() != null || $equipo->imagen()->skip(1)->first() != null)
                            <div class="text-center editEquipoImg">
                                <label for="imageEscudo" class="label-custom">{{ __('👇Imágen/es utilizadas actualmente👇')}}</label>
                                @if ($equipo->imagen()->first() != null)
                                    <img id="imageEscudo" class="img-thumbnail" src="data:image/jpg;base64, 
                                    {{$equipo->imagen()->first()->base64}}" alt="Imagen de escudo">
                                @endif
                                @if ($equipo->imagen()->skip(1)->first() != null)
                                <img id="imageCancha" class="img-thumbnail" src="data:image/jpg;base64, 
                                {{$equipo->imagen()->skip(1)->first()->base64}}" alt="Imagen de cancha">
                                @endif
                            </div>
                        @endif

                        <!-- Escudo -->
                        <div class="mb-3">
                            <label for="imgEscudo" class="form-label label-custom">{{ __('Escudo de equipo') }}</label>
                            <input id="imgEscudo" class="form-control input-custom" type="file" name="imgEscudo" autofocus/>
                            @error('imgEscudo')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cancha -->
                        <div class="mb-3">
                            <label for="imgCancha" class="form-label label-custom">{{ __('Imágen de cancha') }}</label>
                            <input id="imgCancha" class="form-control input-custom" type="file" name="imgCancha" autofocus/>
                            @error('imgCancha')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
