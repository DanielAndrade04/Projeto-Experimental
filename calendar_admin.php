<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>

        <title>Admin | Barbearia Andrade</title>

    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    	<meta name="description" content="">
    	<meta name="keywords" content="">
    	  
    	<link href="css/bootstrap.min.css" rel="stylesheet">
    	<link href="css/barbeandrade.css" rel="stylesheet">
    	<link href="css/font-awesome.css" rel="stylesheet">
    	<link href="//fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">
    	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href='css/core/main.min.css' rel='stylesheet' />
        <link href='css/daygrid/main.min.css' rel='stylesheet' />

        <script src='js/core/main.min.js'></script>
        <script src='js/interaction/main.min.js'></script>
        <script src='js/daygrid/main.min.js'></script>
        <script src='js/core/locales/pt-br.js'></script>
        <script src="jquery/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/personalizado.js"></script>


	</head>

	<body>
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        
       
    	<!-- Info Agendamento-->
        <section class="content-info " id="agende">
            <divclass class="text-center" id="agende">
                <p class="px-lg-6 py-5">Controle de Agendamentos Barbearia Andrade. <a href="index.html">Clique aqui para voltar ao site</a></p>
            </div>
        </section>
        <!-- //Info Agendamento -->

        <!--Calendario-->
         <section class="content-info py-5" id="calendario">
            <div class="container">
                <div id='calendar'></div>


                    <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detalhes do Agendamento</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span id="msg-error"></span>
                                    <div class="visevent">
                                        <dl class="row">
                                            <dt class="col-sm-3">ID do evento</dt>
                                            <dd class="col-sm-9" id="id"></dd>

                                            <dt class="col-sm-3">Nome</dt>
                                            <dd class="col-sm-9" id="title"></dd>

                                            <dt class="col-sm-3">Telefone</dt>
                                            <dd class="col-sm-9" id="description"></dd>

                                            <dt class="col-sm-3">Início do evento</dt>
                                            <dd class="col-sm-9" id="start"></dd>
                                        </dl>
                                        <button class="btn btn-warning btn-canc-vis">Editar</button>
                                    </div>
                                    <div class="formedit">
                                        <span id="msg-edit"></span>
                                        <form id="editevent" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" id="id" >
                                            <div class="form-group row">
                                                     <label class="col-sm-2 col-form-label">Nome</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="title" class="form-control" id="title" placeholder="Seu Nome">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Telefone</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="description" class="form-control" id="description" placeholder="(xx) xxxxx-xxxx">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Tipo de Serviço</label>
                                                <div class="col-sm-10">
                                                    <select name="color" class="form-control" id="color">
                                                        <option value="">Selecione</option>         
                                                        <option style="color:#FFD700;" value="#FFD700">Corte Cabelo</option>
                                                        <option style="color:#FF4500;" value="#FF4500">Barba</option>
                                                        <option style="color:#8B4513;" value="#8B4513">Completo (Cabelo + Barba)</option>  
                                                        <option style="color:#228B22;" value="#228B22">Tratamento (Barba ou Cabelo)</option>
                                                        <option style="color:#A020F0;" value="#A020F0">Outro Serviço</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Hora do atendimento</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="button" class="btn btn-primary btn-canc-edit">Cancelar</button>
                                                    <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Agendar</button>                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agendamento Horário</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span id="msg-error"></span>
                                    <span id="msg-cad"></span>
                                    <form id="addevent" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">

                                            <label class="col-sm-2 col-form-label">Nome</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title" class="form-control" id="title" placeholder="Seu Nome">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Telefone</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="description" class="form-control" id="description" placeholder="(xx) xxxxx-xxxx">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Tipo de Serviço</label>
                                            <div class="col-sm-10">
                                                <select name="color" class="form-control" id="color">
                                                    <option value="">Selecione</option>         
                                                    <option style="color:#FFD700;" value="#FFD700">Corte Cabelo</option>
                                                    <option style="color:#FF4500;" value="#FF4500">Barba</option>
                                                    <option style="color:#8B4513;" value="#8B4513">Completo (Cabelo + Barba)</option>  
                                                    <option style="color:#228B22;" value="#228B22">Tratamento (Barba ou Cabelo)</option>
                                                    <option style="color:#A020F0;" value="#A020F0">Outro Serviço</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Hora do atendimento</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                               <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-success">Agendar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </section>       

	</body>
</html>