var CLIENT_ID = '69054bf89e340d3b5b2f5678d5b6650b';
var TRACK_URL = sc;

// Define drawing variables here
var source;
var streamUrl;
var flag = false;

// Sketch variables
var audioFile;
var fft;
var bNormalize = true;
var centerClip = 0;


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

    fft = new p5.FFT();
    fft.setInput(source);
}

function setup() {
  // visual set up - not dependent on song at all
    // windowWidth/windowHeight - size of the navigation bar
    var navBarHeight = 0;
    c = createCanvas(windowWidth, windowHeight - navBarHeight);
    noFill();

    // default mode is radians
    angleMode(RADIANS);
    translate(width/2, height/2);

    rectMode(CENTER);
}

function draw() {

  // flag = true -- the song has been successfully loaded
  if(flag) {
      // all things drawn based on music should go here
      background(255, 255, 255, 100);
      stroke(random(100,255), random(100,255), random(100,255), 100);
      strokeWeight(random(1,4));

      // min radius of ellipse
      var minRad = 5;

      // max radius of ellipse
      var maxRad = height;

      var timeDomain = fft.waveform(1024, 'float32');
      var corrBuff = autoCorrelate(timeDomain);
      var len = corrBuff.length;


      // draw circular shape
      beginShape();


      for (var i = 0; i < len; i++) {
          var angle = map(i, 0, len, 0, HALF_PI);
          var offset = map(abs(corrBuff[i]), 0, 1, 0, maxRad) + minRad;
          var x = (offset) * cos(angle);
          var y = (offset) * sin(angle);
          curveVertex(x, y);
      }

      for (var i = 0; i < len; i++) {
          var angle = map(i, 0, len, HALF_PI, PI);
          var offset = map(abs(corrBuff[len - i]), 0, 1, 0, maxRad) + minRad;
          var x = (offset) * cos(angle);
          var y = (offset) * sin(angle);
          curveVertex(x, y);
      }

      // semi circle with mirrored
      for (var i = 0; i < len; i++) {
          var angle = map(i, 0, len, PI, HALF_PI + PI);
          var offset = map(abs(corrBuff[i]), 0, 1, 0, maxRad) + minRad;
          var x = (offset) * cos(angle);
          var y = (offset) * sin(angle);
          curveVertex(x, y);
      }

      for (var i = 0; i < len; i++) {
          var angle = map(i, 0, len, HALF_PI + PI, TWO_PI);
          var offset = map(abs(corrBuff[len - i]), 0, 1, 0, maxRad) + minRad;
          var x = (offset) * cos(angle);
          var y = (offset) * sin(angle);
          curveVertex(x, y);
      }
      endShape(CLOSE);
  }
}

// handle song errors
function soundError(e) {
	console.log('New error:');
	console.log('- name: ' + e.name);
	console.log('- message: ' + e.message);
	console.log('- stack: ' + e.stack);
	console.log('- failed path: ' + e.failedPath);
}
function autoCorrelate(buffer) {
    var newBuffer = [];
    var nSamples = buffer.length;

    var autocorrelation = [];

    // center clip removes any samples under 0.1
    if (centerClip) {
        var cutoff = centerClip;
        for (var i = 0; i < buffer.length; i++) {
            var val = buffer[i];
            buffer[i] = Math.abs(val) > cutoff ? val : 0;
        }
    }

    for (var lag = 0; lag < nSamples; lag++){
        var sum = 0;
        for (var index = 0; index < nSamples; index++){
            var indexLagged = index+lag;
            var sound1 = buffer[index];
            var sound2 = buffer[indexLagged % nSamples];
            var product = sound1 * sound2;
            sum += product;
        }

        // average to a value between -1 and 1
        newBuffer[lag] = sum/nSamples;
    }

    if (bNormalize){
        var biggestVal = 0;
        for (var index = 0; index < nSamples; index++){
            if (abs(newBuffer[index]) > biggestVal){
                biggestVal = abs(newBuffer[index]);
            }
        }
        // dont divide by zero
        if (biggestVal !== 0) {
            for (var index = 0; index < nSamples; index++){
                newBuffer[index] /= biggestVal;
            }
        }
    }

    return newBuffer;
}
