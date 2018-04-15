<div id="modalDoctor" class="modal fade" role="dialog">
        <div class="modal-dialog">
    
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Selecionar Paciente</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="col-lg-9">
                                <div class="form-group">
                                    <label for="searchDoctor">Pesquisar</label>
                                    <input type="search" class="form-control" name="searchDoctor" id="searchDoctor" placeholder="Informe o nome do Doctore">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label for="btnpesquisarDoctor"></label>
                                    <div style="margin-top: 5px;">
                                        <button class="btn btn-info form-control" name="btnpesquisarDoctor" id="btnpesquisarDoctor"><span class="glyphicon glyphicon-search"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-hover table-bordered" id="tableDoctor">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                    </tr>
                                    <tbody></tbody>
                                </thead>
                            </table>
                        </div>
    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-lg pull-left" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-success btn-lg pull-right" id="saveDoctor" data-dismiss="modal">Selecionar</button>
                </div>
            </div>
    
        </div>
    </div>