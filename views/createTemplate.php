<div class="container">    
    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
              <li><a href="/">Home</a> <span class="divider">/</span></li>
              <li><a href="/messageoptions">Message Options</a> <span class="divider">/</span></li>           
              <li class="active"><b>Create a new template</b></li>            
            </ul>           
        </div>
    </div>
</div>

<div class="container">     
    <div class="row">
        <div class="span12">
            <h1>Create a New Template</h1>
            <p>A message is a single or collection of views. Please ensure you have followed the <a href="#">message template specification</a> and complete the appropriate form.</p>
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

            <!-- Select Basic -->
            <div class="control-group">
              <label class="control-label">Select a Layout</label>
              <div class="controls">                
                <div id="cboType" class="input-append dropdown combobox">
                    <input class="span2" type="text"><button type="button" class="btn" data-toggle="dropdown"><i class="caret"></i></button>
                    <ul class="dropdown-menu">
                        <li data-value="" data-selected="true"><a href="#">Select a layout</a></li>
                        <li data-value=""><a href="#">My email layout</a></li>                              
                    </ul>
                </div>
                <a class="btn" href="#">Create a new layout</a>
              </div>                
            </div>  
            
            <!-- Select Basic -->
            <div class="control-group">
              <label class="control-label">Select a View Template</label>
              <div class="controls">                
                <div id="cboType" class="input-append dropdown combobox">
                    <input class="span2" type="text"><button type="button" class="btn" data-toggle="dropdown"><i class="caret"></i></button>
                    <ul class="dropdown-menu">
                        <li data-value="" data-selected="true"><a href="#">Select a view template</a></li>
                        <li data-value=""><a href="#">My email view template</a></li>                               
                    </ul>
                </div>
                <a class="btn" href="#">Create a new view template</a>
              </div>                
            </div>  

            <!-- Select Basic -->
            <div class="control-group">
              <label class="control-label">Select a Theme</label>
              <div class="controls">                
                <div id="cboType" class="input-append dropdown combobox">
                    <input class="span2" type="text"><button type="button" class="btn" data-toggle="dropdown"><i class="caret"></i></button>
                    <ul class="dropdown-menu">
                        <li data-value="" data-selected="true"><a href="#">Select a theme</a></li>
                        <li data-value=""><a href="#">My email theme</a></li>                               
                    </ul>
                </div>
                <a class="btn" href="#">Create a new theme</a>
              </div>                
            </div>  
            <!-- Button -->
            <div class="control-group">
                <div class="controls">
                    <button class="btn" id="btnCancel">Cancel</button>
                    <div class="btn-group">
                        <button class="btn btn-primary" id="btnSave">Save template</button>
                        <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="/editor" id="savetoeditor">Save and go to editor</a></li>
                            <li><a href="/templates" id="savetotemplates">Save and go to templates list</a></li>                    
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

<script src="/js/createtemplate.js"></script>
