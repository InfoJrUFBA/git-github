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
                <h2 class="right">Dia 19 de Fevereiro às 14hs</h2>
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
                        <svg viewBox="0 0 24 24">
                            <path fill="#153446" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
                        </svg>
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
                        <svg viewBox="0 0 24 24">
                            <path fill="#153446" d="M2,21H20V19H2M20,8H18V5H20M20,3H4V13A4,4 0 0,0 8,17H14A4,4 0 0,0 18,13V10H20A2,2 0 0,0 22,8V5C22,3.89 21.1,3 20,3Z" />
                        </svg>
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
        <footer class="a">
            <div class="about-us">
                <a href="http://www.infojr.com.br" target="_blank"><img src="assets/img/infojr-lb-flat.svg" alt=""></a>
                <p>Empresa Júnior de Informática da Universidade Federal da Bahia, fundada em 26 de Janeiro de 1998, formada por alunos dos cursos de computação.</p>
            </div>
            <div class="contact-us">
                <div class="contact">
                    <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                        <path d="M0 0h24v24H0z" fill="none"/>
                    </svg><p>contato@infojr.com.br</p>
                </div>
                <div class="contact">
                    <svg height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                    </svg><p>+55 71 3223-6268</p>
                </div>
                <a href="https://facebook.com/infojrnews" class="contact" target="_blank">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path d="M19,4V7H17A1,1 0 0,0 16,8V10H19V13H16V20H13V13H11V10H13V7.5C13,5.56 14.57,4 16.5,4M20,2H4A2,2 0 0,0 2,4V20A2,2 0 0,0 4,22H20A2,2 0 0,0 22,20V4C22,2.89 21.1,2 20,2Z" />
                    </svg><p> /infojrnews</p>
                </a>
            </div>
        </footer>
        <footer class="b">
            <a href="www.infojr.com.br" target="_blank"><h4>© InfoJr UFBA - 2016</h4></a>
        </footer>
        <script src="vendors/jquery/jquery-2.1.4.min.js"></script>
		<script src="assets/js/scripts.js"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
	</body>
</html>
