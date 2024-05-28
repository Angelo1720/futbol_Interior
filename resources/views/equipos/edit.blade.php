<x-app-layout>
    <div class="card card-custom">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('equipos.update', $equipo->id) }}" class="p-4 border rounded-lg" 
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- nombreCorto -->
                        <div class="mb-3">
                            <label for="nameEquipoCorto" class="form-label label-custom">{{ __('Nombre corto de equipo') }}</label>
                            <input id="nameEquipoCorto" class="form-control input-custom" type="text" name="nameEquipoCorto"
                                value="{{ $equipo->nombreCorto }}" required autofocus autocomplete="nameEquipoCorto" 
                                placeholder="Ej: Litoral" />
                                @error('nameEquipoCorto')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                        </div>

                        <!-- nombre completo -->
                        <div class="mb-3">
                            <label for="nameEquipoLargo" class="form-label label-custom">{{ __('Nombre largo de equipo') }}</label>
                            <input id="nameEquipoLargo" class="form-control input-custom" type="text" name="nameEquipoLargo"
                            value="{{ $equipo->nombreCompleto }}" required autofocus autocomplete="nameEquipoLargo" 
                            placeholder="Club Atlético Litoral" />
                                @error('nameEquipoLargo')
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
                        @if ($equipo->traerEscudo() != null || $equipo->traerCancha() != null)
                            <div class="text-center editEquipoImg">
                                <label for="imageEscudo" class="label-custom">{{ __('👇Imágen/es utilizadas actualmente👇')}}</label>
                                @if ($equipo->traerEscudo()  != null)
                                    <span class="imagenEditEquipo">
                                        <svg onclick="borrarImagenEscudo('Imagen_{{($equipo->traerEscudo()->id)}}');" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                          </svg>
                                    <img id="imageEscudo" class="img-thumbnail" src="data:image/jpg;base64, 
                                    {{$equipo->traerEscudo()->base64}}" alt="Imagen de escudo">
                                    </span>
                                    <input type="hidden" id="Imagen_{{($equipo->traerEscudo()->id)}}" 
                                    name="NOborrarImgEscudo" value="{{($equipo->traerEscudo()->id)}}">
                                @endif
                                
                                @if ($equipo->traerCancha() != null)
                                <span class="imagenEditEquipo">
                                <svg onclick="borrarImagenCancha('Imagen_{{($equipo->traerCancha()->id)}}');" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                                <img id="imageCancha" class="img-thumbnail" src="data:image/jpg;base64, 
                                {{$equipo->traerCancha()->base64}}" alt="Imagen de cancha">
                                </span>
                                <input type="hidden" id="Imagen_{{($equipo->traerCancha()->id)}}" 
                                name="NOborrarImgCancha" value="{{($equipo->traerCancha()->id)}}">

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
    <script type="text/javascript">
        function borrarImagenEscudo(id) {
            const inputEscudo = document.getElementById('imgEscudo');
            if (document.getElementById(id).name == "NOborrarImgEscudo") { //Escudo img empieza con name="NOborrarImgEscudo" para NO borrar
                document.getElementById(id).name = "BORRARimgEscudo";
                inputEscudo.disabled = true; //Deshabilita el input 
            } else {
                document.getElementById(id).name = "NOborrarImgEscudo";
                inputEscudo.disabled = false;  //Habilita input
            }
        }
        function borrarImagenCancha(id) {
            const inputCancha = document.getElementById('imgCancha');
            if (document.getElementById(id).name == "NOborrarImgCancha") { //Cancha img empieza con name="NOborrarImgCancha" para NO borrar
                document.getElementById(id).name = "BORRARimgCancha";
                inputCancha.disabled = true; //Deshabilita el input
            } else {
                document.getElementById(id).name = "NOborrarImgCancha";
                inputCancha.disabled = false;  //Habilita input
            }
        }
    </script>
</x-app-layout>
