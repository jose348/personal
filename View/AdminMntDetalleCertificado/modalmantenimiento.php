<div id="modalmantenimiento" class="modal fade row " data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>



                <button type="reset" class="close" aria-label="Close" aria-hidden="true" data-dismiss="modal">
                    &times;
                </button>

            </div>
            <div class="modal-body">
               
                    <input type="hidden" name="usu_id" id="usu_id" />

                <!-- TODO TABLA LO TRAEMOS DE MANTENIMIENTO USUARIO PARA MOSTRAR LOS USUARIOS -->
                    <div class="table-wrapper">
                        <br>
                        <table id="usuario_data" class="table display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="wd-10p"></th>
                                    <th class="wd-15p">Nombre</th>
                                    <th class="wd-15p">Ape.Paterno</th>
                                    <th class="wd-15p">Ape.Materno</th>
                                    <th class="wd-15p">Correo</th>
                                    <th class="wd-15p">Telefono</th>
                                
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>



                    <div class="modal-footer">
                        <!-- para guardar en el boton guardar dentro de mi modal, aqui le agregamos el name y un value -->
                        <button  name="action" onclick="registrardetalle()" value="add" class="btn btn-outline-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"><i class="fa fa-check"></i>Registrar</button>
                        <button type="reset" class="btn btn-outline-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" aria-label="Close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
                    </div>
              
            </div>

        </div>
    </div>
</div>