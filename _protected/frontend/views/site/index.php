<?php
use yii\web\View;
/* @var $this yii\web\View */

$this->registerCss("
body {
  background-color: #000;
  overflow: hidden;
  color: linen;
}
img {
  width: 100vw;
  display: block;
  margin: 0 auto;
}
canvas {
  background: linear-gradient(
    rgba(0, 0, 0, 0) 0%,
    rgba(0, 0, 0, 1) 50%,
    rgba(0, 0, 0, 0) 100%
  );
  display: inline-block;
  position: absolute;
  bottom: 0px;
  z-index: 10;
}
#buffer {
  display: none;
}
");

$this->registerJs("
let rid = null;
let frames = 0;
let index = 0;
let fontSize = 50;

let lines = [];
let points = [];

let speed = 11;

const ctx = canvas.getContext(\"2d\");
const btx = buffer.getContext(\"2d\");

let bw = (buffer.width = fontSize);
let bh = (buffer.height = fontSize);
let cw = (canvas.width = window.innerWidth);
let ch = (canvas.height = 300);
btx.fillStyle = ctx.fillStyle = \"#fff\";
btx.font = ctx.font = fontSize + \"px Courier New\";

let text = [
  \"Welcome\",
  \"Udon Food Delivery\",
  
  
 
];

text.map((t, i) => {
  text[i] = t.toUpperCase();
});

class Line {
  constructor(text) {
    this.text = text;
    this.width = ctx.measureText(this.text).width;
    this.startingPoint = -this.width / 2;
    this.letters = [];

    this.lettersRy();
  }

  lettersRy() {
    for (let i = 0; i < this.text.length; i++) {
      let letter = this.text[i];
      let _start =
        this.startingPoint + ctx.measureText(this.text.substring(0, i)).width;
      let pos = { x: _start, y: (ch - fontSize) / 2 };
      this.letters.push(new Letter(i, pos, letter));
    }
  }
}

class Letter {
  constructor(i, pos, letter) {
    this.index = index;
    this.letter = letter;
    this.pos = pos;
    this.points = [];
    this.addToPointsRy();
  }
  addToPointsRy() {
    btx.clearRect(0, 0, bw, bh);
    btx.fillText(this.letter, 2, bh - 2);
    let imgData = btx.getImageData(0, 0, bw, bh);
    let pixels = imgData.data;

    for (let i = 0; i < pixels.length; i += 4) {
      if (pixels[i] == 255) {
        let x = (0.25 * i) % bw;
        let y = ~~(0.25 * i / bw);
        this.points.push(new Particle(x + this.pos.x, y + this.pos.y));
      }
    }
  }
}

class Particle {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.pos = { x, y };
    this.pn = {
      // positive or negative
      x: Math.random() > 0.2 ? 1 : -1,
      y: Math.random() > 0.2 ? -1 : 1
    };
    this.vel = {
      x: this.pn.x * (this.pn.x + Math.random() * 10) / 90,
      y: this.pn.y * (this.pn.y + Math.random() * 10) / 90,
      alp: (0.1 + Math.random()) / 60
    };
    this.alp = 1;
  }

  draw() {
    ctx.fillStyle = \"rgba(255,255,255,\" + this.alp + \")\";
    ctx.beginPath();
    ctx.fillRect(this.pos.x, this.pos.y, 1, 1);
  }

  update() {
    this.pos.x += this.vel.x;
    this.pos.y += this.vel.y;
    this.alp -= this.vel.alp;
  }
}

for (let i = 0; i < text.length; i++) {
  lines.push(new Line(text[i]));
}

let numLine = 0;
let line = lines[numLine];

ctx.translate(cw / 2, 0);
function Frame() {
  rid = window.requestAnimationFrame(Frame);

  ctx.clearRect(-cw, -ch, 2 * cw, 2 * ch);
  points.map((p, i) => {
    p.update();
    p.draw();
    if (p.alp <= 0) {
      points.splice(i, 1);
    }
  });

  if (frames % speed == 0) {
    line.letters[index].points.map(p => {
      p.pos = { x: p.x, y: p.y };
      p.alp = 1;
    });
    points = points.concat(line.letters[index].points);
    index++;
  }

  if (index == line.letters.length) {
    numLine++;
    line = lines[numLine % text.length];
    index = 0;
    frames = 0;
  }
  frames++;
}
//Frame();

function Init() {
  cw = canvas.width = window.innerWidth;
  ctx.translate(cw / 2, 0);
  //let imgHeight = window.getComputedStyle(LC, null).getPropertyValue(\"height\");
  //canvas.style.bottom = imgHeight + \"px\";
  if (rid) {
    window.cancelAnimationFrame(rid);
    rid = null;
  }
  Frame();
}

setTimeout(function() {
  Init();
  window.addEventListener(\"resize\", Init, false);
}, 15);
");

?>
<div style="display: none;"> <?php $this->title = Yii::t('app', Yii::$app->name);?> </div>

<body>

<img id="LC" src="https://images.pexels.com/photos/54455/cook-food-kitchen-eat-54455.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Leonard Cohen" />
<canvas id="buffer"></canvas>
<canvas id="canvas"></canvas>

</body>
