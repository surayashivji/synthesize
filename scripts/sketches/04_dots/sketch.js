var CLIENT_ID = '69054bf89e340d3b5b2f5678d5b6650b';
var TRACK_URL = sc;

// Define drawing variables here
var fft;
var source;
var streamUrl;
var flag = false;

// sketch variables
var smoothing = 0;
var count = 256;
var dots = [];
var dotCount = count;

function preload() {
  // Initialize Soundcloud API
  SC.initialize({
    client_id: CLIENT_ID
  });
  SC.resolve(TRACK_URL).then(function(track){
    // promise resolves with JSON from Soundcloud API
    // get stream Url from JSON
    streamUrl = track.stream_url + '?client_id=' + CLIENT_ID;

    // DEBUG: Uncomment to print the stream URL
    // console.log("Stream Url: " + streamUrl + '\n');

    // loadSound function
    // @param streamUrl: url of the song to load
    // @param trackReady: this is the callback function that executes
    // when the streamUrl successfully loads into source. This is important
    // because nothing should execute until the stream is successfully loaded
    // @param soundError: this executes if streamUrl wasn't loaded successfully
    source = this.loadSound(streamUrl, trackReady, soundError);

    // DEBUG: Uncomment to print what the source is that you loaded (should be JSON with stream)
    // console.log("source current: " + JSON.stringify(source));

  }).catch(function(error){
    // Error in network request
    console.log("Error getting track JSON: " + error + '\n');
  });
}

// treat trackReady as a second "setup" -- anything that should be in setup
// but should only happen once the song has been loaded should go here
// otherwise setup will fail
// ie - (amplitude should be set up here if applicable)
function trackReady() {
  // song has loaded, set flag
  flag = true;
  // source can be played
  source.play();
  document.getElementsByClassName("loader")[0].style.display = 'none';


    fft = new p5.FFT(smoothing, count);
    fft.setInput(source);
}

function setup() {
  // visual set up - not dependent on song at all
  c = createCanvas(windowWidth, windowHeight);

    colorMode(HSB, 255);
  noStroke();

    // create dots
    for (var x = 0; x < dotCount; x++) {
        var dot = new Dot(x);
        dots.push(dot);
    }
}

function draw() {

    // dark gray
    background(0, 0, 20, 20);

  // flag = true -- the song has been successfully loaded
  if(flag) {

      // translate all x / y coordinates to the center of the screen
      translate(width/2, height/2);

      var spectrum = fft.analyze(count);
      var center = createVector(windowWidth/2, windowHeight/2);

      for (var x = 0; x < dotCount; x++) {
          var fftAmp = spectrum[x];
          dots[x].seek(fftAmp);
          dots[x].update();
          dots[x].display();
      }

  }
}

function Dot(index) {
    this.index = index;
    this.location = createVector(0,0);

    var angle = map(index, 0, dotCount, 0, TWO_PI);

    this.angle = p5.Vector.fromAngle(angle);

    this.velocity = p5.Vector.random2D();
    this.acceleration = createVector(0, 0);

    this.maxforce = random(0.01, 0.4);
    this.maxspeed = random(6, 20); // dot speed

    this.r = 10; // dot radius
}

Dot.prototype.seek = function(fftAmp) {
    // angle
    var newTarget = createVector(this.angle.x, this.angle.y);
    newTarget.mult(fftAmp);

    var desired = p5.Vector.sub(newTarget, this.location);
    desired.normalize();
    desired.mult(this.maxspeed);

    // Steering = desired - velocity
    var steer = p5.Vector.sub(desired, this.velocity);
    steer.limit(this.maxforce);

    this.acceleration.add(steer);
};

Dot.prototype.update = function() {
    // update velocity
    this.velocity.add(this.acceleration);

    // limit speed
    this.velocity.limit(this.maxspeed);
    this.location.add(this.velocity);

    // reset acceleration
    this.acceleration.mult(0);

    this.checkEdges();
};

Dot.prototype.display = function() {
    fill(105, 105, random(220,255));
    ellipse(this.location.x, this.location.y, this.r, this.r);
};

// prevent objects from flying off screen
Dot.prototype.checkEdges = function() {
    var x = this.location.x;
    var y = this.location.y;

    if (x > width || x < 0 || y > height || y < 0) {
        x = width/2;
        y = height/2;
    }

};

function windowResized() {
    resizeCanvas(windowWidth, windowHeight);
}

// handle song errors
function soundError(e) {
	console.log('New error:');
	console.log('- name: ' + e.name);
	console.log('- message: ' + e.message);
	console.log('- stack: ' + e.stack);
	console.log('- failed path: ' + e.failedPath);
}
