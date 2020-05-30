<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

	<head>

        <title>Barbearia Andrade - A Melhor Barbearia da Cidade</title>

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
         
    	<!-- header -->
        <header>
    		<div class="container">
    			<div class="header d-lg-flex justify-content-between align-items-center">
    				<div class="header-agile">
    					<h1>
    						<a class="navbar-brand logo" href="index.html">
    							<img class="fa fa-scissors" src="images/barbeandrade.png" alt="Barbearia Andrade">
    						</a>
    					</h1>
    				</div>
    				<div class="nav_w3ls">
    					<nav>
    						<label for="drop" class="toggle mt-lg-0 mt-1"><span class="fa fa-bars" aria-hidden="true"></span></label>
    						<input type="checkbox" id="drop" />
    							<ul class="menu">
    								<li class="mr-lg-3 mr-2 active"><a href="index.html">Inicio</a></li>
    								<li class="mr-lg-3 mr-2"><a href="index.html#sobre">Sobre Nós</a></li>
    								<li class="mr-lg-3 mr-2"><a href="index.html#servico">Serviços</a></li>
    								<li class="mr-lg-3 mr-2"><a href="index.html#preco">Preços</a></li>
    								<li class="mr-lg-3 mr-2"><a href="agendamento.php">Agendar Horário</a></li>

    							</ul>
    					</nav>
    				</div>

    			</div>
    		</div>
    	</header>
    	<!-- //header -->
       
    	<!-- Info Agendamento-->
        <section class="content-info " id="agende">
            <div class="container py-md-5 ">
    		<h3 class="heading text-center mb-3 mb-sm-5 info-agenda ">Agende Agora Mesmo Seu Horário!</h3>

                <div class="mmo-info text-center px-lg-6">
                    <div class="title-desc px-lg-6">
                        <p class="px-lg-6 mmo-info">Na Barbearia Andrade você pode ver nossa disponibilidade de agenda e marcar seu horário direto pelo nosso site! Clique no dia que você deseja ser atendendido, escolha seu horário, tipo de serviço e pronto. Estamos esperando você!.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- //Info Agendamento -->

        <!--Calendario-->
         <section class="content-info py-5" id="calendario">
            <div class="container">
                <div id='calendar'></div>

                    <div class="title-desc px-lg-5">
                        <br/>
                        <p class="px-lg-6 text-center">*Nós entraremos em contato com o numero que você disponibilizar para fazer a confirmação do agendamento </p>
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
                                                <input type="text" name="description" class="form-control" id="description" placeholder="(Somente numeros)">
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


    	<!-- footer -->
        <footer class="footer-content">
            <div class="layer footer">
                <div class="container-fluid">
                    <div class="row footer-top-inner-w3ls">
                        
                        <div class="col-lg-4 col-md-6  mb-lg-0 mb-5">
                            <div class="footer-w3pvt">
                                <h3 class="mb-3 w3pvt_title">Endereço da Barbearia Andrade</h3>
                                <hr>
                                <ul class="list-info-w3pvt last-w3ls-contact mt-lg-4">
                                    <li>
                                        <p> Rua João Augusto Ferreira, 98</p>

                                    </li>
                                    <li class="my-2">
                                        <p> Santa Clara - RS</p>

                                    </li>
                                    

                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6  mb-lg-0 mb-5">
                            <div class="footer-w3pvt">
                                <h3 class="mb-3 w3pvt_title">Horário de Funcionamento</h3>
                                <hr>
                                <ul class="list-info-w3pvt last-w3ls-contact mt-lg-4">
                                    <li>
                                        <p> Segunda - Sexta 08.00 - 19.00</p>

                                    </li>
                                    <li class="my-2">
                                        <p>Sabado 08.00 - 19.00</p>

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                            <div class="footer-w3pvt">
                                <h3 class="mb-3 w3pvt_title">Entre em Contato </h3>
                                <hr>
                                <div class="last-w3ls-contact">
                                    <p>
                                        <a href="mailto:example@email.com">info@example.com</a>
                                    </p>
                                </div>
                                <div class="last-w3ls-contact my-2">
                                    <p>(55) 99998 8984</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <p class="copy-right-grids text-li text-center my-sm-4 my-4">© 2019 Barbearia Andrade. All Rights Reserved</p>
            </div>
        </footer>
        <!-- //footer -->
	</body>
</html>