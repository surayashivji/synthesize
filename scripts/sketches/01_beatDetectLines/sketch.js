var CLIENT_ID = '69054bf89e340d3b5b2f5678d5b6650b';
var TRACK_URL = sc;
// var TRACK_URL = 'https://soundcloud.com/yourpbuddy/major-lazer-be-together-p-buddy-just-in-time-remix';

// Define drawing variables here
var source;
var streamUrl;
var flag = false;

// Sketch variables
var amplitude;
var solidBackground;

// rectangle variables
var rectRotate = true;
var rectMin = 25;
var rectOffset = 20;
var numRects = 20;

// Beat Variables
var beatHoldFrames = 30;

// amplitude level that will trigger a beat
var beatThreshold = 0.14;

var beatCutoff = 0;
var beatDecayRate = 0.98;
var framesSinceLastBeat = 0;


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

    amplitude = new p5.Amplitude();
    source.play();

    amplitude.setInput(source);
    amplitude.smooth(0.9);
}

function setup() {
  // visual set up - not dependent on song at all
    // windowWidth/windowHeight - size of the navigation bar
    c = createCanvas(windowWidth, windowHeight);
    noStroke();
    rectMode(CENTER);
}

function draw() {
// all things drawn based on music should go here
    background(solidBackground);
  // flag = true -- the song has been successfully loaded
  if(flag) {

      var level = amplitude.getLevel();
      detectBeat(level);

      // distort the rectangle based based on the amp
      var distortDiam = map(level, 0, 1, 0, 1200);
      var w = rectMin;
      var h = rectMin;

      // distortion direction shifts each beat
      if (rectRotate) {
          var rotation = PI/ 2;
      } else {
          var rotation = PI/ 3;
      }
      // rotate the drawing coordinates to rectCenter position
      var rectCenter = createVector(width/3, height/2);

      push();

      //draw the rectangles
      for (var i = 0; i < numRects; i++) {
          var x = rectCenter.x + rectOffset * i;
          var y = rectCenter.y + distortDiam/2;
          // rotate around the center of this rectangle
          translate(x, y);
          rotate(rotation);
          rect(0, 0, rectMin, rectMin + distortDiam);
      }
      pop();
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
function detectBeat(level) {
    if (level  > beatCutoff && level > beatThreshold){
        onBeat();
        beatCutoff = level * 1.2;
        framesSinceLastBeat = 0;
    } else{
        if (framesSinceLastBeat <= beatHoldFrames){
            framesSinceLastBeat ++;
        }
        else{
            beatCutoff *= beatDecayRate;
            beatCutoff = Math.max(beatCutoff, beatThreshold);
        }
    }
}

// sketch helper functions
function onBeat() {
    solidBackground = color( random(100, 255), random(100, 255), random(100, 255) );
    rectRotate = !rectRotate;
}