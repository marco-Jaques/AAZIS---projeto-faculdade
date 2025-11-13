<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<title>Reserva de Estética Automotiva</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #2e2e2e;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        min-height: 100vh;
        padding-top: 40px;
    }

    .container {
        width: 100%;
        max-width: 600px;
        background: #3a3a3a;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.5);
        color: #fff;
    }

    h1 {
        text-align: center;
        margin-bottom: 25px;
        color: #ff3b3b;
    }

    label {
        display: block;
        margin-top: 15px;
        font-weight: bold;
        color: #f1f1f1;
    }

    input, select, textarea, button {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #555;
        border-radius: 6px;
        font-size: 16px;
        box-sizing: border-box;
        background: #2b2b2b;
        color: #fff;
    }

    textarea {
        resize: vertical;
    }

    button {
        background-color: #ff3b3b;
        color: #fff;
        border: none;
        margin-top: 25px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
    }

    button:hover {
        background-color: #c72d2d;
    }

    .tela {
        display: none;
    }

    .tela.active {
        display: block;
    }

    .status-container {
        text-align: center;
        margin-top: 30px;
    }

    .progress-bar {
        width: 100%;
        height: 25px;
        background: #444;
        border-radius: 12px;
        overflow: hidden;
        margin-top: 10px;
    }

    .progress {
        height: 100%;
        background: linear-gradient(90deg, #ff3b3b, #ff7b7b);
        width: 0%;
        text-align: center;
        color: white;
        line-height: 25px;
        transition: width 0.5s ease;
    }

    @media (max-width: 640px) {
        .container {
            padding: 20px;
        }
        .carro-container {
            height: 250px;
        }
    }

    /* --- Novos estilos das partes do carro --- */
    .parte-carro {
        background: rgba(255, 59, 59, 0.9);
        color: white;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        cursor: pointer;
        transition: transform 0.2s, background 0.3s;
        position: absolute;
    }

    .parte-carro:hover {
        background: #ff7b7b;
        transform: scale(1.1);
    }

    .parte-carro.selecionada {
        background: #00c851;
        transform: scale(1.1);
    }
</style>
</head>
<body>

<div class="container">

    <!-- Tela 1: Cadastro do Cliente -->
    <div id="telaCadastro" class="tela active">
        <h1>Cadastro do Cliente</h1>
        <form id="formCadastro" name="formCadastro" action="backend/inserir_cadastro.php" method="POST">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" required autocomplete="name">

            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required placeholder="XXX.XXX.XXX-XX">

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" autocomplete="email" required>

            <label for="placa">Placa do Carro (opcional):</label>
            <input type="text" id="placa" name="placa" placeholder="Ex: ABC-1234">

            <button type="submit">Próximo</button>
        </form>
    </div>

    <!-- Tela 2: Serviços -->
    <div id="telaServico" class="tela">
        <h1>Seleção de Serviço</h1>
        <form id="formServico" name="formServico" action="backend/inserir_servico.php" method="POST">
        <input type="hidden" id="cliente_id" value="1">
            <!-- Imagem interativa do carro -->
            <div class="carro-container" style="position: relative; width: 100%; height: 300px; margin-top: 20px; border-radius: 8px; border: 1px solid #444; background: #1e1e1e; overflow: hidden;">
                <img src="https://cdn.pixabay.com/photo/2016/11/19/14/00/car-1835506_1280.jpg" alt="Carro Sedan Branco" style="width: 100%; height: 100%; object-fit: cover;">

                <span class="parte-carro" data-parte="Capô" style="top: 25%; left: 42%;">Capô</span>
                <span class="parte-carro" data-parte="Porta Dianteira Esq." style="top: 45%; left: 15%;">Porta Dianteira Esq.</span>
                <span class="parte-carro" data-parte="Porta Dianteira Dir." style="top: 45%; right: 15%;">Porta Dianteira Dir.</span>
                <span class="parte-carro" data-parte="Roda Esq." style="bottom: 12%; left: 25%;">Roda Esq.</span>
                <span class="parte-carro" data-parte="Roda Dir." style="bottom: 12%; right: 25%;">Roda Dir.</span>
                <span class="parte-carro" data-parte="Para-choque" style="top: 68%; left: 46%;">Para-choque</span>
            </div>

            <input type="hidden" id="partesSelecionadas" name="partesSelecionadas">

            <label for="modelo">Modelo do Carro:</label>
            <input list="modelos" id="modelo" name="modelo" placeholder="Ex: Corolla, Onix, Civic..." required>
            <datalist id="modelos">
                <option value="Corolla">
                <option value="Civic">
                <option value="Onix">
                <option value="HB20">
                <option value="Golf">
                <option value="Compass">
                <option value="Creta">
                <option value="Argo">
                <option value="Polo">
                <option value="Tracker">
            </datalist>

            <label for="servico">Descreva o serviço desejado:</label>
            <textarea id="servico" name="servico" rows="4" placeholder="Ex.: Lavagem completa, polimento, detalhamento de interior..." required></textarea>

            <label for="funcionario">Funcionário responsável:</label>
            <select id="funcionario" name="funcionario" required>
                <option value="">Selecione</option>
                <option value="1">João</option>
                <option value="2">Maria</option>
                <option value="3">Carlos</option>
            </select>

            <button type="submit">Finalizar Reserva</button>
        </form>
    </div>

    <!-- Tela 3: Status -->
    <div id="telaStatus" class="tela">
        <h1>Status do Serviço</h1>
        <div class="status-container">
            <p id="statusTexto">O carro está sendo preparado...</p>
            <div class="progress-bar">
                <div class="progress" id="barraProgresso">0%</div>
            </div>
            <button id="btnVoltar">Nova Reserva</button>
        </div>
    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded", () => {

    // ======== VALIDAÇÕES BÁSICAS ========
    const cpfInput = document.getElementById('cpf');
    cpfInput.addEventListener('input', function() {
        let value = cpfInput.value.replace(/\D/g, '');
        if (value.length > 11) value = value.slice(0, 11);
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        cpfInput.value = value;
    });

    function validarCPF(cpf) {
        cpf = cpf.replace(/\D/g, '');
        if (cpf.length !== 11) return false;
        if (/^(\d)\1+$/.test(cpf)) return false;
        let soma = 0;
        for (let i = 0; i < 9; i++) soma += parseInt(cpf.charAt(i)) * (10 - i);
        let resto = (soma * 10) % 11;
        if (resto === 10) resto = 0;
        if (resto !== parseInt(cpf.charAt(9))) return false;
        soma = 0;
        for (let i = 0; i < 10; i++) soma += parseInt(cpf.charAt(i)) * (11 - i);
        resto = (soma * 10) % 11;
        if (resto === 10) resto = 0;
        return resto === parseInt(cpf.charAt(10));
    }

    // ======== ELEMENTOS ========
    const telaCadastro = document.getElementById("telaCadastro");
    const telaServico = document.getElementById("telaServico");
    const telaStatus = document.getElementById("telaStatus");
    const formCadastro = document.getElementById("formCadastro");
    const formServico = document.getElementById("formServico");
    const btnVoltar = document.getElementById("btnVoltar");

    // ======== ENVIO DO CADASTRO DO CLIENTE ========
    formCadastro.addEventListener("submit", async (e) => {
        e.preventDefault();

        const formData = new FormData(formCadastro);

        try {
            const resposta = await fetch("backend/inserir_cadastro.php", {
                method: "POST",
                body: formData
            });

            const texto = await resposta.text();
            console.log("Resposta bruta:", texto);

            let data;
            try {
                data = JSON.parse(texto);
            } catch {
                alert("Erro inesperado: resposta não é JSON.");
                console.error("Conteúdo recebido:", texto);
                return;
            }

            if (data.status === "sucesso") {
                console.log("✅ Cliente cadastrado:", data);

                // Armazena o ID
                localStorage.setItem('cliente_id', data.id);
                document.getElementById("cliente_id").value = data.id;

                // Troca as telas
                telaCadastro.classList.remove("active");
                telaServico.classList.add("active");
            } else {
                alert("Erro ao cadastrar cliente: " + data.mensagem);
            }

        } catch (erro) {
            console.error("❌ Erro ao enviar cadastro:", erro);
            alert("Falha na comunicação com o servidor.");
        }
    });

    // ======== CARREGA ID DO CLIENTE (se já salvo) ========
    const clienteSalvo = localStorage.getItem('cliente_id');
    if (clienteSalvo) document.getElementById('cliente_id').value = clienteSalvo;

    // ======== SELEÇÃO DAS PARTES DO CARRO ========
    document.querySelectorAll('.parte-carro').forEach(parte => {
        parte.addEventListener('click', () => {
            parte.classList.toggle('selecionada');
            const selecionadas = Array.from(document.querySelectorAll('.parte-carro.selecionada'))
                .map(p => p.dataset.parte);
            document.getElementById('partesSelecionadas').value = selecionadas.join(', ');
        });
    });

    // ======== ENVIO DO SERVIÇO ========
    formServico.addEventListener('submit', async (e) => {
        e.preventDefault();

        const cliente_id = document.getElementById('cliente_id').value;
        const modelo = document.getElementById('modelo').value.trim();
        const servico = document.getElementById('servico').value.trim();
        const funcionario = document.getElementById('funcionario').value;
        const partes = document.getElementById('partesSelecionadas').value;

        if (!modelo || !servico || !funcionario || !partes)
            return alert('Por favor, preencha todos os campos.');

        try {
            const resposta = await fetch('backend/inserir_servico.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `cliente_id=${encodeURIComponent(cliente_id)}&modelo=${encodeURIComponent(modelo)}&servico=${encodeURIComponent(servico)}&funcionario=${encodeURIComponent(funcionario)}&partes=${encodeURIComponent(partes)}`
            });

            const resultado = await resposta.json();

            if (resultado.status === 'sucesso') {
                telaServico.classList.remove('active');
                telaStatus.classList.add('active');

                // --- Animação de progresso ---
                let progresso = 0;
                const barra = document.getElementById('barraProgresso');
                const textoStatus = document.getElementById('statusTexto');

                const interval = setInterval(() => {
                    progresso += 10;
                    barra.style.width = progresso + '%';
                    barra.textContent = progresso + '%';

                    if (progresso < 40)
                        textoStatus.innerHTML = `Lavagem em andamento...<br><small>Partes: <b>${partes}</b></small>`;
                    else if (progresso < 80)
                        textoStatus.innerHTML = `Polimento e acabamento...<br><small>Partes: <b>${partes}</b></small>`;
                    else if (progresso < 100)
                        textoStatus.innerHTML = `Finalizando o serviço...<br><small>Partes: <b>${partes}</b></small>`;
                    else {
                        textoStatus.innerHTML = `Serviço concluído! Pronto para retirada.<br><small>Partes trabalhadas: <b>${partes}</b></small>`;
                        clearInterval(interval);
                    }
                }, 500);

            } else {
                alert('Erro ao salvar serviço: ' + resultado.mensagem);
            }

        } catch (erro) {
            alert('Erro de conexão com o servidor.');
            console.error(erro);
        }
    });

    // ======== BOTÃO "NOVA RESERVA" ========
    btnVoltar.addEventListener('click', () => {
        telaStatus.classList.remove('active');
        telaCadastro.classList.add('active');
        formCadastro.reset();
        formServico.reset();
    });
});
</script>


</body>
</html>