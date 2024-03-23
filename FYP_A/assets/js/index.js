/* scroll event */
document.addEventListener('scroll', function(){
    //index-head Parallax scrolling
    const scroll = window.scrollY;
    const index_head = $('.index-head');
    index_head[0].style.transform = `translateY(${scroll * 0.6}px)`

    //goto button
    if(scroll > 100){
        $('.gotop')[0].style.opacity = '1';
    }else{
        $('.gotop')[0].style.opacity = '0';
    }
})

/* fade in effect */
let observer = new IntersectionObserver(function(entries){
    entries.forEach(function(entry){
        console.log(entry.intersectionRatio);
        if(entry.intersectionRatio > 0){
            entry.target.classList.add('is-visited');
            observer.unobserve(entry.target);
        }
    })
}, {
    threshold: 0.8
});
$('.fade-in').forEach(function(elm){
    observer.observe(elm);
})

/* mouse effect */
let index_head = $('.index-head')[0];
index_head.addEventListener('mousemove', test);
index_head.addEventListener('touchmove', test);
function test(e){
    //create element
    let element = document.createElement('div');
    element.style.top = (e.clientY || e.touches[0].clientY) +'px';
    element.style.left = (e.clientX || e.touches[0].clientX) + 'px';
    element.classList.add('mouse');

    //set translate
    let random = Math.floor(Math.random() * 40)
    if(random <= 20) random -= 20
    element.style.setProperty('--translateX', random+"px")

    //spawn element
    $('body')[0].appendChild(element)
    setTimeout(function(){
        element.remove(); //remove element
    },2000)
}

/* Selector */
function $(Selector){
    return document.querySelectorAll(Selector);
}


export default class Cactus {
    constructor(ctx, x, y, width, height, image) {
      this.ctx = ctx;
      this.x = x;
      this.y = y;
      this.width = width;
      this.height = height;
      this.image = image;
    }
  
    update(speed, gameSpeed, frameTimeDelta, scaleRatio) {
      this.x -= speed * gameSpeed * frameTimeDelta * scaleRatio;
    }
  
    draw() {
      this.ctx.drawImage(this.image, this.x, this.y, this.width, this.height);
    }
  
    collideWith(sprite) {
      const adjustBy = 1.4;
      if (
        sprite.x < this.x + this.width / adjustBy &&
        sprite.x + sprite.width / adjustBy > this.x &&
        sprite.y < this.y + this.height / adjustBy &&
        sprite.height + sprite.y / adjustBy > this.y
      ) {
        return true;
      } else {
        return false;
      }
    }
  }
  
  
  
  export default class Ground {
    constructor(ctx, width, height, speed, scaleRatio) {
      this.ctx = ctx;
      this.canvas = ctx.canvas;
      this.width = width;
      this.height = height;
      this.speed = speed;
      this.scaleRatio = scaleRatio;
  
      this.x = 0;
      this.y = this.canvas.height - this.height;
  
      this.groundImage = new Image();
      this.groundImage.src = "images/ground.png";
    }
  
    update(gameSpeed, frameTimeDelta) {
      this.x -= gameSpeed * frameTimeDelta * this.speed * this.scaleRatio;
    }
  
    draw() {
      this.ctx.drawImage(
        this.groundImage,
        this.x,
        this.y,
        this.width,
        this.height
      );
  
      this.ctx.drawImage(
        this.groundImage,
        this.x + this.width,
        this.y,
        this.width,
        this.height
      );
  
      if (this.x < -this.width) {
        this.x = 0;
      }
    }
  
    reset() {
      this.x = 0;
    }
  }
  
  
  
  export default class Score {
    score = 0;
    HIGH_SCORE_KEY = "highScore";
  
    constructor(ctx, scaleRatio) {
      this.ctx = ctx;
      this.canvas = ctx.canvas;
      this.scaleRatio = scaleRatio;
    }
  
    update(frameTimeDelta) {
      this.score += frameTimeDelta * 0.01;
    }
  
    reset() {
      this.score = 0;
    }
  
    setHighScore() {
      const highScore = Number(localStorage.getItem(this.HIGH_SCORE_KEY));
      if (this.score > highScore) {
        localStorage.setItem(this.HIGH_SCORE_KEY, Math.floor(this.score));
      }
    }
  
    draw() {
      const highScore = Number(localStorage.getItem(this.HIGH_SCORE_KEY));
      const y = 20 * this.scaleRatio;
  
      const fontSize = 20 * this.scaleRatio;
      this.ctx.font = `${fontSize}px serif`;
      this.ctx.fillStyle = "#525250";
      const scoreX = this.canvas.width - 75 * this.scaleRatio;
      const highScoreX = scoreX - 125 * this.scaleRatio;
  
      const scorePadded = Math.floor(this.score).toString().padStart(6, 0);
      const highScorePadded = highScore.toString().padStart(6, 0);
  
      this.ctx.fillText(scorePadded, scoreX, y);
      this.ctx.fillText(`HI ${highScorePadded}`, highScoreX, y);
    }
  }
  