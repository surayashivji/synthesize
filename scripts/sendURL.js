// function handleInputs(enteredURL) {
//     // check if inputs are empty -- alert user to enter URL
//
//     if (!enteredURL.replace(/^\s+/g, '').length) {
//         alert("Please enter a Soundcloud URL.");
//     } else {
//         // make ajax call to the correct php file based on pickedSketch, enteredURL
//         var path = 'scripts/sketches/' + pickedSketch + 'index.php';
//         console.log("path: " + path);
//
//         var content = {
//             'sketch': pickedSketch,
//             'songUrl': enteredURL
//         };
//         $.ajax({
//             type: "POST",
//             url: "loadSketch.php",
//             data: content,
//             success: function (data, text) {
//                 alert("success");
//                 // console.log(data);
//                 // console.log(text);
//
//             },
//             error: function (request, status, error) {
//                 alert(request.responseText);
//             }
//         });
//     }
//
// }