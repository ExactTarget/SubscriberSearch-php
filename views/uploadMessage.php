<div class="container">    
    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
              <li><a href="/">Home</a> <span class="divider">/</span></li>
              <li><a href="/messageoptions">Message Options</a> <span class="divider">/</span></li>           
              <li class="active"><b>Upload new message</b></li>           
            </ul>           
        </div>
    </div>
</div>

<div class="container">     
    <div class="row">
        <div class="span12">
            <h1>Upload New Message</h1>
            <p>Upload a new message. Please ensure you have followed the <a href="#">message template specification</a> and complete the appropriate form.</p>
        </div>      
    </div>  
    <div class="row">       
        <div class="span12">

            <form class="form-horizontal">
            <fieldset>      
            
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label">Name</label>
              <div class="controls">
                <input id="txtName" name="txtName" type="text" placeholder="" class="input-xlarge">
                
              </div>
            </div>

            <!-- Text input-->
            <div class="control-group">
              <label class="control-label">Key</label>
              <div class="controls">
                <input id="txtKey" name="txtKey" type="text" placeholder="" class="input-xlarge" required="">               
              </div>
            </div>

            <!-- Textarea -->
            <div class="control-group">
              <label class="control-label">Description</label>
              <div class="controls">                     
                <textarea id="txtDesc" name="txtDesc"></textarea>
              </div>
            </div>          

            <!-- File Button --> 
            <div class="control-group">
              <label class="control-label">Upload Message</label>
              <div class="controls">
                <input id="uploadFile" type="file" name="uploadFile" />             
              </div>
            </div>
            
            <!-- Button -->
            <div class="control-group">
                <div class="controls">
                    <button class="btn" id="btnCancel">Cancel</button>
                    <div class="btn-group">
                        <button class="btn btn-primary" id="btnSave">Save message</button>
                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="/editor" id="savetoeditor">Save and go to editor</a></li>
                            <li><a href="/" id="savetomessages">Save and go to messages list</a></li>                   
                        </ul>
                    </div>
                </div>
            </div>

            </fieldset>
            </form>
        </div>      
    </div>
        <div class="span1">&nbsp;</div>         
    </div>
</div>

<script src="/js/uploadmessage.js"></script>
