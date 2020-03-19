<?php


?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="description" content="This is the volunteer login page for the content management system.">
    <meta name="keywords" content="cms, content, haarlem, festival, event">
    <link href="style/cms_login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://flag-icon-css.lip.is/">
    <title>Haarlem festival</title>

  </head>
  <header>
    <?php $link_address = "";?>
    <img class="Logoright" src="../Img/logo.png" alt="logo"  title ="logo"/>
    <ul>
    	<li><a href="">EN</a></li>
    	<li><a href="<?php echo $link_address;?>" class="cartIcon" ></a></li>
    	<li><a href="<?php echo $link_address;?>UI/Food_UI.php">Haarlem Food</a></li>
    	<li><a href="<?php echo $link_address;?>UI/Dance_UI.php">Haarlem Dance</a></li>
    	<li><a href="<?php echo $link_address;?>UI/Jazz_UI.php">Haarlem Jazz</a></li>
    	<li><a href="<?php echo $link_address;?>index.php">Home</a></li>
    </ul>
    <header class="header">
    <!--for background image-->
    </header>
  </header>
<body>

      <input type="radio" id="event-cms-radio" name="event_cms_select"
      <?php if (isset($event_cms_all)) $event_cms="All";?>
       value="All"/><label class="cms_label">All</label>
      <input type="radio" id="event-cms-radio" name="event_cms_select"
      <?php if (isset($event_cms_food)) $event_cms="Food";?>
      value="Food"/><label class="cms_label">Food</label>
      <input type="radio" id="event-cms-jazz" name="event_cms_select"
      <?php if (isset($event_cms_jazz)) $event_cms="Jazz";?>
      value="Jazz"/><label class="cms_label">Jazz</label>
      <input type="radio" id="event-cms-dance" name="event_cms_select"
      <?php if (isset($event_cms_dance))$event_cms="Dance";?>
       value="Dance"/><label class="cms_label">Dance</label>
       <p class="page_title">Event categories</p>
         <form action="" method="post">
           <!--javascript that unselect radio buttons on webpage since they can't by deffault-->
           <script>
           //takes the html element's name
           var myRadios = document.getElementsByName('subscribe');
           var setCheck;
           var x = 0;
           for(x = 0; x < myRadios.length; x++){
             // on clicks checks if radio button is selected or not
             myRadios[x].onclick = function(){
             if(setCheck != this){
                  setCheck = this;
             }else{
                 this.checked = false;
                 setCheck = null;
               }
             };

           }
            </script>
    <?php if (isset($message))//displays error message to user
     {
      echo '<label class="text-warning">'.$message.'</label>'.'<br><br>';
    }
      ?>
    </form>
  </article>
</body>
    <footer>
    	<h2>@HAARLEMFESTIVAL</h2>
    	<p>Facebook</p>
    </footer>

  </html>
