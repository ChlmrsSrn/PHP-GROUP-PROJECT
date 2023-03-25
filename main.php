<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <link rel="icon" type="image/x-icon" href="favicon.png"/>
    <title>N.Y.G.A. | PodCal</title>
</head>
<body>
    <header>
        <nav class="topnav">
            <a href="#About">About</a>
            <a href="#Calculator">Calculator</a>
            <a id="float-left"><img id="float-left" src="logo_nav.png" /></a>
        </nav>
        <div class="head-image">
            <div class="centered">
                <p>Welcome to N.Y.G.A. PodCal Calulator</p>
            </div>
        </div>
    </header>    
    <main>
        <section id="Calculator">
        <form method="post">
                <div class="form-group">
                    <label for="calculation">Choose a calculation:</label>
                    <select name="calculation" id="calculation">
                        <option value="none">Select an option</option>
                        <option value="areaOfCircle">Area, Circumference, and Diameter of a Circle</option>
                        <option value="toCelcius">Conversion of Fahrenheit to Celsius</option>
                        <option value="areaOfTriangle">Area of a Triangle</option>
                        <option value="areaAndPerimeterOfRectangle">Area and Perimeter of a Rectangle</option>
                    </select>
                </div>
                <div class="form-group" id="circleInputs">
                    <img src = "circle.png" 
                    style= "height:300px; width:300px; display: block; margin-left: auto; margin-right: auto;">
                    <br> <br> 
                    <label for="radius">&nbsp;Enter the radius:&nbsp;&nbsp;</label>
                    <input type="number" name="radius" id="radius" step="0.001" >
                </div>
                <div class="form-group" id="temperatureInputs">
                <img src = "FtoC.jpg" 
                    style= "height:300px; width:300px; display: block; margin-left: auto; margin-right: auto;
                    border:1px solid black;">
                    <br> <br>
                    <label for="fahrenheit">Enter the temperature:</label>
                    <input type="number" name="fahrenheit" id="fahrenheit" step="0.001">
                </div>
                <div class="form-group" id="triangleInputs">
                <img src = "triangle.jpg" 
                    style= "height:300px; width:300px; display: block; margin-left: auto; margin-right: auto;
                    border:1px solid black; margin-bottom:20px;">
                    <label for="base">Enter the base:&nbsp;&nbsp;&nbsp;</label>
                    <input type="number" name="base" id="base" step="0.001">
                    <br>
                    <label for="heightT">Enter the height:</label>
                    <input type="number" name="heightT" id="heightT" step="0.001">
                   
                </div>
                <div class="form-group" id="rectangleInputs">
                <img src = "rectangle.jpg" 
                    style= "height:300px; width:300px; display: block; margin-left: auto; margin-right: auto;
                    border:1px solid black; margin-bottom:20px;">
                    <label for="width">Enter the width:&nbsp;&nbsp;</label>
                    <input type="number" name="width" id="width" step="0.001">
                    <br>
                    <label for="height">Enter the height:&nbsp;</label>
                    <input type="number" name="height" id="height" step="0.001">
                </div>
                <input type="submit" value="Calculate">
            </form>        

        <!-- PHP -->

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $calculation = $_POST["calculation"];
            switch ($calculation) {
                case "areaOfCircle":
                    $radius = $_POST["radius"];
                    $area = pi() * pow($radius, 2);
                    $circumference = 2 * pi() * $radius;
                    $diameter = 2 * $radius;
                    echo '<div class="result">';
                    echo 'Area , Circumference, and Diameter of a Circle' . '<br>' . '<br>';
                    echo 'Radius: '  . $radius . '<br>' . '<br>';
                    echo 'AREA: ' . number_format($area, 3) . '<br>' ;
                    echo 'CIRCUMFERENCE: ' . number_format($circumference, 3) . '<br>';
                    echo 'DIAMETER: ' . number_format($diameter, 3);                
                    echo '</div>';
                  
                    break;
                case "toCelcius":
                    $fahrenheit = $_POST["fahrenheit"];
                    $celsius = ($fahrenheit - 32) * (5 / 9);
                    echo '<div class="result">';
                    echo 'Farenheit to Celcius' . '<br>' . '<br>';
                    echo number_format($fahrenheit, 3) . '&deg;F = ' . number_format($celsius, 3) . '&deg;C';
                    break;
                case "areaOfTriangle":
                    $base = $_POST["base"];
                    $height = $_POST["heightT"];
                    $area = 0.5 * $base * $height;
                    echo '<div class="result">';
                    echo 'AREA OF TRIANGLE' .'<br>' .'<br>';
                    echo 'Base: '. $base . '<br>';
                    echo 'Height: '. $height . '<br>' .'<br>';
                    echo 'AREA: ' . number_format($area, 3);
                    echo '</div>';
                    break;
                case "areaAndPerimeterOfRectangle":
                    $width = $_POST["width"];
                    $height = $_POST["height"];
                    $area = $width * $height;
                    $perimeter = 2 * ($width + $height);
                    echo '<div class="result">';
                    echo 'AREA AND PERIMETER OF RECTANGLE' .'<br>' .'<br>';
                    echo 'Width: '. $width . '<br>';
                    echo 'Height: '. $height . '<br>' .'<br>';
                    echo 'AREA: ' . number_format($area, 3) . '<br>' ;
                    echo 'PERIMETER: ' . number_format($perimeter, 3);
                    echo '</div>';
                    break;
                default:
                    echo '<div class="result">';
                    echo 'Please select a calculation option.';
                    echo '</div>';
            }
        }
    ?>
    <!-- JAVASCRIPT -->
    <script>
        document.getElementById("circleInputs").style.display = "none";
        document.getElementById("temperatureInputs").style.display = "none";
        document.getElementById("triangleInputs").style.display = "none";
        document.getElementById("rectangleInputs").style.display = "none";
        document.getElementById("calculation").addEventListener("change", function() {
        switch (this.value) {
            case "areaOfCircle":
                document.getElementById("circleInputs").style.display = "block";
                document.getElementById("temperatureInputs").style.display = "none";
                document.getElementById("triangleInputs").style.display = "none";
                document.getElementById("rectangleInputs").style.display = "none";
                break;
            case "toCelcius":
                document.getElementById("circleInputs").style.display = "none";
                document.getElementById("temperatureInputs").style.display = "block";
                document.getElementById("triangleInputs").style.display = "none";
                document.getElementById("rectangleInputs").style.display = "none";
                break;
            case "areaOfTriangle":
                document.getElementById("circleInputs").style.display = "none";
                document.getElementById("temperatureInputs").style.display = "none";
                document.getElementById("triangleInputs").style.display = "block";
                document.getElementById("rectangleInputs").style.display = "none";
                break;
            case "areaAndPerimeterOfRectangle":
                document.getElementById("circleInputs").style.display = "none";
                document.getElementById("temperatureInputs").style.display = "none";
                document.getElementById("triangleInputs").style.display = "none";
                document.getElementById("rectangleInputs").style.display = "block";
                break;
            default:
                document.getElementById("circleInputs").style.display = "none";
                document.getElementById("temperatureInputs").style.display = "none";
                document.getElementById("triangleInputs").style.display = "none";
                document.getElementById("rectangleInputs").style.display = "none";
                }
            });
        </script>
        </section>
        <section id="About">
            <div class="member">
                <img class="left" src="rectangle.jpg" />
                <p>Jed Aaron Salangsang</p>
                <p>Birthdate</p>
                <p>Currently Living</p>
                <p>GWA</p>
            </div>
            <div class="member">
                <img class="right" src="FtoC.jpg" />
                <p>Jed Aaron Salangsang</p>
                <p>Birthdate</p>
                <p>Currently Living</p>
                <p>GWA</p>
            </div>
            <div class="member">
                <img class="left" src="rectangle.jpg" />
                <p>Jed Aaron Salangsang</p>
                <p>Birthdate</p>
                <p>Currently Living</p>
                <p>GWA</p>
            </div>
            <div class="member">
                <img class="right" src="FtoC.jpg" />
                <p>Jed Aaron Salangsang</p>
                <p>Birthdate</p>
                <p>Currently Living</p>
                <p>GWA</p>
            </div>
            <div class="member">
                <img class="left" src="rectangle.jpg" />
                <p>Jed Aaron Salangsang</p>
                <p>Birthdate</p>
                <p>Currently Living</p>
                <p>GWA</p>
            </div>
            <div class="member">
                <img class="right" src="FtoC.jpg" />
                <p>Jed Aaron Salangsang</p>
                <p>Birthdate</p>
                <p>Currently Living</p>
                <p>GWA</p>
            </div>
        </section>
    </main>
</body>
</html>