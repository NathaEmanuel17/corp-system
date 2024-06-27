<div style="display: flex; justify-content: center">
    <img src="{{ url('assets/images/logo/iapa.jpg') }}" alt="logo IAPA">
</div>

<h2 style="display: flex; justify-content: center">
    Olá {{ $data['userName'] }}! Bem-vindo ao Sistema do IAPA!
</h2>

<p style="display: flex; justify-content: center">
    Neste e-mail conterá informações para o primeiro acesso ao sistema.
</p>

<div style="display: flex; justify-content: center">
    <section style="width: 50%; text-align: center;">
        <p ><strong>E-mail: </strong> {{ $data['userEmail'] }}</p>
        <p><strong>Senha: </strong> {{ $data['password'] }}</p>
        
    </section>
</div>

<div style="display: flex; justify-content: center">
    <a href="{{ env('APP_URL') }}/login" style="background-color: #7367f0; color: white; padding: 8px 12px">Acessar Sistema</a>
</div>

<p style="display: flex; justify-content: center; color: red;">
    <small>
        <strong>
            Atenção: 
        </strong>
        Essas informações são secretas, após acessar o sistema altere sua senha.
    </small>
</p>

