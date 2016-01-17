<?php
    require '../vendors/autoload.php';
    use Mailgun\Mailgun;
    class Email {
        public $emal;
        public $name;
        function __construct($attributes) {
            if(!empty($attributes)) {
                $this->email = $attributes['email'];
                $this->name = $attributes['name'];
            }
        }
        public function send() {
            # Include the Autoloader (see "Libraries" for install instructions)
            # Instantiate the client.
            $mgClient = new Mailgun('');
            $domain = "";
            # Make the call to the client.
            $result = $mgClient->sendMessage($domain, array(
                'from'    => 'InfoJr UFBA <contato@infojr.com.br>',
                'to'      => 'Você <'.$this->email.'>',
                'subject' => 'Capacitação em Git & GitHub - Inscrito',
                'text'    => $this->name,
                'html'    => '<html style="width:500px"><style>html{width:500px; text-align:center;} img{width: 100%;} a{padding:5px 15px;}</style><img style="width:100%" src="http://www.infojr.com.br/git-github/assets/img/git-confirm.jpg"></img>
                <a style="padding:5px 15px" href="www.infojr.com.br">www.infojr.com.br</a>
                <a style="padding:5px 15px" href="www.facebook.com/infojrnews">/infojrnews</a>
                </html>'
            ));
            return $result;
        }
    }
?>