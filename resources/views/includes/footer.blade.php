<style>
    .pages-f li a {
        font-size: 100%;
    }
</style>
<!----------- Footer ------------>
<footer class="footer-bs">
    <div class="row">
        <div class="col-md-3 footer-brand animated fadeInLeft">
            <h2><img src="{{ asset('img/logoe.png') }}" alt="" width="100px"></h2>    
        </div>
        <div class="col-md-4 footer-nav animated fadeInUp">
            <h4>Menu —</h4>
            <div class="col-md-6">
                <ul class="pages pages-f">
                    <li><a href="{{ route('home.avisos.index') }}">Avisos</a></li>
                    <li><a href="{{ route('home.diretoria.index') }}">Diretoria</a></li>
                    <li><a href="{{ route('home.estatuto.index') }}">Estatuto</a></li>
                    <li><a href="{{ route('home.contas.index') }}">Prestação de Contas</a></li>
                    <li><a href="{{ route('home.funcionarios.index') }}">Funcionários</a></li>
                    <li><a href="{{ route('home.albuns.index') }}">Galeria de Imagens</a></li>
                    <li><a href="{{ route('home.contato.index') }}">Contato</a></li>
                        <li><a href="{{ route('home.horario.index')}}">Horário de Funcionamento ao Público externo</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-2 footer-social animated fadeInDown">
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
            <script>
                    // Make a request for a user with a given ID
                    axios.get('/visitas')
                    .then(function (response) {
                        document.querySelector('#total-de-visitas').innerHTML  =response.data
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .finally(function () {
                        // always executed
                    });
            </script>
            <h4>Total de visitas</h4>
            <ul>
                <li id="total-de-visitas">Total de visitas: </li>
            </ul>
            <h4>Redes Sociais</h4>
            <ul>
                <li><a href="https://api.whatsapp.com/send?phone=555596650450">Whatsapp</a></li>
            </ul>
        </div>
    </div>
</footer>
<section style="text-align:center; margin:10px auto;">
    <p>Desenvolvido por: <a href="https://williamtrindade.github.io/">William Trindade</a></p>
</section>
    


<style>
    .footer-bs {
    background-color: green;
	padding: 60px 40px;
	color: rgba(255,255,255,1.00);
	margin-bottom: 20px;
	border-bottom-right-radius: 6px;
	border-top-left-radius: 0px;
	border-bottom-left-radius: 6px;
}
.footer-bs .footer-brand, .footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { padding:10px 25px; }
.footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-color: transparent; }
.footer-bs .footer-brand h2 { margin:0px 0px 10px; }
.footer-bs .footer-brand p { font-size:12px; color:rgba(255,255,255,0.70); }

.footer-bs .footer-nav ul.pages { list-style:none; padding:0px; }
.footer-bs .footer-nav ul.pages li { padding:5px 0px;}
.footer-bs .footer-nav ul.pages a { color:rgba(255,255,255,1.00); font-weight:bold; text-transform:uppercase; }
.footer-bs .footer-nav ul.pages a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }
.footer-bs .footer-nav h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
	margin-bottom:10px;
}

.footer-bs .footer-nav ul.list { list-style:none; padding:0px; }
.footer-bs .footer-nav ul.list li { padding:5px 0px;}
.footer-bs .footer-nav ul.list a { color:rgba(255,255,255,0.80); }
.footer-bs .footer-nav ul.list a:hover { color:rgba(255,255,255,0.60); text-decoration:none; }

.footer-bs .footer-social ul { list-style:none; padding:0px; }
.footer-bs .footer-social h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
}
.footer-bs .footer-social li { padding:5px 4px;}
.footer-bs .footer-social a { color:rgba(255,255,255,1.00);}
.footer-bs .footer-social a:hover { color:rgba(255,255,255,0.80); text-decoration:none; }

.footer-bs .footer-ns h4 {
	font-size: 11px;
	text-transform: uppercase;
	letter-spacing: 3px;
	margin-bottom:10px;
}
.footer-bs .footer-ns p { font-size:12px; color:rgba(255,255,255,0.70); }

@media (min-width: 768px) {
	.footer-bs .footer-nav, .footer-bs .footer-social, .footer-bs .footer-ns { border-left:solid 1px rgba(255,255,255,0.10); }
}
</style>