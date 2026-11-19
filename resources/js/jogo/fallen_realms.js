import Phaser from 'phaser';
class BatalhaScene extends Phaser.Scene {
    constructor() {
        super('BatalhaScene');

        this.turno = "jogador";

        this.danoJogador = 0;
        this.danoInimigo = 10;

        this.batalhaFinalizada = false;

        this.chanceErrojogador = 10;
        this.chanceErroInimigo = 6;

        this.chanceEsquivaJogador = 8;
        this.chanceEsquivaInimigo = 12;
    }


    rolarChance(porcentagem) {
        return Math.random() * 100 < porcentagem;
    }


    mostrarMensagem(texto, personagem, cor = '#ffffff') {

        const mensagem = this.add.text(
            personagem.x,
            personagem.y - 300,
            texto,
            {
                fontSize: '32px',
                color: cor,
                fontFamily: 'Arial',
                fontStyle: 'bold',
                stroke: '#000000',
                strokeThickness: 5
            }
        ).setOrigin(0.5);

        this.tweens.add({
            targets: mensagem,
            y: mensagem.y - 70,
            alpha: 0,
            duration: 1000,
            onComplete: () => mensagem.destroy()
        });
    }



    async controlarLuzes(resultado) {

        const ESP32 = 'http://10.122.41.226';

        try {

            // Desliga os LEDs verde e vermelho
            await fetch(`${ESP32}/led/desligarverde`, {
                method: 'POST',
                mode: 'cors'
            });

            await fetch(`${ESP32}/led/desligarvermelho`, {
                method: 'POST',
                mode: 'cors'
            });

            // Escolhe o LED de acordo com o resultado
            let rota;

            if (resultado === 'jogador') {
                rota = '/led/ligarverde';
            } else {
                rota = '/led/ligarvermelho';
            }

            // Liga o LED correspondente
            const response = await fetch(`${ESP32}${rota}`, {
                method: 'POST',
                mode: 'cors'
            });

            if (!response.ok) {
                throw new Error(`Erro HTTP: ${response.status}`);
            }

            const dados = await response.json();

            console.log('LED atualizado:', dados);

        } catch (error) {

            console.error('Erro na comunicação com ESP32:', error);

        }
    }


    async desligarTodosLEDs() {

        const ESP32 = 'http://10.122.41.226';

        try {

            const response = await fetch(
                `${ESP32}/led/desligartodos`,
                {
                    method: 'POST',
                    mode: 'cors'
                }
            );

            if (!response.ok) {
                throw new Error('Não foi possível desligar os LEDs');
            }

            const dados = await response.json();

            console.log('LEDs desligados:', dados);

        } catch (error) {
            console.error('Erro ao desligar LEDs:', error);
        }
    }


    async carregarPersonagem() {

        try {

            const token = document.cookie
                .split('; ')
                .find(row => row.startsWith('token_usuario='))
                ?.split('=')[1];

            if (!token) {
                throw new Error('Token de autenticação não encontrado');
            }

            const response = await fetch(
                '/api/personagem_jogador',
                {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                }
            );

            if (!response.ok) {
                throw new Error('Erro ao carregar personagem: ' + response.status);
            }

            const dados = await response.json();

            this.personagem = dados;

            console.log('Personagem carregado:', dados);

            this.atualizarVida();
            this.atributosJogador();

        } catch (error) {
            console.error('Erro:', error);
        }
    }


    animacaoAtaqueJogador(callback) {

        const posicaoOriginalX = this.jogador.x;
        const posicaoOriginalY = this.jogador.y;

        // Posição próxima ao inimigo
        const destinoX = this.inimigo.x - 180;

        // Movimento de avanço e pulo
        this.tweens.add({
            targets: this.jogador,

            x: destinoX,
            y: posicaoOriginalY - 100,

            duration: 350,
            ease: 'Power2',

            onComplete: () => {

                // Executa o dano quando chegar ao inimigo
                callback();

                // Retorna para a posição original
                this.tweens.add({
                    targets: this.jogador,

                    x: posicaoOriginalX,
                    y: posicaoOriginalY,

                    duration: 400,
                    ease: 'Power2'
                });
            }
        });
    }

    atributosJogador() {
        if (!this.personagem) return;
        const agilidade = this.personagem.agilidade;
        const forca = this.personagem.forca;
        const inteligencia = this.personagem.inteligencia;
        const magia = this.personagem.magia;
        const vigor = this.personagem.vigor;

        this.danoJogador = Math.floor((forca + agilidade) / 2);
    }

    atualizarVida() {

        if (!this.personagem) return;

        const vidaAtual = this.personagem.vida_atual;
        const vidaMaxima = this.personagem.vida_maxima;

        // Posição da barra de vida
        const x = 280;
        const y = 500;
        const largura = 300;
        const altura = 25;

        if (this.barraVida) {
            this.barraVida.destroy();
        }

        this.barraVida = this.add.graphics();

        // Fundo da barra
        this.barraVida.fillStyle(0x333333);
        this.barraVida.fillRect(x, y, largura, altura);

        // Vida atual
        const porcentagem = Math.max(
            0,
            Math.min(1, vidaAtual / vidaMaxima)
        );

        this.barraVida.fillStyle(0x22bb55);
        this.barraVida.fillRect(
            x,
            y,
            largura * porcentagem,
            altura
        );

        // Texto da vida
        if (this.textoVida) {
            this.textoVida.destroy();
        }

        this.textoVida = this.add.text(
            x,
            y - 30,
            `${vidaAtual} / ${vidaMaxima}`,
            {
                fontSize: '22px',
                color: '#ffffff',
                fontFamily: 'Arial'
            }
        );
    }


    atualizarVidaInimigo() {

        const x = 1380;
        const y = 500;
        const largura = 300;
        const altura = 25;

        // Remove a barra anterior
        this.barraInimigo?.destroy();
        this.textoVidaInimigo?.destroy();

        this.barraInimigo = this.add.graphics();

        // Fundo da barra
        this.barraInimigo.fillStyle(0x333333);
        this.barraInimigo.fillRect(x, y, largura, altura);

        // Calcula a porcentagem de vida
        const porcentagem = Math.max(
            0,
            this.inimigoVida / this.inimigoVidaMaxima
        );

        // Vida atual
        this.barraInimigo.fillStyle(0xdd3333);
        this.barraInimigo.fillRect(
            x,
            y,
            largura * porcentagem,
            altura
        );

        // Texto
        this.textoVidaInimigo = this.add.text(
            x,
            y - 30,
            `${this.inimigoVida} / ${this.inimigoVidaMaxima}`,
            {
                fontSize: '22px',
                color: '#ffffff'
            }
        );
    }


    atacarInimigo() {

        if (this.turno !== 'jogador' || this.batalhaFinalizada) {
            return;
        }

        // Bloqueia novos ataques durante a animação
        this.turno = 'animacao';

        this.animacaoAtaqueJogador(() => {

            // Verifica se errou
            if (this.rolarChance(this.chanceErroJogador)) {

                this.mostrarMensagem(
                    'ERROU!',
                    this.jogador,
                    '#ff5555'
                );

            }

            // Verifica se o inimigo esquivou
            else if (this.rolarChance(this.chanceEsquivaInimigo)) {

                this.mostrarMensagem(
                    'ESQUIVOU!',
                    this.inimigo,
                    '#55ccff'
                );

            }

            // Ataque acertou
            else {

                this.inimigoVida = Math.max(
                    0,
                    this.inimigoVida - this.danoJogador
                );

                this.mostrarMensagem(
                    `-${this.danoJogador} HP`,
                    this.inimigo,
                    '#ff5555'
                );

                this.atualizarVidaInimigo();
            }

            // Verifica se o inimigo morreu
            if (this.inimigoVida <= 0) {

                this.finalizarBatalha('jogador');
                return;
            }

            // Aguarda o jogador retornar à posição
            this.time.delayedCall(450, () => {

                if (this.batalhaFinalizada) return;

                this.turno = 'inimigo';

                this.time.delayedCall(800, () => {
                    this.atacarJogador();
                });

            });

        });
    }


    atacarJogador() {

        if (this.turno !== 'inimigo' || this.batalhaFinalizada) {
            return;
        }

        console.log('Inimigo atacou!');

        // Verifica se o inimigo errou
        if (this.rolarChance(this.chanceErroInimigo)) {

            this.mostrarMensagem(
                'ERROU!',
                this.inimigo,
                '#ff5555'
            );

            console.log('Inimigo errou o ataque!');

        }

        // Verifica se o jogador esquivou
        else if (this.rolarChance(this.chanceEsquivaJogador)) {

            this.mostrarMensagem(
                'ESQUIVOU!',
                this.jogador,
                '#55ccff'
            );

            console.log('Jogador esquivou!');

        }

        // Ataque acertou
        else {

            this.personagem.vida_atual = Math.max(  
                0,
                this.personagem.vida_atual - this.danoInimigo
            );

            this.mostrarMensagem(
                `-${this.danoInimigo} HP`,
                this.jogador,
                '#ff5555'
            );

            this.atualizarVida();

            this.tweens.add({
                targets: this.jogador,
                x: this.jogador.x - 15,
                duration: 70,
                yoyo: true,
                repeat: 1
            });

            console.log('Inimigo acertou!');
        }

        // Verifica se o jogador foi derrotado
        if (this.personagem.vida_atual <= 0) {
            this.finalizarBatalha('inimigo');
            return;
        }

        // Devolve o turno ao jogador
        this.turno = 'jogador';

        console.log('Seu turno!');
    }


    finalizarBatalha(vencedor) {

        this.batalhaFinalizada = true;

        // Envia o resultado para o ESP32
        this.controlarLuzes(vencedor);

        if (vencedor === 'jogador') {
            console.log('Você venceu a batalha!');
        } else {
            console.log('Você foi derrotado!');
        }

        this.add.text(
            960,
            300,
            vencedor === 'jogador' ? 'VITÓRIA!' : 'DERROTA!',
            {
                fontSize: '64px',
                color: '#e0a526',
                fontFamily: 'Cinzel',
                fontStyle: 'bold'
            }
        ).setOrigin(0.5);
    }



    preload() {
        this.load.image('background', '/assets/reino_caido_cn.png');
        this.load.image('bar', '/assets/bar_image.png');
        this.load.image('botao_atk', '/assets/botao_ataque.png');
        this.load.image('boneco_treino', '/assets/boneco_treino.png');
        this.load.image('player', '/assets/personagem_base.png');
    }

    create() {
        this.add.image(960, 540, 'background')
            .setDisplaySize(1920, 1080);

        this.add.image(960, 900, 'bar')
            .setDisplaySize(1800, 350);

        // Adicionando o jogador e o inimigo
        this.jogador = this.add.image(400, 700, 'player')
            .setDisplaySize(300, 300);
        this.inimigo = this.add.image(1500, 700, 'boneco_treino')
            .setDisplaySize(300, 300);

        this.desligarTodosLEDs();

        this.inimigoVida = 120
        this.inimigoVidaMaxima = 120
        this.atualizarVidaInimigo();

        // Adicionando o botão 
        const button = this.add.image(300, 975, 'botao_atk')
            .setDisplaySize(300, 200)
            .setInteractive({ useHandCursor: true });

        button.on('pointerdown', () => {
            this.atacarInimigo();
        });

        // Efeito ao passar o mouse
        button.on('pointerover', () => {
            button.setDisplaySize(310, 210);
        });

        button.on('pointerout', () => {
            button.setDisplaySize(300, 200);
        });

        this.carregarPersonagem();
    }

    update() {

    }

}

const config = {
    type: Phaser.AUTO,
    width: 1920,
    height: 1080,

    scale: {
        mode: Phaser.Scale.FIT,
        autoCenter: Phaser.Scale.CENTER_BOTH
    },

    scene: [BatalhaScene]
}

const fallen = new Phaser.Game(config);