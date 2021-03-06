@if(isset($_SESSION['home']) && count(array($_SESSION['home'])) > 0)
<div class="footer mt-5">
    <div class="footer-width">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <img src="{{asset('asset/image/logo-small.png')}}" alt=""> EngKids the leading English learning app
                </div>
                <div class="col-6 d-flex justify-content-end">
                    © <span id="years-footer"></span> EngKids
                </div>
            </div>
        </div>

    </div>
</div>
@endif

<script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@1.3.1/dist/tf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@0.8/dist/teachablemachine-image.min.js"></script>

<script type="text/javascript">
    // window.onscroll = function() {
    //     myFunction()
    // };
    // var header = document.getElementById("myHeader");
    // var sticky = header.offsetTop;

    // function myFunction() {
    //     if (window.pageYOffset > sticky) {
    //         header.classList.add("sticky");
    //         header
    //     } else {
    //         header.classList.remove("sticky");
    //     }
    // }

    // var today = new Date();
    // var date = today.getFullYear();

    // document.getElementById("years-footer").innerHTML = date;



    

     const URL = "{{asset('asset/js')}}";

        let model, webcam, labelContainer, maxPredictions;

        // Load the image model and setup the webcam
        async function init() {
            const modelURL = URL +"/"+ "model.json";
            const metadataURL = URL+"/" + "metadata.json";

            // load the model and metadata
            // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
            // or files from your local hard drive
            // Note: the pose library adds "tmImage" object to your window (window.tmImage)
            model = await tmImage.load(modelURL, metadataURL);
           
            maxPredictions = model.getTotalClasses();
            console.log(maxPredictions);

            // Convenience function to setup a webcam
            const flip = true; // whether to flip the webcam
            webcam = new tmImage.Webcam(1000, 1000, flip); // width, height, flip

            webcam.position = 10;

            // webcam.position.x = 10
            await webcam.setup(); // request access to the webcam
            await webcam.play();
            window.requestAnimationFrame(loop);


            document.getElementById("button-start").style.display = "none";

            // document.getElementById("icon-on-off").style.display = "block";

            // append elements to the DOM
            document.getElementById("webcam-container").appendChild(webcam.canvas);
            labelContainer = document.getElementById("label-container");
            // for (let i = 0; i < maxPredictions; i++) { // and class labels
            //     labelContainer.appendChild(document.createElement("div"));
            // }
        }
    

        async function loop() {
            webcam.update(); // update the webcam frame
            await predict();
            window.requestAnimationFrame(loop);
        }

        // run the webcam image through the image model
        async function predict() {
            // predict can take in an image, video or canvas html element

            const predictions = await model.predictTopK(webcam.canvas, 1);
            const label = predictions[0].className
            const percent = predictions[0].probability.toFixed(2) * 100
            if(percent >= 80){
                 labelContainer.value = label ;
                 labelContainer.style.color = "#000"
            }
            else{
                labelContainer.value = '! invalid';
                labelContainer.style.color = "#ff0000"
            }

            // labelContainer.value = predictions[0].className + " " + predictions[0].probability.toFixed(2) * 100 ;
            // const prediction = await model.predictTopK(webcam.canvas);
            // for (let i = 0; i < maxPredictions; i++) {
            //     const classPrediction =
            //         prediction[i].className + ": " + prediction[i].probability.toFixed(2);
            //     labelContainer.childNodes[i].innerHTML = classPrediction;
            // }

        }

    
</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>