var CLIENT_ID = '69054bf89e340d3b5b2f5678d5b6650b';
var TRACK_URL = sc;

// Define drawing variables here
var source;
var streamUrl;
var flag = false;

// sketch variables
var amplitude;

var prevLevels = new Array(60);

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

    amplitude = new p5.Amplitude();
    amplitude.setInput(source);
    amplitude.smooth(0.6);
}

function setup() {
  // visual set up - not dependent on song at all
  c = createCanvas(windowWidth, windowHeight);
    background(0);
    noStroke();
    rectMode(CENTER);
    colorMode(HSB);
}

function draw() {

    background(20, 20);
    fill(255, 10);
  // flag = true -- the song has been successfully loaded
  if(flag) {
    // all things drawn based on music should go here
      var level = amplitude.getLevel();

      // rectangle variables
      var spacing = 10;
      var w = width/ (prevLevels.length * spacing);

      var minHeight = 60;
      var roundness = 20;

      // add new level to end of array
      prevLevels.push(level);

      // remove first item in array
      prevLevels.splice(0, 1);

      // loop through all the previous levels
      for (var i = 0; i < prevLevels.length; i++) {

          var x = map(i, prevLevels.length, 0, width/2, width);
          var h = map(prevLevels[i], 0, 0.5, minHeight, height);

          var alphaValue = logMap(i, 0, prevLevels.length, 1, 250);

          var hueValue = map(h, minHeight, height, 200, 255);

          fill(hueValue, 255, 255, alphaValue);

          rect(x, height/2, w, h);
          rect(width - x, height/2, w, h);
      }
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