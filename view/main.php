<?php 

include(dirname(__DIR__).'/controller/fetchAll.php');
$result=fetchAnimationInfo();
if($result==null)
{
    echo "Data Fecthing error";
}
?>



<?php 
    include(dirname(__DIR__).'/controller/animation.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
        include(dirname(__DIR__).'/view/includes/headContent.php');

    ?>
    <script>
        function applyAnimation()
        {
            let delayanimation='<?php echo $result["delayanimation"] ?>';
            let repeatanimation='<?php echo $result["repeatanimation"] ?>';
            repeatanimation=getAnimationRepeat(repeatanimation);
            let classanimation='<?php echo $result["classanimation"] ?>';
            let btn=document.getElementById("main__animatedbtn");
            var style = document.createElement('style');
            style.type = 'text/css';
            style.innerHTML = `
                .appliedAnimations { 
                    animation-duration: ${delayanimation}s; 
                }`;
            document.getElementsByTagName('head')[0].appendChild(style);
            var className="btn btn-lg btn-success animate__animated "+classanimation+" appliedAnimations "+repeatanimation;
            btn.className=className;
        }

        function getAnimationRepeat(repeat)
    {
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

        window.onload = applyAnimation;
    </script>

</head>

<body>
    
<?php
    include(dirname(__DIR__).'/view/includes/nav.php');

    
?>

           <div id="main__container">
                <div id="main__banner">
                    Here Your Button with applied animation
                </div>
                <button class="btn btn-lg btn-success" id="main__animatedbtn">
                    Animated Button
                </button>
           </div>
</body>

</html>
<?php 
        include(dirname(__DIR__).'/view/includes/bootstrapJs.php');

?>

