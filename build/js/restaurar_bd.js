$(document).ready(function() {
  Dropzone.options.restaurar = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 2, // MB
  accept: function(file, done) {
    if (file.name == "justinbieber.jpg") {
      done("Naha, you don't.");
    }
    else { done(); }
  }
};

//$("div#myId").dropzone({ url: "/file/post" });

});
