<?php 
    include(dirname(__DIR__).'/controller/animation.php');

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include(dirname(__DIR__).'/view/includes/headContent.php');

    ?>


</head>

<body>

<?php
    include(dirname(__DIR__).'/view/includes/nav.php');

?>
     <form method="post" action="./view/process.php">
    <div class="container-fluid" >
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="row">
                    <h4>Settings</h4>
                </div>
                <!-- Row starts -->
                <div class="row topmarginrow" >
                    <div class="col-12 col-md-6" >
                  
                        <div class="row">
                            <div class="col-12 upperHeading" >Delay</div>
                            <div class="col-12 lowerHeading">Defines delay duration which animation will takes</div>
                        </div>
                       
                    </div>
                    <div class="col-12 col-md-6 inputBox">
                        <input name="delay" id="animationDelay" type="number" class="input" /> 
                    </div>
                </div>
                <!-- Row ends here -->
                <!-- Row starts -->
                <div class="row topmarginrow" >
                    <div class="col-12 col-md-6" >
                  
                        <div class="row">
                            <div class="col-12 upperHeading" >Animation repeat</div>
                            <div class="col-12 lowerHeading">select how many time animations can be repeated</div>
                        </div>
                       
                    </div>
                    <div class="col-12 col-md-6 inputBox">
                       <select name="repeat" class="input" id="animationRepeat">
                           <option>1 time</option>
                           <option>2 time</option>
                           <option>3 time</option>
                           <option>Infinity</option>
                       </select>
                    </div>
                </div>
                <!-- Row ends here --> 
            </div>
            <div class="col-2"></div>
        </div>
    </div>
<?php
    $choosedAnimation="animate__animated animate__bounce";
?>
    <div class="container-fluid topmarginrow">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 containerBox">
                <div class="row">
                   <div class="col-12">
                       <div class="flexBox">
                       <div class="upperHeading" >Live preview</div>
                        <div class="lowerHeading">select an option for quick export</div>
                        <div id="section">
                            <div></div>
                            <div>
                                <button type="submit" id="addToCartBtn" class="btn btn-lg btn-success">Add to Cart</button>
                            </div>
                            <div id="listSection">
                            <input type="hidden" name="animations" value="none" checked />
                               <?php 
                           
                               foreach(Animation::$animations as $x => $x_value) {
                               // echo "Key=" . $x . ", Value=" . $x_value;
                               ?>
                               <div id="listBar">
                                   
                                    <input id="<?php echo $x_value ?>" onClick="onAnimationSelection(this.value)"  type="radio" name="animations" value="<?php echo $x_value ?>" />
                                   
                                   
                                    <label id="label" for="<?php echo $x_value ?>">
                                        <?php echo $x ?>
                                    </label>

                                    <div class="price">
                                        <?php
                                        if(Animation::$pricing[$x]>0)
                                          echo Animation::$pricing[$x]." USD";
                                        ?>
                                    </div>

                                    <div>
                                        <?php
                                            if(Animation::$pricing[$x]>0)
                                            echo "<img src='assets/images/star.svg' class='star' />";
                                        ?>
                                        
                                    </div>
                                   
                                    
                               </div>
                               <?php
                              }
                               ?>
                            </div>
                        </div>
                       </div>
                   </div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
    </form>
</body>

</html>

<script>
    function onAnimationSelection(animationType)
    {
        document.getElementById("addToCartBtn").classList.remove(animationType);
        setTimeout(() => {
            let delay=getDelayValue();
        if(delay=="" || delay==undefined || delay==null)
        {
            delay=1;
        }
        var style = document.createElement('style');
        style.type = 'text/css';
        style.innerHTML = `
            .customAnimations { 
                animation-duration: ${delay}s; 
            }`;
        document.getElementsByTagName('head')[0].appendChild(style);
        var animationRepeat=getAnimationRepeat();
        var className="btn btn-lg btn-success animate__animated "+animationType+" customAnimations "+animationRepeat;
        document.getElementById("addToCartBtn").className=className;
        }, 100);
        
    }

    function getDelayValue()
    {
        return document.getElementById("animationDelay").value;
    }

    function getAnimationRepeat()
    {
        let repeat= document.getElementById("animationRepeat").value;
        switch(repeat)
        {
            case "1 time":
                    return "animate__repeat-1";
                break;
            case "2 time":
                    return "animate__repeat-2";
                break;
            case "3 time":
                   return "animate__repeat-3";
                break;
            case "Infinity":
                    return "animate__infinite";
                break;
            default:
                   return "animate__repeat-1";
        }
    }
</script>

<?php 
        include(dirname(__DIR__).'/view/includes/bootstrapJs.php');

?>