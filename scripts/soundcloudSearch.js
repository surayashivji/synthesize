function sketchSelected(sketchName) {
    console.log(sketchName);
    // store it as the sketch that will be used
}

var CLIENT_ID = '69054bf89e340d3b5b2f5678d5b6650b';

function handleInputs(pickedSketch, enteredURL) {
    // check if inputs are empty -- alert user to enter URL

    // if (!enteredURL.replace(/^\s+/g, '').length) {
    //     alert("Please enter a Soundcloud URL.");
    // } else {
    //     // make ajax call to the correct php file based on pickedSketch, enteredURL
    //     var path = 'scripts/sketches/' + pickedSketch + 'index.php';
    //     console.log("path: " + path);
    //
    //     var content = {
    //         'sketch': pickedSketch,
    //         'songUrl': enteredURL
    //     };
    //     $.ajax({
    //         type: "POST",
    //         url: "loadSketch.php",
    //         data: content,
    //         success: function (data, text) {
    //             // alert("success");
    //             // console.log(data);
    //             // console.log(text);
    //
    //             window.location.href = "loadSketch.php";
    //
    //         },
    //         error: function (request, status, error) {
    //             alert(request.responseText);
    //         }
    //     });
    // }

}