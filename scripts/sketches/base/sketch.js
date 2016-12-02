var CLIENT_ID = '69054bf89e340d3b5b2f5678d5b6650b';
var TRACK_URL = sc;

// Define drawing variables here
var source;
var streamUrl;
var flag = false;

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
  source.jump(0);
}

function setup() {
  // visual set up - not dependent on song at all
  c = createCanvas(windowWidth, windowHeight);
  background(0);
  fill(255);
  noStroke();
}

function draw() {

  // flat = true -- the song has been successfully loaded
  if(flag) {
    background(0);

    // all things drawn based on music should go here
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
