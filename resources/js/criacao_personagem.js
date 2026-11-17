
import Phaser from 'phaser';

class BatalhaScene extends Phaser.Scene {

    constructor() {
        super('BatalhaScene');

        this.personagem = null;

        this.vidaJogador = 0;
        this.vidaInimigo = 100;

        this.turno = 'jogador';
        this.defendendo = false;
        this.batalhaFinalizada = false;
    }

    create() {

        this.cameras.main.setBackgroundColor('#111116');

        this.add.text(400, 30, 'FALLEN REALMS', {
            fontSize: '32px',
            color: '#e0a526',
            fontStyle: 'bold'
        }).setOrigin(0.5);

        this.statusText = this.add.text(
            400, 100,
            'Carregando personagem...',
            {
                fontSize: '20px',
                color: '#ffffff'
            }
        ).setOrigin(0.5);

        this.carregarPersonagem();
    }

    async carregarPersonagem() {

        try {

            const resposta = await fetch('/api/personagem_jogador', {
                method: 'GET',
                credentials: 'same-origin',
                headers: {
                    'Accept': 'application/json'
                }
            });

            const dados = await resposta.json();

            if (!resposta.ok || dados.erro === 's') {
                throw new Error(dados.mensagem || 'Erro ao carregar personagem');
            }

            this.personagem = dados.personagem;

            this.vidaJogador = Number(this.personagem.vida_atual);

            this.criarInterface();

        } catch (erro) {

            this.statusText.setText(
                'Erro: ' + erro.message
            );

            console.error(erro);
        }
    }

    criarInterface() {

        this.statusText.destroy();

        const p = this.personagem;

        // ==========================
        // PERSONAGEM
        // ==========================

        this.add.text(50, 100, p.nome, {
            fontSize: '26px',
            color: '#e0a526',
            fontStyle: 'bold'
        });

        this.add.text(50, 140,
            `${p.classe} | ${p.raca} | Nível ${p.nivel}`, {
                fontSize: '17px',
                color: '#ffffff'
            }
        );

        this.textoVidaJogador = this.add.text(
            50, 190,
            `Vida: ${this.vidaJogador}/${p.vida_maxima}`,
            {
                fontSize: '18px',
                color: '#65d66e'
            }
        );

        // ==========================
        // INIMIGO
        // ==========================

        this.add.text(570, 100, 'Goblin', {
            fontSize: '26px',
            color: '#ff5555',
            fontStyle: 'bold'
        });

        this.textoVidaInimigo = this.add.text(
            570, 140,
            `Vida: ${this.vidaInimigo}/100`,
            {
                fontSize: '18px',
                color: '#ff7777'
            }
        );

        // ==========================
        // ATRIBUTOS
        // ==========================

        this.add.text(50, 260, 'ATRIBUTOS', {
            fontSize: '21px',
            color: '#e0a526'
        });

        const atributos = [
            `Força: ${p.forca}`,
            `Vigor: ${p.vigor}`,
            `Agilidade: ${p.agilidade}`,
            `Magia: ${p.magia}`,
            `Inteligência: ${p.inteligencia}`
        ];

        atributos.forEach((atributo, index) => {

            this.add.text(
                50,
                300 + (index * 30),
                atributo,
                {
                    fontSize: '17px',
                    color: '#ffffff'
                }
            );

        });

        // ==========================
        // COMBATE
        // ==========================

        this.turnoText = this.add.text(
            400, 260,
            'SEU TURNO',
            {
                fontSize: '24px',
                color: '#e0a526',
                fontStyle: 'bold'
            }
        ).setOrigin(0.5);

        this.criarBotao(
            280, 390,
            'ATACAR',
            () => this.atacar()
        );

        this.criarBotao(
            400, 390,
            'DEFENDER',
            () => this.defender()
        );

        this.criarBotao(
            520, 390,
            'HABILIDADE',
            () => this.habilidade()
        );

        this.atualizarInterface();
    }

    criarBotao(x, y, texto, callback) {

        const botao = this.add.text(x, y, texto, {
            fontSize: '17px',
            color: '#ffffff',
            backgroundColor: '#49351b',
            padding: {
                x: 15,
                y: 12
            }
        }).setOrigin(0.5);

        botao.setInteractive({ useHandCursor: true });

        botao.on('pointerdown', callback);

        botao.on('pointerover', () => {
            botao.setStyle({
                backgroundColor: '#806020'
            });
        });

        botao.on('pointerout', () => {
            botao.setStyle({
                backgroundColor: '#49351b'
            });
        });
    }

    atacar() {

        if (!this.podeJogar()) return;

        const dano = 15 + Math.floor(Number(this.personagem.forca) / 2);

        this.vidaInimigo -= dano;

        this.finalizarAcao();
    }

    defender() {

        if (!this.podeJogar()) return;

        this.defendendo = true;

        this.finalizarAcao();
    }

    habilidade() {

        if (!this.podeJogar()) return;

        const dano = 25 + Math.floor(Number(this.personagem.magia) / 2);

        this.vidaInimigo -= dano;

        this.finalizarAcao();
    }

    podeJogar() {

        return this.turno === 'jogador'
            && !this.batalhaFinalizada;
    }

    finalizarAcao() {

        if (this.vidaInimigo <= 0) {

            this.vidaInimigo = 0;
            this.batalhaFinalizada = true;

            this.atualizarInterface();

            this.turnoText.setText('VITÓRIA!');

            return;
        }

        this.atualizarInterface();

        this.turno = 'inimigo';

        this.turnoText.setText('TURNO DO INIMIGO');

        this.time.delayedCall(1000, () => {
            this.turnoInimigo();
        });
    }

    turnoInimigo() {

        if (this.batalhaFinalizada) return;

        let dano = 15;

        if (this.defendendo) {
            dano = Math.floor(dano / 2);
            this.defendendo = false;
        }

        this.vidaJogador -= dano;

        if (this.vidaJogador <= 0) {

            this.vidaJogador = 0;
            this.batalhaFinalizada = true;

            this.atualizarInterface();

            this.turnoText.setText('DERROTA!');

            return;
        }

        this.turno = 'jogador';

        this.turnoText.setText('SEU TURNO');

        this.atualizarInterface();
    }

    atualizarInterface() {

        this.textoVidaJogador.setText(
            `Vida: ${this.vidaJogador}/${this.personagem.vida_maxima}`
        );

        this.textoVidaInimigo.setText(
            `Vida: ${this.vidaInimigo}/100`
        );
    }
}

const config = {

    type: Phaser.AUTO,

    width: 800,
    height: 600,

    backgroundColor: '#111116',

    scene: [BatalhaScene]
};

new Phaser.Game(config);
