import Phaser from 'phaser';
class BatalhaScene extends Phaser.Scene {
    constructor() {
        super('BatalhaScene');
    }

    preload() {
        this.load.image('background', '/assets/reino_caido_cn.png');
        this.load.image('bar', '/assets/bar_image.png');
        this.load.image('botao_atk', '/assets/botao_ataque.png');
    }

    create() {
        this.add.image(960, 540, 'background')
            .setDisplaySize(1920, 1080);

        this.add.image(960, 900, 'bar')
            .setDisplaySize(1800, 350);

        this.add.image(300, 975, 'botao_atk')
            .setDisplaySize(300, 200);
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