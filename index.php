<?php session_start(); ?>
<!DOCTYPE html>
	<head>
		<title>Git & GitHub</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="assets/img/professorctocat-git.svg" rel="shortcut icon" type="image/x-icon">
		<link type="text/css" rel="stylesheet"  href="assets/css/stylesheet.css"/>
		<link type="text/css" rel="stylesheet"  href="vendors/octicons/octicons.css"/>
	</head>
	<body>
		<section class="aside">
			<div class="text">
				<h2>Versionamento com</h2>
				<h1 class="github">Git & GitHub</h1>
                <h2 class="right">Dia 19 de Fevereiro às 09hs</h2>
                <a href="#subscribe"><button id="sign-up" class="aside-btn"><h2><i class="octicon octicon-git-pull-request"></i> Inscreva-se</h2></button></a>
	    	</div>
	    	<div class="professorctocat">
	    	    <img src="assets/img/professorctocat-git.svg" alt="octocat">
	    	</div>
	    	<div class="triangle"></div>
	    </section>
		<section class="about">
	    	<div class="triangle-invert"></div>
			<h1>Git & GitHub</h1>
            <article>
                <p><b>Git</b> é um sistema de controle de versão gratuíto e open source projetado para lidar com tudo. Dos pequenos aos grandes projetos, com velocidade e eficiência.
                </p>
                <br>
                <p><b>GitHub</b> é um serviço de hospedagem de repositórios Git baseado na Web. Ele oferece todas as funcionalidades do controle de revisão distribuído e gerenciamento de código fonte (SCM), bem como a adição de suas próprias características. Ao contrário do Git, que é uma ferramenta de linha de comando, GitHub oferece uma interface gráfica baseada na Web e desktop, bem como a integração móvel. Ele também fornece controle de acesso e vários recursos de colaboração, tais como rastreamento de bugs, solicitações de recursos, gerenciamento de tarefas, e wikis para cada projeto.
                </p>
            </article>
		</section>
        <section class="why">
            <main>
                <div class="box">
                    <div class="circle">
                        <i class="octicon octicon-octoface"></i>
                    </div>
                    <p><b>Prefere salvar código no pen drive e entregar pro amigo, marcar pra desenvolver na casa do brother, ou enviar tudo por e-mail? Pare com isso, jovem...</b></p>
                </div>
                <div class="box">
                    <div class="circle">
                        <i class="octicon octicon-octoface"></i>
                    </div>
                    <p><b>Trabalhe remotamente com os colaboradores do projeto, revise alterações, comente sobre linhas de código, problemas de relatório, e planeje o futuro do seu projeto.</b></p>
                </div>
                <div class="box">
                    <div class="circle">
                        <i class="octicon octicon-octoface"></i>
                    </div>
                    <p><b>Você precisa conhecer e utilizar o versionamento com Git & GitHub, e a InfoJr UFBA vai te proporcionar isso.</b></p>
                </div>
            </main>
        </section>
        <section id="subscribe" class="inscription">
            <h1>Inscreva-se!</h1>
            <?php if (isset($_SESSION['msg'])): ?>
                <div class="msg <?php echo $_SESSION['type']; ?>"><?php echo $_SESSION['msg']; ?></div>
                <?php unset($_SESSION['msg']); unset($_SESSION['type']); ?>
            <?php endif; ?>
            <div class="msg-fixed">
                <h3>Taxa de inscrição: 1Kg de alimento não perecível, que deve ser entregue no dia da capacitação.</h3>
            </div>
            <form action="controllers/user" method="POST" enctype="multipart/form-data">
                <input id="name" class="field left" title="Insira o seu nome aqui." type="text" name="name" placeholder="Qual o seu nome?" required="required">
                <input id="email" class="field right" title="Insira o seu e-mail aqui." type="email" name="email" placeholder="Qual o seu e-mail?" value="" required="required">
                <input id="phone" class="field left" title="Insira o seu telefone aqui." name="phone" placeholder="E o seu telefone?" value="" required="required">
                <input class="field right" title="Insira o seu Número de Matrícula aqui." type="number" min="9" name="registry" placeholder="Número de matrícula" required="required">
                <select class="field left" name="course" required="required">
                    <option value="">Selecione seu Curso</option>
                    <option value="CC">Ciência da Computação</option>
                    <option value="SI">Sistemas de Informação</option>
                    <option value="LC">Licenciatura em Computação</option>
                    <option value="EC">Engenharia de Computação</option>
                    <option value="BI">Bacharelado Interdisciplinar C&T</option>
                    <option value="OT">Outro</option>
                </select>
                <select class="field right" name="semester" required="required">
                    <option value="">Selecione seu Semestre</option>
                    <option value="1">1°Semestre</option>
                    <option value="2">2°Semestre</option>
                    <option value="3">3°Semestre</option>
                    <option value="4">4°Semestre</option>
                    <option value="A4">Acima do 4°Semestre</option>
                </select>
                <p>* Após a inscrição, você receberá um e-mail de confirmação. Verifique também a sua caixa de spam. Se NÃO receber o e-mail, contate-nos através do contato@infojr.com.br.</p>
                <div class="g-recaptcha" data-sitekey=""></div>
                <button class="send-btn" name="action" value="create" type="submit"><i class="octicon octicon-git-merge"></i> Enviar</button>
            </form>
        </section>
        <footer>
            <h4>© InfoJr UFBA - 2016</h4>
        </footer>
        <script src="vendors/jquery/jquery-2.1.4.min.js"></script>
		<script src="assets/js/scripts.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
	</body>
</html>
