<form action="page_add.php" method="post" autocomplete="off" enctype="multipart/form-data">
                      <label  class="control-label" style="font-size: 20px;" >Title:</label> 
                      <input type="text" name="title"  required style="font-size:20px; width:500px;"><br><br>
                      <label  class="control-label" style="font-size: 16px;" >Upload File:  </label>
                      <br>                
                      <div class="alert alert-warning " role="alert"><strong>Information:</strong> It is recommended that you use a landscape photo.</div>
                      <input type='file' required onchange="readURL(this);" name="image"  style="padding-top: 10px;">
              
               </form>