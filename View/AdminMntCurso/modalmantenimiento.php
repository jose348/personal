<div id="modalmantenimiento" class="modal fade row " data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bd-0">
            <div class="modal-header pd-y-20 pd-x-25">
                <h6 id ="lbltitulo" class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"></h6>



                <button type="reset" class="close" aria-label="Close" aria-hidden="true" data-dismiss="modal">
                    &times;
                </button>

            </div>
            <div class="modal-body">
                <form method="post" id="cursos_form" class="form row">
                    <input type="hidden" name="cur_id" id="cur_id" />
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Categoria: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width:100%" name="cat_id" id="cat_id" data-placeholder="Seleccione">
                                <option label="Seleccione"></option>

                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Nombre: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="cur_nom" type="text" name="cur_nom" required />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Descripcion: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="cur_descr" type="text" name="cur_descr" required />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Fecha Inicio: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="cur_fechini" type="date" name="cur_fechini" required />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Fecha Fin: <span class="tx-danger">*</span></label>
                            <input class="form-control tx-uppercase" id="cur_fechfin" type="date" name="cur_fechfin" required />
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Instructor: <span class="tx-danger">*</span></label>
                            <select class="form-control select2" style="width:100%" name="inst_id" id="inst_id" data-placeholder="Seleccione">
                                <option label="Seleccione"></option>

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                <!-- para guardar en el boton guardar dentro de mi modal, aqui le agregamos el name y un value -->
                <button type="submit" id="#" name="action" value="add" class="btn btn-outline-success tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium"><i class="fa fa-check"></i> Guardar</button> 
                <button type="reset" class="btn btn-outline-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" aria-label="Close" aria-hidden="true" data-dismiss="modal"><i class="fa fa-close"></i> Cancelar</button>
            </div>
                </form>
            </div>
            
        </div>
    </div>
</div>